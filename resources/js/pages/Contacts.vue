<template>
  <div class="page active">
    <section class="contact-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('contacts.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('contacts.h1a') }}</span><br>
          <span>{{ $t('contacts.h1b') }}</span><br>
          <em style="color:var(--accent-light);font-style:normal;">{{ $t('contacts.h1c') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:var(--muted);max-width:480px;margin-top:2rem;">{{ $t('contacts.desc') }}</p>
      </div>
    </section>

    <!-- How we work -->
    <section class="section section-dark">
      <FadeUp style="margin-bottom:3rem;">
        <div class="section-tag">{{ $t('contacts.process_tag') }}</div>
        <h2 class="section-title">{{ $t('contacts.process_h') }}</h2>
      </FadeUp>
      <FadeUp>
        <div class="grid-3" style="border:1px solid var(--border);">
          <div v-for="i in 3" :key="i" class="card card-dark">
            <div class="card-num">{{ String(i).padStart(2, '0') }}</div>
            <h3>{{ $t('contacts.step' + i + 'h') }}</h3>
            <p>{{ $t('contacts.step' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- Contact info + Form -->
    <section class="section">
      <div class="contact-grid">
        <div>
          <FadeUp>
            <div class="section-tag">{{ $t('contacts.info_tag') }}</div>
          </FadeUp>
          <FadeUp :delay="80">
            <div class="contact-info-block">
              <div class="contact-info-label">{{ $t('contacts.email_label') }}</div>
              <div class="contact-info-val"><a href="mailto:javid.jafarov.ag@gmail.com">{{ $t('contacts.email_val') }}</a></div>
            </div>
          </FadeUp>
          <FadeUp :delay="160">
            <div class="contact-info-block">
              <div class="contact-info-label">{{ $t('contacts.tg_label') }}</div>
              <div class="contact-info-val"><a href="https://t.me/flutter_javid_dev" target="_blank">{{ $t('contacts.tg_val') }}</a></div>
            </div>
          </FadeUp>
          <FadeUp :delay="240">
            <div class="contact-info-block">
              <div class="contact-info-label">{{ $t('contacts.loc_label') }}</div>
              <div class="contact-info-val">{{ $t('contacts.loc_val') }}</div>
            </div>
          </FadeUp>
          <FadeUp :delay="320">
            <div style="margin-top:3rem;padding:2rem;background:var(--gray1);border:1px solid var(--border);">
              <div style="font-size:.72rem;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);margin-bottom:1rem;">{{ $t('contacts.resp_label') }}</div>
              <div style="font-family:var(--font-h);font-size:2rem;font-weight:800;color:var(--accent-light);">{{ $t('contacts.resp_time') }}</div>
              <p style="font-size:.85rem;color:var(--muted);margin-top:.5rem;line-height:1.6;">{{ $t('contacts.resp_desc') }}</p>
            </div>
          </FadeUp>
        </div>
        <FadeUp :delay="100">
          <div class="section-tag" style="margin-bottom:2rem;">{{ $t('contacts.form_tag') }}</div>
          <form @submit.prevent="submitForm">
            <div class="form-group">
              <input type="text" v-model="form.name" :placeholder="$t('contacts.f_name')" required>
            </div>
            <div class="form-group">
              <input type="text" v-model="form.contact" :placeholder="$t('contacts.f_contact')" required>
            </div>
            <div class="form-group">
              <textarea v-model="form.message" :placeholder="$t('contacts.f_msg')"></textarea>
            </div>
            <button type="submit" class="btn-submit" :disabled="loading">
              {{ loading ? '...' : $t('contacts.f_send') }}
            </button>
            <div v-if="sent" style="margin-top:1rem;color:var(--accent-light);font-size:.9rem;">{{ $t('contacts.f_success') }}</div>
            <div v-if="error" style="margin-top:1rem;color:#d44;font-size:.9rem;">{{ error }}</div>
          </form>
        </FadeUp>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import FadeUp from '../components/FadeUp.vue';

const form = reactive({ name: '', contact: '', message: '' });
const loading = ref(false);
const sent = ref(false);
const error = ref('');

async function submitForm() {
  loading.value = true;
  error.value = '';
  try {
    const res = await fetch('/api/contact/project', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(form),
    });
    if (res.ok) {
      sent.value = true;
      form.name = '';
      form.contact = '';
      form.message = '';
      setTimeout(() => { sent.value = false; }, 5000);
    } else {
      const data = await res.json();
      error.value = data.message || 'Error sending message';
    }
  } catch (e) {
    error.value = 'Connection error. Please try again.';
  }
  loading.value = false;
}
</script>
