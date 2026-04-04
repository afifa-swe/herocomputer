<template>
  <NavBar />
  <router-view v-slot="{ Component }">
    <transition name="page-fade" mode="out-in">
      <component :is="Component" />
    </transition>
  </router-view>
  <FooterBlock />
</template>

<script setup>
import { watch } from 'vue';
import { useI18n } from 'vue-i18n';
import { useRoute } from 'vue-router';
import NavBar from './components/NavBar.vue';
import FooterBlock from './components/FooterBlock.vue';

const { t, locale } = useI18n();
const route = useRoute();

function updateTitle() {
  document.title = t('meta.title');
}

watch(locale, updateTitle);
watch(() => route.name, updateTitle);
updateTitle();
</script>
