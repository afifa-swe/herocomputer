<template>
  <div class="page active">
    <section class="about-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('cases.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('cases.h1a') }}</span><br>
          <span>{{ $t('cases.h1b') }}</span><br>
          <em style="color:var(--accent);font-style:normal;">{{ $t('cases.h1c') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:var(--muted);max-width:500px;margin-top:2rem;">{{ $t('cases.desc') }}</p>
      </div>
    </section>

    <section class="section">
      <FadeUp>
        <div class="cases-grid">
          <router-link v-for="(cs, idx) in casesList" :key="idx" :to="'/cases/' + idx" class="case-card" style="display:block;text-decoration:none;color:inherit;">
            <div class="case-arrow">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 12L12 2M12 2H5M12 2V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <CaseVisual :type="getVisualType(idx)" :label="cs.label" :color="cs.color" :color2="cs.color2" />
            <div class="case-tag">{{ cs.tag }}</div>
            <h3>{{ cs.h }}</h3>
            <p>{{ cs.p }}</p>
            <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid var(--border);font-size:.75rem;letter-spacing:.1em;color:var(--muted);text-transform:uppercase;">{{ cs.tech }}</div>
          </router-link>
        </div>
      </FadeUp>
    </section>

    <section class="section section-dark section-cta">
      <FadeUp style="max-width:560px;margin:0 auto;">
        <h2 class="section-title" style="font-size:clamp(2rem,4vw,3.5rem);">{{ $t('cases.cta_h') }}</h2>
        <p style="color:var(--muted);font-size:1rem;margin:1.25rem 0 2.5rem;">{{ $t('cases.cta_p') }}</p>
        <router-link to="/contacts" class="btn btn-primary">{{ $t('cases.cta_btn') }}</router-link>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';
import CaseVisual from '../components/CaseVisual.vue';

const { tm } = useI18n();
const casesList = computed(() => tm('cases.cases_list') || []);

const visualTypes = ['vieon', 'web3', 'pharmacy', 'olalearn', 'payflow', 'cargotrack', 'bazario', 'propdesk', 'freshbox', 'teampulse'];
function getVisualType(idx) {
  return visualTypes[idx] || 'default';
}
</script>
