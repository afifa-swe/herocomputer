<template>
  <div class="page active">
    <section class="dev-hero">
      <div class="page-hero-bg"></div>
      <div class="page-hero-blob"></div>
      <div class="page-hero-inner">
        <div class="section-tag">{{ $t('developers.eyebrow') }}</div>
        <h1 style="font-family:var(--font-h);font-weight:800;font-size:clamp(3rem,7vw,6.5rem);line-height:.95;letter-spacing:-.03em;">
          <span>{{ $t('developers.h1a') }}</span><br>
          <em style="color:var(--accent-light);font-style:normal;">{{ $t('developers.h1b') }}</em>
        </h1>
        <p style="font-size:1.1rem;color:var(--muted);max-width:520px;margin-top:2rem;">{{ $t('developers.desc') }}</p>
      </div>
    </section>

    <!-- Rate -->
    <section class="section section-dark" style="padding:4rem 3.5rem;">
      <div class="split">
        <FadeUp>
          <div class="pricing-box">
            <div class="pricing-badge">{{ $t('developers.rate_label') }}</div>
            <div class="pricing-amount">
              <span class="pricing-sym">$</span>
              <span>50</span>
              <span class="pricing-per">{{ $t('developers.rate_per') }}</span>
            </div>
            <p class="pricing-desc" style="margin-top:1.5rem;">Remote · Worldwide · Project-based</p>
          </div>
        </FadeUp>
        <FadeUp :delay="100">
          <p style="font-size:1.05rem;color:var(--muted);line-height:1.8;">We work with the best developers remotely. Fair pay, interesting projects, strict but fair standards. Join a team that takes quality seriously.</p>
          <div style="margin-top:2rem;display:flex;gap:1rem;flex-wrap:wrap;">
            <span style="padding:.4rem 1rem;border:1px solid rgba(27,94,59,.4);color:var(--accent-light);font-size:.8rem;border-radius:2px;">Remote First</span>
            <span style="padding:.4rem 1rem;border:1px solid var(--border);color:var(--muted);font-size:.8rem;border-radius:2px;">Flexible Hours</span>
            <span style="padding:.4rem 1rem;border:1px solid var(--border);color:var(--muted);font-size:.8rem;border-radius:2px;">Long-term Projects</span>
          </div>
        </FadeUp>
      </div>
    </section>

    <!-- Requirements -->
    <section class="section">
      <FadeUp style="margin-bottom:3rem;">
        <div class="section-tag">{{ $t('developers.req_tag') }}</div>
        <h2 class="section-title">Requirements</h2>
      </FadeUp>
      <FadeUp>
        <div class="dev-requirements">
          <div v-for="(req, idx) in reqs" :key="idx" class="dev-req-item">
            <div class="dev-req-num">{{ req.num }}</div>
            <h3>{{ req.h }}</h3>
            <p>{{ req.p }}</p>
          </div>
        </div>
      </FadeUp>
    </section>

    <!-- Stack -->
    <section class="section section-dark">
      <FadeUp style="margin-bottom:2.5rem;">
        <div class="section-tag">{{ $t('developers.stack_tag') }}</div>
        <h2 class="section-title">{{ $t('developers.stack_h') }}</h2>
      </FadeUp>
      <FadeUp>
        <div>
          <span v-for="s in stacks" :key="s" style="display:inline-block;padding:.4rem .9rem;border:1px solid rgba(240,237,232,.12);font-size:.82rem;color:rgba(240,237,232,.6);border-radius:2px;margin:.3rem;">{{ s }}</span>
        </div>
      </FadeUp>
    </section>

    <!-- Apply -->
    <section class="section">
      <div class="split">
        <FadeUp>
          <div class="section-tag">{{ $t('developers.apply_tag') }}</div>
          <h2 class="section-title">{{ $t('developers.apply_h') }}</h2>
          <p style="color:var(--muted);font-size:1rem;line-height:1.75;margin-top:1rem;">{{ $t('developers.apply_p') }}</p>
        </FadeUp>
        <FadeUp :delay="100">
          <form @submit.prevent="submitDevForm">
            <div class="form-row">
              <input type="text" v-model="devForm.name" :placeholder="$t('developers.f_name')" required>
              <input type="text" v-model="devForm.telegram" :placeholder="$t('developers.f_tg')" required>
            </div>
            <div class="form-row">
              <input type="text" v-model="devForm.stack" :placeholder="$t('developers.f_stack')" required>
              <input type="text" v-model="devForm.experience" :placeholder="$t('developers.f_exp')">
            </div>
            <div class="form-group">
              <input type="url" v-model="devForm.portfolio_link" :placeholder="$t('developers.f_link')">
            </div>
            <div class="form-group">
              <textarea v-model="devForm.about" :placeholder="$t('developers.f_about')"></textarea>
            </div>
            <button type="submit" class="btn-submit" :disabled="devLoading">
              {{ devLoading ? '...' : $t('developers.f_send') }}
            </button>
            <div v-if="devSent" style="margin-top:1rem;color:var(--accent-light);font-size:.9rem;">✓</div>
          </form>
        </FadeUp>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from 'vue';
import { useI18n } from 'vue-i18n';
import FadeUp from '../components/FadeUp.vue';

const { tm } = useI18n();

const reqs = computed(() => tm('developers.reqs') || []);
const stacks = computed(() => tm('developers.stacks') || []);

const devForm = reactive({ name: '', telegram: '', stack: '', experience: '', portfolio_link: '', about: '' });
const devLoading = ref(false);
const devSent = ref(false);

async function submitDevForm() {
  devLoading.value = true;
  try {
    const res = await fetch('/api/contact/developer', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(devForm),
    });
    if (res.ok) {
      devSent.value = true;
      Object.assign(devForm, { name: '', telegram: '', stack: '', experience: '', portfolio_link: '', about: '' });
      setTimeout(() => { devSent.value = false; }, 5000);
    }
  } catch (e) { /* silent */ }
  devLoading.value = false;
}
</script>
