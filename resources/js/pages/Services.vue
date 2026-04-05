<template>
  <div class="page active">
    <section class="about-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('services.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('services.h1a') }}</span><br>
          <em style="color:var(--accent);font-style:normal;">{{ $t('services.h1b') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:var(--muted);max-width:500px;margin-top:2rem;">{{ $t('services.desc') }}</p>
      </div>
    </section>

    <section class="section">
      <FadeUp>
        <div class="section-tag">{{ $t('services.tag1') }}</div>
      </FadeUp>
      <FadeUp>
        <div class="grid-3" style="margin-top:2rem;">
          <div v-for="(sv, idx) in servicesList" :key="idx" class="card">
            <span class="card-accent-bar"></span>
            <div class="card-num">{{ sv.num }}</div>
            <h3>{{ sv.h }}</h3>
            <p>{{ sv.p }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <section class="section section-dark">
      <FadeUp style="margin-bottom:3.5rem;">
        <div class="section-tag">{{ $t('services.proc_tag') }}</div>
        <h2 class="section-title">{{ $t('services.proc_h') }}</h2>
      </FadeUp>
      <FadeUp>
        <div class="grid-3">
          <div v-for="i in 6" :key="i" class="card card-dark">
            <div style="font-family:var(--font-h);font-size:1.75rem;font-weight:800;color:var(--accent);margin-bottom:1rem;letter-spacing:-.03em;">{{ String(i).padStart(2, '0') }}</div>
            <h3>{{ $t('services.p' + i + 'h') }}</h3>
            <p>{{ $t('services.p' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <section class="section section-cta">
      <FadeUp style="max-width:600px;margin:0 auto;">
        <div class="section-tag" style="justify-content:center;">{{ $t('services.cta_tag') }}</div>
        <h2 class="section-title" style="font-size:clamp(2.5rem,5vw,4.5rem);" v-html="$t('services.cta_h').replace('\\n','<br>')"></h2>
        <p style="color:var(--muted);font-size:1rem;margin:1.5rem 0 2.5rem;">{{ $t('services.cta_p') }}</p>
        <router-link to="/contacts" class="btn btn-primary">{{ $t('services.cta_btn') }}</router-link>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';

const { tm } = useI18n();
const servicesList = computed(() => tm('services.services_list') || []);
</script>
