<template>
  <footer>
    <div class="footer-top">
      <div>
        <span class="footer-logo">HERO<span>COMPUTER</span></span>
        <p class="footer-tagline">{{ $t('footer.tagline') }}</p>
      </div>
      <div class="footer-col">
        <h4>{{ $t('footer.nav') }}</h4>
        <ul>
          <li v-for="link in navLinks" :key="link.name">
            <router-link :to="link.path">{{ $t('nav.' + link.name) }}</router-link>
          </li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>{{ $t('footer.contacts') }}</h4>
        <ul>
          <li><a href="mailto:javid.jafarov.ag@gmail.com">javid.jafarov.ag@gmail.com</a></li>
          <li><a href="https://t.me/flutter_javid_dev" target="_blank">@flutter_javid_dev</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Tech</h4>
        <ul>
          <li><a href="#">Flutter · React · Next.js</a></li>
          <li><a href="#">Node.js · Python · Go</a></li>
          <li><a href="#">AWS · GCP · Docker</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-copy">{{ $t('footer.copy') }}</p>
      <div class="lang-switcher">
        <button v-for="lang in ['ru', 'en', 'az']" :key="lang" class="lang-btn" :class="{ active: locale === lang }" @click="setLang(lang)">{{ lang.toUpperCase() }}</button>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
import { useRoute } from 'vue-router';

const { locale } = useI18n();
const route = useRoute();

const navLinks = [
  { name: 'home', path: '/' },
  { name: 'about', path: '/about' },
  { name: 'services', path: '/services' },
  { name: 'cases', path: '/cases' },
  { name: 'portfolio', path: '/portfolio' },
  { name: 'developers', path: '/developers' },
  { name: 'contacts', path: '/contacts' },
];

function setLang(lang) {
  locale.value = lang;
}
</script>
