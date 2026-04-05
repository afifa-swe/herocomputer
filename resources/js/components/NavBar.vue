<template>
  <nav id="nav" :class="{ scrolled: isScrolled }">
    <router-link class="nav-logo" to="/">HERO<span>COMPUTER</span></router-link>
    <ul class="nav-links">
      <li v-for="link in navLinks" :key="link.name">
        <router-link :to="link.path" :class="{ active: $route.name === link.name }">{{ $t('nav.' + link.name) }}</router-link>
      </li>
    </ul>
    <div class="nav-right">
      <div class="lang-switcher">
        <button v-for="lang in ['ru', 'en', 'az']" :key="lang" class="lang-btn" :class="{ active: locale === lang }" @click="setLang(lang)">{{ lang.toUpperCase() }}</button>
      </div>
      <button class="nav-cta" @click="popupOpen = true"><span class="nav-cta-text">{{ $t('nav.cta') }}</span></button>
      <button class="burger" :class="{ open: menuOpen }" aria-label="Menu" @click="menuOpen = !menuOpen">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
  <div class="mobile-menu" :class="{ open: menuOpen }">
    <router-link v-for="link in navLinks" :key="link.name" :to="link.path" @click="menuOpen = false">{{ $t('nav.' + link.name) }}</router-link>
    <button class="btn btn-primary mobile-menu-cta" @click="menuOpen = false; popupOpen = true">{{ $t('nav.cta') }}</button>
    <div class="mobile-menu-lang">
      <button v-for="lang in ['ru', 'en', 'az']" :key="lang" class="lang-btn" :class="{ active: locale === lang }" @click="setLang(lang)">{{ lang.toUpperCase() }}</button>
    </div>
  </div>

  <!-- POPUP -->
  <Teleport to="body">
    <Transition name="popup">
      <div v-if="popupOpen" class="popup-overlay" @click.self="popupOpen = false">
        <div class="popup-box">
          <button class="popup-close" @click="popupOpen = false" aria-label="Close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 5l10 10M15 5L5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
          </button>
          <h3 class="popup-title">{{ $t('nav.popup_title') }}</h3>
          <p class="popup-desc">{{ $t('nav.popup_desc') }}</p>
          <form @submit.prevent="submitPopup" class="popup-form">
            <input type="text" v-model="popupForm.name" :placeholder="$t('home.f_name')" required />
            <input type="text" v-model="popupForm.contact" :placeholder="$t('home.f_contact')" required />
            <textarea v-model="popupForm.message" :placeholder="$t('home.f_msg')" rows="3"></textarea>
            <button type="submit" class="btn btn-primary popup-submit" :disabled="popupLoading">
              {{ popupLoading ? '...' : $t('home.f_send') }}
            </button>
          </form>
          <div v-if="popupSent" class="popup-success">{{ $t('nav.popup_sent') }}</div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted, watch } from 'vue';
import { useI18n } from 'vue-i18n';
import { useRoute } from 'vue-router';

const { locale } = useI18n();
const route = useRoute();

const isScrolled = ref(false);
const menuOpen = ref(false);

const navLinks = [
  { name: 'home', path: '/' },
  { name: 'portfolio', path: '/portfolio' },
  { name: 'about', path: '/about' },
  { name: 'services', path: '/services' },
  { name: 'cases', path: '/cases' },
  { name: 'developers', path: '/developers' },
  { name: 'contacts', path: '/contacts' },
];

function setLang(lang) {
  locale.value = lang;
}

function handleScroll() {
  isScrolled.value = window.scrollY > 20;
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
  handleScroll();
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

watch(() => route.path, () => {
  menuOpen.value = false;
});

// Popup
const popupOpen = ref(false);
const popupForm = reactive({ name: '', contact: '', message: '' });
const popupLoading = ref(false);
const popupSent = ref(false);

async function submitPopup() {
  popupLoading.value = true;
  try {
    const res = await fetch('/api/contact/project', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(popupForm),
    });
    if (res.ok) {
      popupSent.value = true;
      popupForm.name = '';
      popupForm.contact = '';
      popupForm.message = '';
      setTimeout(() => { popupSent.value = false; popupOpen.value = false; }, 2500);
    }
  } catch (e) { /* silent */ }
  popupLoading.value = false;
}

watch(popupOpen, (val) => {
  document.body.style.overflow = val ? 'hidden' : '';
});
</script>

<style scoped>
.popup-overlay {
  position: fixed;
  inset: 0;
  z-index: 9999;
  background: rgba(0,0,0,0.7);
  backdrop-filter: blur(6px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}
.popup-box {
  position: relative;
  background: #0F0F1A;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;
  padding: 3rem 3.5rem;
  width: 100%;
  max-width: 580px;
}
.popup-close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: none;
  border: none;
  color: #94A3B8;
  cursor: pointer;
  padding: 4px;
  transition: color .2s;
}
.popup-close:hover { color: #fff; }
.popup-title {
  font-family: var(--font-h);
  font-size: 1.75rem;
  font-weight: 800;
  margin-bottom: .75rem;
  color: #fff;
}
.popup-desc {
  font-size: 1rem;
  color: #94A3B8;
  margin-bottom: 2rem;
  line-height: 1.6;
}
.popup-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.popup-form input,
.popup-form textarea {
  width: 100%;
  padding: .9rem 1.15rem;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 8px;
  color: #fff;
  font-size: 1rem;
  font-family: var(--font-body);
  outline: none;
  transition: border-color .2s;
  box-sizing: border-box;
}
.popup-form input:focus,
.popup-form textarea:focus {
  border-color: var(--accent);
}
.popup-form textarea {
  resize: vertical;
  min-height: 100px;
}
.popup-submit {
  width: 100%;
  margin-top: .25rem;
}
.popup-success {
  text-align: center;
  color: var(--accent);
  font-size: .9rem;
  margin-top: 1rem;
  font-weight: 600;
}

.popup-enter-active,
.popup-leave-active {
  transition: opacity .25s ease;
}
.popup-enter-active .popup-box,
.popup-leave-active .popup-box {
  transition: transform .25s ease;
}
.popup-enter-from,
.popup-leave-to {
  opacity: 0;
}
.popup-enter-from .popup-box {
  transform: translateY(20px) scale(.97);
}
.popup-leave-to .popup-box {
  transform: translateY(10px) scale(.98);
}
</style>
