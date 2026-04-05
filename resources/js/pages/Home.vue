<template>
  <div class="page active">
    <!-- HERO -->
    <section class="hero">
      <div class="hero-bg"></div>
      <div class="hero-blob1"></div>
      <div class="hero-blob2"></div>
      <div class="hero-left">
        <div class="hero-eyebrow">{{ $t('home.eyebrow') }}</div>
        <h1>
          <span>{{ $t('home.h1a') }}</span>
          <span>{{ $t('home.h1b') }}</span>
          <em>{{ $t('home.h1c') }}</em>
        </h1>
        <p class="hero-desc">{{ $t('home.desc') }}</p>
        <div class="hero-actions">
          <router-link to="/contacts" class="btn btn-primary">{{ $t('home.cta1') }}</router-link>
          <router-link to="/services" class="arrow-link">{{ $t('home.cta2') }}</router-link>
        </div>
      </div>
      <div class="hero-right">
        <div class="hero-stat-block">
          <div class="hero-stat-num">{{ $t('home.stat1_num') }}</div>
          <div class="hero-stat-label">{{ $t('home.stat1_label') }}</div>
          <div class="hero-stat-desc">{{ $t('home.stat1_desc') }}</div>
        </div>
        <div class="hero-stat-block">
          <div class="hero-stat-num">{{ $t('home.stat2_num') }}</div>
          <div class="hero-stat-label">{{ $t('home.stat2_label') }}</div>
          <div class="hero-stat-desc">{{ $t('home.stat2_desc') }}</div>
        </div>
        <div class="hero-stat-block">
          <div class="hero-stat-num">{{ $t('home.stat3_num') }}</div>
          <div class="hero-stat-label">{{ $t('home.stat3_label') }}</div>
          <div class="hero-stat-desc">{{ $t('home.stat3_desc') }}</div>
        </div>
      </div>
    </section>

    <!-- MARQUEE -->
    <div class="marquee-wrap">
      <div class="marquee-track">
        <template v-for="n in 2" :key="n">
          <template v-for="i in 7" :key="'m'+n+'-'+i">
            <span>{{ $t('home.mar' + i) }}</span>
            <span class="marquee-dot"></span>
          </template>
        </template>
      </div>
    </div>

    <!-- ABOUT -->
    <section class="section">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('home.about_tag') }}</div>
          <h2 class="section-title" v-html="$t('home.about_h').replace('\\n','<br>')"></h2>
          <p class="section-sub">{{ $t('home.about_p') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <div class="grid-2">
            <div class="card" style="border:1px solid var(--border)">
              <svg class="card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="4" width="32" height="32" rx="3"/><path d="M14 20h12M20 14v12"/></svg>
              <h3>{{ $t('home.c1h') }}</h3>
              <p>{{ $t('home.c1p') }}</p>
            </div>
            <div class="card" style="border:1px solid var(--border)">
              <svg class="card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="20" r="15"/><path d="M20 10v10l6 4"/></svg>
              <h3>{{ $t('home.c2h') }}</h3>
              <p>{{ $t('home.c2p') }}</p>
            </div>
            <div class="card" style="border:1px solid var(--border)">
              <svg class="card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 28l10-10 7 7 11-16"/></svg>
              <h3>{{ $t('home.c3h') }}</h3>
              <p>{{ $t('home.c3p') }}</p>
            </div>
            <div class="card" style="border:1px solid var(--border)">
              <svg class="card-icon" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="14" r="6"/><path d="M6 34c0-7.7 6.3-14 14-14s14 6.3 14 14"/></svg>
              <h3>{{ $t('home.c4h') }}</h3>
              <p>{{ $t('home.c4p') }}</p>
            </div>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- SERVICES PREVIEW -->
    <section class="section section-dark">
      <div class="section-header">
        <FadeUp>
          <div class="section-tag">{{ $t('home.sv_tag') }}</div>
          <h2 class="section-title" v-html="$t('home.sv_h').replace('\\n','<br>')"></h2>
        </FadeUp>
        <FadeUp :delay="100">
          <router-link to="/services" class="arrow-link">{{ $t('home.sv_more') }}</router-link>
        </FadeUp>
      </div>
      <FadeUp>
        <div class="grid-3">
          <div v-for="i in 6" :key="i" class="card card-dark">
            <span class="card-accent-bar"></span>
            <div class="card-num">{{ String(i).padStart(2, '0') }}</div>
            <h3>{{ $t('home.s' + i + 'h') }}</h3>
            <p>{{ $t('home.s' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- STANDARDS -->
    <section class="section">
      <FadeUp style="max-width:600px;margin-bottom:4rem;">
        <div class="section-tag">{{ $t('home.st_tag') }}</div>
        <h2 class="section-title" v-html="$t('home.st_h').replace('\\n','<br>')"></h2>
        <p class="section-sub">{{ $t('home.st_sub') }}</p>
      </FadeUp>
      <FadeUp>
        <div class="standards-grid">
          <div v-for="i in 8" :key="i" class="std-item">
            <div class="std-check">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2.5 7L5.5 10L11.5 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3>{{ $t('home.std' + i + 'h') }}</h3>
            <p>{{ $t('home.std' + i + 'p') }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- PRICING -->
    <section class="section section-dark">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('home.pr_tag') }}</div>
          <h2 class="section-title" v-html="$t('home.pr_h').replace('\\n','<br>')"></h2>
          <p style="color:var(--muted);font-size:1rem;line-height:1.75;margin-bottom:1rem;">{{ $t('home.pr_right1') }}</p>
          <p style="color:var(--muted);font-size:1rem;line-height:1.75;margin-bottom:2rem;">{{ $t('home.pr_right2') }}</p>
          <router-link to="/contacts" class="btn btn-primary">{{ $t('home.pr_cta') }}</router-link>
        </FadeUp>
        <FadeUp :delay="100">
          <div class="pricing-box">
            <div class="pricing-badge">{{ $t('home.pr_badge') }}</div>
            <div class="pricing-label">{{ $t('home.pr_label') }}</div>
            <div class="pricing-amount">
              <span class="pricing-sym">$</span>
              <span>50</span>
              <span class="pricing-per">{{ $t('home.pr_per') }}</span>
            </div>
            <p class="pricing-desc">{{ $t('home.pr_desc') }}</p>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- CASES PREVIEW -->
    <section class="section">
      <div class="section-header">
        <FadeUp>
          <div class="section-tag">{{ $t('home.cs_tag') }}</div>
          <h2 class="section-title" v-html="$t('home.cs_h').replace('\\n','<br>')"></h2>
        </FadeUp>
        <FadeUp :delay="100">
          <router-link to="/cases" class="arrow-link">{{ $t('home.cs_more') }}</router-link>
        </FadeUp>
      </div>
      <FadeUp>
        <div class="cases-grid">
          <router-link v-for="(cs, idx) in casesPreviews" :key="idx" :to="'/cases/' + idx" class="case-card" style="display:block;">
            <div class="case-arrow">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 12L12 2M12 2H5M12 2V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="case-card-img" :style="{ background: cs.bg }">{{ cs.label }}</div>
            <div class="case-tag">{{ $t('home.c' + (idx+1) + 'tag') }}</div>
            <h3>{{ $t('home.c' + (idx+1) + 'h2') }}</h3>
            <p>{{ $t('home.c' + (idx+1) + 'p2') }}</p>
          </router-link>
        </div>
      </FadeUp>
    </section>

    <!-- DEV TEASER -->
    <section class="section section-dark">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('home.dev_tag') }}</div>
          <h2 class="section-title">{{ $t('home.dev_h') }}</h2>
          <p style="color:var(--muted);font-size:1rem;line-height:1.75;margin-bottom:2rem;">{{ $t('home.dev_p') }}</p>
          <router-link to="/developers" class="btn btn-primary">{{ $t('home.dev_cta') }}</router-link>
        </FadeUp>
        <FadeUp :delay="100">
          <div class="dev-teaser-grid">
            <div style="background:var(--gray1);padding:2rem;text-align:center;">
              <div style="font-family:var(--font-h);font-size:2.5rem;font-weight:800;color:var(--accent-light);">$50</div>
              <div style="font-size:.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:.1em;margin-top:.5rem;">{{ $t('developers.rate_per') }}</div>
            </div>
            <div style="background:var(--gray1);padding:2rem;text-align:center;">
              <div style="font-family:var(--font-h);font-size:2.5rem;font-weight:800;color:var(--white);">20+</div>
              <div style="font-size:.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:.1em;margin-top:.5rem;">Tech Stack</div>
            </div>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- CONTACT CTA -->
    <section class="section section-dark section-cta">
      <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:600px;height:600px;background:radial-gradient(circle,rgba(27,94,59,.08) 0%,transparent 60%);pointer-events:none;"></div>
      <div style="position:relative;z-index:1;max-width:640px;margin:0 auto;">
        <div class="section-tag" style="justify-content:center;">{{ $t('home.contact_tag') }}</div>
        <h2 class="section-title" style="font-size:clamp(2.5rem,6vw,5rem);margin-bottom:1.25rem;">{{ $t('home.contact_h') }}</h2>
        <p style="color:var(--muted);font-size:1.05rem;margin-bottom:3rem;">{{ $t('home.contact_p') }}</p>
        <form style="text-align:left;" @submit.prevent="submitHomeForm">
          <div class="form-row">
            <input type="text" v-model="homeForm.name" :placeholder="$t('home.f_name')" required>
            <input type="text" v-model="homeForm.contact" :placeholder="$t('home.f_contact')" required>
          </div>
          <div class="form-group">
            <textarea v-model="homeForm.message" :placeholder="$t('home.f_msg')"></textarea>
          </div>
          <button type="submit" class="btn-submit" :disabled="homeLoading">
            {{ homeLoading ? '...' : $t('home.f_send') }}
          </button>
          <div v-if="homeSent" style="margin-top:1rem;color:var(--accent-light);font-size:.9rem;">✓</div>
        </form>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import FadeUp from '../components/FadeUp.vue';

const casesPreviews = [
  { label: 'VIEON', bg: 'linear-gradient(135deg,#1a2a1a,#0a1a0a)' },
  { label: 'NO THERE, THERE', bg: 'linear-gradient(135deg,#1a1a2a,#0a0a1a)' },
  { label: 'Rx+', bg: 'linear-gradient(135deg,#1a1510,#2a1a08)' },
  { label: 'OLA', bg: 'linear-gradient(135deg,#101a1a,#081218)' },
];

const homeForm = reactive({ name: '', contact: '', message: '' });
const homeLoading = ref(false);
const homeSent = ref(false);

async function submitHomeForm() {
  homeLoading.value = true;
  try {
    const res = await fetch('/api/contact/project', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(homeForm),
    });
    if (res.ok) {
      homeSent.value = true;
      homeForm.name = '';
      homeForm.contact = '';
      homeForm.message = '';
      setTimeout(() => { homeSent.value = false; }, 5000);
    }
  } catch (e) { /* silent */ }
  homeLoading.value = false;
}
</script>
