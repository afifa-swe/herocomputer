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
      <router-link to="/contacts" class="nav-cta"><span class="nav-cta-text">{{ $t('nav.cta') }}</span></router-link>
      <button class="burger" :class="{ open: menuOpen }" aria-label="Menu" @click="menuOpen = !menuOpen">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
  <div class="mobile-menu" :class="{ open: menuOpen }">
    <router-link v-for="link in navLinks" :key="link.name" :to="link.path" @click="menuOpen = false">{{ $t('nav.' + link.name) }}</router-link>
    <router-link to="/contacts" class="btn btn-primary mobile-menu-cta" @click="menuOpen = false">{{ $t('nav.cta') }}</router-link>
    <div class="mobile-menu-lang">
      <button v-for="lang in ['ru', 'en', 'az']" :key="lang" class="lang-btn" :class="{ active: locale === lang }" @click="setLang(lang)">{{ lang.toUpperCase() }}</button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
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
</script>
