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
import NavBar from './components/NavBar.vue';
import FooterBlock from './components/FooterBlock.vue';
</script>
