<template>
  <div class="page active">
    <!-- HERO -->
    <section class="about-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('about.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('about.h1a') }}</span><br>
          <span>{{ $t('about.h1b') }}</span><br>
          <em style="color:var(--accent);font-style:normal;">{{ $t('about.h1c') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:#CBD5E1;max-width:500px;margin-top:2rem;">{{ $t('about.desc') }}</p>
      </div>
    </section>

    <!-- STATS -->
    <section class="section section-dark">
      <FadeUp>
        <div class="grid-4" style="border:1px solid var(--border);">
          <div v-for="(stat, idx) in stats" :key="idx" class="card card-dark" style="text-align:center;padding:3rem 1.5rem;">
            <div style="font-family:var(--font-h);font-size:3.5rem;font-weight:800;letter-spacing:-.04em;color:var(--accent);line-height:1;">{{ stat.num }}</div>
            <div style="font-size:.72rem;letter-spacing:.15em;text-transform:uppercase;color:#CBD5E1;margin-top:.75rem;">{{ stat.label }}</div>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- MISSION -->
    <section class="section">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('about.tag1') }}</div>
          <h2 class="section-title" v-html="$t('about.h_mission').replace('\\n','<br>')"></h2>
          <p style="color:#CBD5E1;font-size:1rem;line-height:1.8;margin-bottom:1rem;">{{ $t('about.p_mission1') }}</p>
          <p style="color:#CBD5E1;font-size:1rem;line-height:1.8;">{{ $t('about.p_mission2') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <div style="position:relative;padding:3rem;background:var(--gray1);border:1px solid var(--border);">
            <div style="position:absolute;top:-1px;left:2rem;background:var(--accent);color:var(--white);font-size:.62rem;letter-spacing:.1em;text-transform:uppercase;padding:.35rem .8rem;font-weight:700;">{{ $t('about.philosophy_badge') }}</div>
            <blockquote style="font-family:var(--font-h);font-size:1.4rem;font-weight:700;line-height:1.4;margin-bottom:1.5rem;color:var(--white);">{{ $t('about.philosophy_quote') }}</blockquote>
            <p style="font-size:.85rem;color:#CBD5E1;line-height:1.7;">{{ $t('about.philosophy_p') }}</p>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- VALUES -->
    <section class="section section-dark">
      <FadeUp style="margin-bottom:3.5rem;">
        <div class="section-tag">{{ $t('about.tag2') }}</div>
        <h2 class="section-title">{{ $t('about.values_h') }}</h2>
        <p class="section-sub">{{ $t('about.values_sub') }}</p>
      </FadeUp>
      <FadeUp>
        <div class="values-grid">
          <div v-for="i in 6" :key="i" class="card card-dark">
            <svg class="card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5">
              <template v-if="i === 1"><path d="M20 5l3 9h9l-7 5 3 9-8-6-8 6 3-9-7-5h9z"/></template>
              <template v-else-if="i === 2"><circle cx="20" cy="20" r="15"/><path d="M20 12v8l5 3"/></template>
              <template v-else-if="i === 3"><path d="M6 28l10-10 7 7 11-16"/></template>
              <template v-else-if="i === 4"><path d="M20 6v4M20 30v4M6 20h4M30 20h4M10.1 10.1l2.8 2.8M27.1 27.1l2.8 2.8M10.1 29.9l2.8-2.8M27.1 12.9l2.8-2.8"/></template>
              <template v-else-if="i === 5"><path d="M20 8c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12"/><path d="M28 8l4 4-4 4"/></template>
              <template v-else><path d="M8 20c0-6.6 5.4-12 12-12s12 5.4 12 12c0 4-2 7.5-5 9.5M20 32v-8"/></template>
            </svg>
            <h3>{{ $t('about.v' + i + 'h') }}</h3>
            <p>{{ $t('about.v' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- WHY US -->
    <section class="section">
      <FadeUp style="max-width:600px;margin-bottom:4rem;">
        <div class="section-tag">{{ $t('about.why_tag') }}</div>
        <h2 class="section-title">{{ $t('about.why_h') }}</h2>
      </FadeUp>
      <FadeUp>
        <div class="standards-grid">
          <div v-for="i in 4" :key="i" class="std-item">
            <div class="std-check">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2.5 7L5.5 10L11.5 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3>{{ $t('about.why' + i + 'h') }}</h3>
            <p>{{ $t('about.why' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- GEOGRAPHY -->
    <section class="section section-dark">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('about.geo_tag') }}</div>
          <h2 class="section-title">{{ $t('about.geo_h') }}</h2>
          <p style="color:#CBD5E1;font-size:1rem;line-height:1.8;">{{ $t('about.geo_p') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <div style="display:flex;flex-wrap:wrap;gap:.5rem;">
            <span v-for="country in countries" :key="country" style="display:inline-block;padding:.5rem 1.1rem;border:1px solid var(--border);font-size:.82rem;color:#CBD5E1;border-radius:2px;transition:border-color .2s,color .2s;" class="country-tag">{{ country }}</span>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- FOR BUSINESS -->
    <section class="section">
      <div class="split-3">
        <FadeUp>
          <div class="section-tag">{{ $t('about.tag3') }}</div>
          <h2 class="section-title">{{ $t('about.h_biz') }}</h2>
          <p class="section-sub" style="margin-top:1rem;">{{ $t('about.p_biz') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <div class="grid-2">
            <div class="biz-card">
              <div style="width:48px;height:48px;border-radius:50%;background:var(--accent-subtle);border:1px solid var(--accent-20);display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="1.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
              </div>
              <h3 style="font-family:var(--font-h);font-weight:700;font-size:1.15rem;margin-bottom:.75rem;">{{ $t('about.b1h') }}</h3>
              <p style="font-size:.88rem;color:#CBD5E1;line-height:1.7;">{{ $t('about.b1p') }}</p>
            </div>
            <div class="biz-card">
              <div style="width:48px;height:48px;border-radius:50%;background:var(--accent-subtle);border:1px solid var(--accent-20);display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
              </div>
              <h3 style="font-family:var(--font-h);font-weight:700;font-size:1.15rem;margin-bottom:.75rem;">{{ $t('about.b2h') }}</h3>
              <p style="font-size:.88rem;color:#CBD5E1;line-height:1.7;">{{ $t('about.b2p') }}</p>
            </div>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- TEAM APPROACH -->
    <section class="section section-dark">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('about.team_tag') }}</div>
          <h2 class="section-title">{{ $t('about.team_h') }}</h2>
          <p style="color:#CBD5E1;font-size:1rem;line-height:1.8;margin-bottom:1.5rem;">{{ $t('about.team_p1') }}</p>
          <p style="color:#CBD5E1;font-size:1rem;line-height:1.8;">{{ $t('about.team_p2') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <div style="display:flex;flex-direction:column;gap:1px;background:var(--border);border:1px solid var(--border);">
            <div v-for="i in 3" :key="i" style="background:var(--gray1);padding:1.75rem 2rem;display:flex;align-items:center;gap:1.25rem;">
              <div style="width:40px;height:40px;border-radius:50%;background:var(--accent-subtle);border:1px solid var(--accent-20);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg v-if="i===1" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="1.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
                <svg v-if="i===2" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="1.5"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4"/></svg>
                <svg v-if="i===3" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
              </div>
              <div>
                <div style="font-family:var(--font-h);font-weight:700;font-size:.95rem;margin-bottom:.2rem;">{{ $t('about.team' + i + 'h') }}</div>
                <div style="font-size:.82rem;color:#CBD5E1;line-height:1.5;">{{ $t('about.team' + i + 'p') }}</div>
              </div>
            </div>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- CTA -->
    <section class="section section-cta">
      <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:600px;height:600px;background:radial-gradient(circle,rgba(79,142,255,.08) 0%,transparent 60%);pointer-events:none;"></div>
      <FadeUp style="position:relative;z-index:1;max-width:600px;margin:0 auto;">
        <div class="section-tag" style="justify-content:center;">{{ $t('about.cta_tag') }}</div>
        <h2 class="section-title" style="font-size:clamp(2.5rem,5vw,4rem);margin-bottom:1.25rem;">{{ $t('about.cta_h') }}</h2>
        <p style="color:#CBD5E1;font-size:1.05rem;margin-bottom:2.5rem;">{{ $t('about.cta_p') }}</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
          <router-link to="/contacts" class="btn btn-primary">{{ $t('about.cta_btn1') }}</router-link>
          <router-link to="/services" class="btn btn-outline">{{ $t('about.cta_btn2') }}</router-link>
        </div>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';

const { t } = useI18n();

const stats = computed(() => [
  { num: '120+', label: t('about.stat1') },
  { num: '6+', label: t('about.stat2') },
  { num: '$50', label: t('about.stat3') },
  { num: '24h', label: t('about.stat4') },
]);

const countries = [
  'Azerbaijan', 'USA', 'Germany', 'Vietnam', 'Turkey',
  'UAE', 'Georgia', 'Russia', 'UK', 'Canada',
  'Netherlands', 'Israel',
];
</script>
