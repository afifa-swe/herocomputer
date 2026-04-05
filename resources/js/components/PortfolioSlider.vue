<template>
  <div class="pslider" v-if="images && images.length">
    <div class="pslider-main">
      <img :src="images[current]" :alt="'Slide ' + (current + 1)" class="pslider-img" @click="next" />
      <button class="pslider-arrow pslider-prev" @click="prev" aria-label="Previous">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M13 4L7 10L13 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="pslider-arrow pslider-next" @click="next" aria-label="Next">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <div class="pslider-counter">{{ current + 1 }} / {{ images.length }}</div>
    </div>
    <div class="pslider-thumbs">
      <button
        v-for="(img, i) in images"
        :key="i"
        class="pslider-thumb"
        :class="{ active: i === current }"
        @click="current = i"
      >
        <img :src="img" :alt="'Thumb ' + (i + 1)" />
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  images: { type: Array, default: () => [] },
});

const current = ref(0);

function prev() {
  current.value = current.value > 0 ? current.value - 1 : props.images.length - 1;
}
function next() {
  current.value = current.value < props.images.length - 1 ? current.value + 1 : 0;
}
</script>

<style scoped>
.pslider { width: 100%; }
.pslider-main {
  position: relative;
  width: 100%;
  border-radius: 12px;
  overflow: hidden;
  background: #0a0a14;
  border: 1px solid rgba(79,142,255,0.1);
}
.pslider-img {
  width: 100%;
  height: 100%;
  max-height: 500px;
  object-fit: contain;
  display: block;
  cursor: pointer;
  user-select: none;
}
.pslider-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(8,8,16,0.7);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.1);
  color: #CBD5E1;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background .2s, color .2s, border-color .2s;
  z-index: 2;
}
.pslider-arrow:hover {
  background: rgba(79,142,255,0.2);
  border-color: #4F8EFF;
  color: #fff;
}
.pslider-prev { left: 12px; }
.pslider-next { right: 12px; }
.pslider-counter {
  position: absolute;
  bottom: 12px;
  right: 12px;
  background: rgba(8,8,16,0.7);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 100px;
  padding: 4px 12px;
  font-size: 12px;
  font-weight: 600;
  color: #CBD5E1;
  letter-spacing: 0.05em;
  z-index: 2;
}
.pslider-thumbs {
  display: flex;
  gap: 6px;
  margin-top: 10px;
  overflow-x: auto;
  padding-bottom: 4px;
  scrollbar-width: thin;
  scrollbar-color: #2A2A4A transparent;
}
.pslider-thumbs::-webkit-scrollbar { height: 3px; }
.pslider-thumbs::-webkit-scrollbar-thumb { background: #2A2A4A; border-radius: 2px; }
.pslider-thumb {
  flex-shrink: 0;
  width: 80px;
  height: 48px;
  border-radius: 6px;
  overflow: hidden;
  border: 2px solid transparent;
  cursor: pointer;
  opacity: 0.5;
  transition: opacity .2s, border-color .2s;
  background: #0a0a14;
  padding: 0;
}
.pslider-thumb:hover { opacity: 0.8; }
.pslider-thumb.active {
  border-color: #4F8EFF;
  opacity: 1;
}
.pslider-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

@media (max-width: 768px) {
  .pslider-arrow { width: 36px; height: 36px; }
  .pslider-prev { left: 8px; }
  .pslider-next { right: 8px; }
  .pslider-thumb { width: 60px; height: 36px; }
}
</style>
