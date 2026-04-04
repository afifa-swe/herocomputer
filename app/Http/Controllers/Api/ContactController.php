<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\DevApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitProject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        $cr = ContactRequest::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'message' => $validated['message'] ?? '',
            'type' => 'project',
        ]);

        $this->notifyTelegram("New project request:\nName: {$cr->name}\nContact: {$cr->contact}\nMessage: {$cr->message}");

        return response()->json(['success' => true]);
    }

    public function submitDeveloper(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',
            'stack' => 'nullable|string|max:500',
            'experience' => 'nullable|string|max:100',
            'portfolio_link' => 'nullable|string|max:500',
            'about' => 'nullable|string|max:5000',
        ]);

        $app = DevApplication::create($validated);

        $this->notifyTelegram("New developer application:\nName: {$app->name}\nTG: {$app->telegram}\nStack: {$app->stack}\nExp: {$app->experience}\nLink: {$app->portfolio_link}");

        return response()->json(['success' => true]);
    }

    private function notifyTelegram(string $text): void
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (!$botToken || !$chatId) {
            return;
        }

        try {
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'HTML',
            ]);
        } catch (\Exception $e) {
            // Silently fail - don't break form submission
        }
    }
}
