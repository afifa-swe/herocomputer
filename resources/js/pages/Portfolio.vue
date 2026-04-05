<template>
  <div class="page active">
    <section class="about-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('portfolio.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('portfolio.h1a') }}</span><br>
          <em style="color:var(--accent);font-style:normal;">{{ $t('portfolio.h1b') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:var(--muted);max-width:500px;margin-top:2rem;">{{ $t('portfolio.desc') }}</p>
      </div>
    </section>

    <section class="section">
      <FadeUp>
        <div class="portfolio-filters">
          <button
            v-for="f in filters"
            :key="f.value"
            class="portfolio-filter-btn"
            :class="{ active: activeFilter === f.value }"
            @click="setFilter(f.value)"
          >{{ f.label }}</button>
        </div>

        <TransitionGroup name="portfolio-card" tag="div" class="cases-grid portfolio-grid">
          <router-link
            v-for="item in filteredCases"
            :key="item.idx"
            :to="'/cases/' + item.idx"
            class="case-card"
            style="display:block;text-decoration:none;color:inherit;"
          >
            <div class="case-arrow">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 12L12 2M12 2H5M12 2V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <CaseVisual :type="item.visual" :label="item.cs.label" :color="item.cs.color" :color2="item.cs.color2" />
            <div class="case-tag">{{ item.cs.tag }}</div>
            <h3>{{ item.cs.h }}</h3>
            <p>{{ item.cs.p }}</p>
            <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid var(--border);font-size:.75rem;letter-spacing:.1em;color:var(--muted);text-transform:uppercase;">{{ item.cs.tech }}</div>
          </router-link>
        </TransitionGroup>

        <div v-if="filteredCases.length === 0" class="portfolio-empty">
          {{ $t('portfolio.empty') }}
        </div>
      </FadeUp>
    </section>

    <section class="section section-dark section-cta">
      <FadeUp style="max-width:560px;margin:0 auto;">
        <h2 class="section-title" style="font-size:clamp(2rem,4vw,3.5rem);">{{ $t('portfolio.cta_h') }}</h2>
        <p style="color:var(--muted);font-size:1rem;margin:1.25rem 0 2.5rem;">{{ $t('portfolio.cta_p') }}</p>
        <router-link to="/contacts" class="btn btn-primary">{{ $t('portfolio.cta_btn') }}</router-link>
      </FadeUp>
    </section>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';
import CaseVisual from '../components/CaseVisual.vue';

const { t, tm } = useI18n();
const casesList = computed(() => tm('cases.cases_list') || []);

const visualTypes = ['vieon', 'web3', 'pharmacy', 'olalearn', 'payflow', 'cargotrack', 'bazario', 'propdesk', 'freshbox', 'teampulse'];
const caseTypes = ['mobile', 'web3', 'mobile', 'web', 'mobile', 'web', 'mobile', 'web', 'mobile', 'web'];

const activeFilter = ref('all');

const filters = computed(() => [
  { value: 'all', label: t('portfolio.filter_all') },
  { value: 'web', label: t('portfolio.filter_web') },
  { value: 'mobile', label: t('portfolio.filter_mobile') },
  { value: 'backend', label: t('portfolio.filter_backend') },
  { value: 'web3', label: t('portfolio.filter_web3') },
  { value: 'design', label: t('portfolio.filter_design') },
]);

const allCases = computed(() =>
  casesList.value.map((cs, idx) => ({
    cs,
    idx,
    visual: visualTypes[idx] || 'default',
    type: caseTypes[idx] || 'web',
  }))
);

const filteredCases = computed(() => {
  if (activeFilter.value === 'all') return allCases.value;
  return allCases.value.filter(c => c.type === activeFilter.value);
});

function setFilter(val) {
  activeFilter.value = val;
}
</script>

<style scoped>
.portfolio-filters {
  display: flex;
  flex-wrap: wrap;
  gap: .5rem;
  margin-bottom: 2.5rem;
  justify-content: center;
}
.portfolio-filter-btn {
  padding: .5rem 1.25rem;
  border-radius: 100px;
  border: 1px solid var(--border);
  background: transparent;
  color: var(--muted);
  font-size: .8rem;
  font-weight: 600;
  letter-spacing: .06em;
  cursor: pointer;
  transition: all .25s;
  font-family: var(--font-body);
}
.portfolio-filter-btn:hover {
  border-color: var(--accent);
  color: var(--accent);
}
.portfolio-filter-btn.active {
  background: #4F8EFF;
  border-color: #4F8EFF;
  color: #fff;
}
.portfolio-grid {
  grid-template-columns: repeat(3, 1fr);
}
.portfolio-empty {
  text-align: center;
  color: var(--muted);
  font-size: 1rem;
  padding: 4rem 0;
}

.portfolio-card-enter-active,
.portfolio-card-leave-active {
  transition: all .35s ease;
}
.portfolio-card-enter-from {
  opacity: 0;
  transform: translateY(20px);
}
.portfolio-card-leave-to {
  opacity: 0;
  transform: scale(.95);
}
.portfolio-card-move {
  transition: transform .35s ease;
}

@media (max-width: 1024px) {
  .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .portfolio-grid { grid-template-columns: 1fr; }
  .portfolio-filters { gap: .4rem; }
  .portfolio-filter-btn { padding: .4rem 1rem; font-size: .75rem; }
}
</style>
