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
        <p style="font-size:1.1rem;color:#CBD5E1;max-width:500px;margin-top:2rem;">{{ $t('cases.desc') }}</p>
      </div>
    </section>

    <section class="section">
      <FadeUp>
        <div class="cases-grid">
          <router-link v-for="(item, idx) in casesWithPhotos" :key="idx" :to="'/cases/' + idx" class="case-card" style="display:block;text-decoration:none;color:inherit;">
            <div class="case-arrow">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 12L12 2M12 2H5M12 2V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div v-if="item.preview" class="cases-preview">
              <img :src="item.preview" :alt="item.cs.h" class="cases-preview-img" />
              <span class="cases-badge">{{ item.slidesCount }} {{ $t('home.photos_label') }}</span>
            </div>
            <div class="case-tag">{{ item.cs.tag }}</div>
            <h3>{{ item.cs.h }}</h3>
            <p>{{ item.cs.p }}</p>
            <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid var(--border);font-size:.75rem;letter-spacing:.1em;color:#CBD5E1;text-transform:uppercase;">{{ item.cs.tech }}</div>
          </router-link>
        </div>
      </FadeUp>
    </section>

    <section class="section section-dark section-cta">
      <FadeUp style="max-width:560px;margin:0 auto;">
        <h2 class="section-title" style="font-size:clamp(2rem,4vw,3.5rem);">{{ $t('cases.cta_h') }}</h2>
        <p style="color:#CBD5E1;font-size:1rem;margin:1.25rem 0 2.5rem;">{{ $t('cases.cta_p') }}</p>
        <router-link to="/contacts" class="btn btn-primary">{{ $t('cases.cta_btn') }}</router-link>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';

const { tm } = useI18n();
const casesList = computed(() => tm('cases.cases_list') || []);

const portfolioSlides = {
  0: { slug: 'vieon', count: 10 },
  1: { slug: 'pharmacy', count: 10 },
  2: { slug: 'olalearn', count: 10 },
  3: { slug: 'octosells', count: 11 },
  4: { slug: 'zaymekspress', count: 10 },
};

const casesWithPhotos = computed(() =>
  casesList.value.map((cs, idx) => {
    const slides = portfolioSlides[idx];
    return {
      cs,
      idx,
      preview: slides ? `/images/portfolio/slides/${slides.slug}_0.png` : null,
      slidesCount: slides ? slides.count : 0,
    };
  })
);
</script>

<style scoped>
.cases-grid :deep(.case-card) {
  padding: 1.25rem;
}
.cases-grid :deep(.case-card h3) {
  font-size: 1rem;
  margin-bottom: .35rem;
}
.cases-grid :deep(.case-card p) {
  font-size: .8rem;
  line-height: 1.5;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.cases-preview {
  position: relative;
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 1rem;
  background: #0a0a14;
}
.cases-preview-img {
  width: 100%;
  height: 150px;
  object-fit: contain;
  object-position: center;
  display: block;
  background: #0a0a14;
}
.cases-badge {
  position: absolute;
  bottom: 6px;
  right: 6px;
  background: rgba(8,8,16,0.75);
  backdrop-filter: blur(6px);
  border: 1px solid rgba(79,142,255,0.2);
  border-radius: 100px;
  padding: 2px 8px;
  font-size: 10px;
  font-weight: 600;
  color: #4F8EFF;
  letter-spacing: 0.03em;
}
</style>
