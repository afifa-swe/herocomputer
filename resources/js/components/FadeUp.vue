<template>
  <div ref="el" class="fade-up" :class="{ in: visible }" :style="{ transitionDelay: delay + 'ms' }">
    <slot />
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';

const props = defineProps({
  delay: { type: Number, default: 0 },
});

const el = ref(null);
const visible = ref(false);
let observer = null;

onMounted(() => {
  nextTick(() => {
    observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            visible.value = true;
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.05, rootMargin: '50px 0px' }
    );
    if (el.value) {
      observer.observe(el.value);
    }
  });
});

onUnmounted(() => {
  if (observer) {
    observer.disconnect();
  }
});
</script>
