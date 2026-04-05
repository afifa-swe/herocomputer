<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SplitPortfolioImages extends Command
{
    protected $signature = 'portfolio:split {--slides=10 : Number of slides per image}';
    protected $description = 'Split horizontal PNG strips into individual slides';

    public function handle(): int
    {
        $dir = public_path('images/portfolio');
        $outDir = public_path('images/portfolio/slides');

        if (!is_dir($outDir)) {
            mkdir($outDir, 0755, true);
        }

        $files = glob($dir . '/*.png');

        if (empty($files)) {
            $this->error('No PNG files found in ' . $dir);
            return 1;
        }

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            $this->info("Processing: {$name}.png");

            [$width, $height] = getimagesize($file);
            $slidesCount = (int) $this->option('slides');
            $slideWidth = (int) floor($width / $slidesCount);

            $this->info("  Size: {$width}x{$height}, slide width: {$slideWidth}px");

            $source = imagecreatefrompng($file);
            if (!$source) {
                $this->error("  Failed to load {$name}.png");
                continue;
            }

            for ($i = 0; $i < $slidesCount; $i++) {
                $slide = imagecreatetruecolor($slideWidth, $height);
                imagealphablending($slide, false);
                imagesavealpha($slide, true);

                imagecopy($slide, $source, 0, 0, $i * $slideWidth, 0, $slideWidth, $height);

                $outPath = "{$outDir}/{$name}_{$i}.png";
                imagepng($slide, $outPath, 6);
                imagedestroy($slide);

                $this->line("  Created: {$name}_{$i}.png");
            }

            imagedestroy($source);
            $this->info("  Done: {$slidesCount} slides");
        }

        $this->newLine();
        $this->info('All images split successfully!');
        return 0;
    }
}
