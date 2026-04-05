<template>
  <div class="page active" v-if="cs">
    <!-- HERO -->
    <section class="contact-hero" :style="{ background: `linear-gradient(135deg, ${cs.color}, ${cs.color2})` }">
      <div class="page-hero-bg"></div>
      <div class="page-hero-inner">
        <div class="section-tag" style="color:rgba(255,255,255,.5);">{{ cs.tag }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(2.5rem,6vw,5rem);line-height:1;letter-spacing:-.03em;">
          {{ cs.h }}
        </h1>
        <p style="font-size:1.1rem;color:rgba(255,255,255,.55);max-width:520px;margin-top:1.5rem;">{{ cs.p }}</p>
      </div>
    </section>

    <!-- VISUAL -->
    <section class="section section-dark">
      <FadeUp>
        <CaseVisual :type="visualType" :label="cs.label" :color="cs.color" :color2="cs.color2" style="height:clamp(260px,40vw,400px);border-radius:12px;" />
      </FadeUp>
    </section>

    <!-- OVERVIEW + SIDEBAR -->
    <section class="section">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('case_detail.overview_tag') }}</div>
          <h2 class="section-title">{{ $t('case_detail.overview_h') }}</h2>
          <p style="color:var(--muted);font-size:1rem;line-height:1.8;margin-bottom:1.5rem;">{{ cs.p }}</p>
          <div v-if="cs.role" style="margin-top:1.5rem;">
            <div style="font-size:.72rem;letter-spacing:.15em;text-transform:uppercase;color:var(--accent);margin-bottom:.75rem;">{{ $t('case_detail.role_label') }}</div>
            <ul style="list-style:none;padding:0;">
              <li v-for="(r, ri) in parseList(cs.role)" :key="ri" style="padding:.4rem 0;font-size:.9rem;color:var(--muted);display:flex;align-items:center;gap:.75rem;">
                <span style="width:4px;height:4px;background:var(--accent-light);border-radius:50%;flex-shrink:0;"></span>
                {{ r }}
              </li>
            </ul>
          </div>
        </FadeUp>
        <FadeUp :delay="100">
          <div style="display:flex;flex-direction:column;gap:1px;background:var(--border);border:1px solid var(--border);">
            <div style="background:var(--gray1);padding:1.5rem 2rem;">
              <div style="font-size:.7rem;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem;">{{ $t('case_detail.client_label') }}</div>
              <div style="font-size:1rem;font-weight:600;">{{ cs.client || cs.label }}</div>
            </div>
            <div style="background:var(--gray1);padding:1.5rem 2rem;">
              <div style="font-size:.7rem;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem;">{{ $t('case_detail.tech_label') }}</div>
              <div style="font-size:1rem;font-weight:600;">{{ cs.tech }}</div>
            </div>
            <div style="background:var(--gray1);padding:1.5rem 2rem;">
              <div style="font-size:.7rem;letter-spacing:.15em;text-transform:uppercase;color:var(--muted);margin-bottom:.4rem;">{{ $t('case_detail.category_label') }}</div>
              <div style="font-size:1rem;font-weight:600;">{{ cs.tag }}</div>
            </div>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- RESULTS -->
    <section class="section section-dark" v-if="cs.results">
      <FadeUp style="margin-bottom:2.5rem;">
        <div class="section-tag">{{ $t('case_detail.results_tag') }}</div>
        <h2 class="section-title">{{ $t('case_detail.results_h') }}</h2>
      </FadeUp>
      <FadeUp>
        <div class="grid-3" style="border:1px solid var(--border);">
          <div v-for="(r, ri) in parseList(cs.results)" :key="ri" class="card card-dark" style="text-align:center;padding:2.5rem 1.5rem;">
            <div style="font-family:var(--font-h);font-size:2rem;font-weight:800;color:var(--accent);margin-bottom:.5rem;">{{ r.split(' — ')[0] || r }}</div>
            <div style="font-size:.85rem;color:var(--muted);">{{ r.split(' — ')[1] || '' }}</div>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- REVIEW -->
    <section class="section" v-if="cs.review">
      <FadeUp>
        <div style="max-width:640px;margin:0 auto;text-align:center;">
          <div class="section-tag" style="justify-content:center;">{{ $t('case_detail.review_tag') }}</div>
          <blockquote style="font-family:var(--font-h);font-size:1.3rem;font-weight:600;line-height:1.5;margin:1.5rem 0;color:var(--white);">
            "{{ cs.review }}"
          </blockquote>
          <div style="font-size:.82rem;color:var(--muted);">— {{ cs.client || cs.label }}</div>
        </div>
      </FadeUp>
    </section>

    <!-- CTA -->
    <section class="section section-dark section-cta">
      <FadeUp>
        <div class="section-tag" style="justify-content:center;">{{ $t('case_detail.cta_tag') }}</div>
        <h2 class="section-title" style="margin-bottom:1.5rem;">{{ $t('case_detail.cta_h') }}</h2>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
          <router-link to="/contacts" class="btn btn-primary">{{ $t('case_detail.cta_btn') }}</router-link>
          <router-link to="/cases" class="btn btn-outline">{{ $t('case_detail.back') }}</router-link>
        </div>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';
import CaseVisual from '../components/CaseVisual.vue';

const route = useRoute();
const { tm } = useI18n();

const visualTypes = ['vieon', 'web3', 'pharmacy', 'olalearn'];
const caseId = computed(() => parseInt(route.params.id));

const cs = computed(() => {
  const list = tm('cases.cases_list') || [];
  return list[caseId.value] || null;
});

const visualType = computed(() => visualTypes[caseId.value] || 'default');

function parseList(str) {
  if (!str) return [];
  return str.split('|').map(s => s.trim()).filter(Boolean);
}
</script>
