<template>
  <div class="container" v-show="slots.default">
    <div class="text-caption text-inner tw-overflow-hidden" :class="{'seo-text-hide text-grey-3': isHidden}">
      <slot />
    </div>
    <div class="text-center q-mt-md" v-if="isHidden">
      <a href="#" @click.prevent="toggleIsHidden" class="text-body2 text-weight-medium">
        {{ $t("seo.expand") }}
      </a>
    </div>
  </div>
</template>
<script setup>
import { useSlots, ref } from 'vue'

const slots = useSlots()
const isHidden = ref(true)

function toggleIsHidden() {
  isHidden.value = !isHidden.value
}
</script>


<style lang="scss">
.seo-text-hide {
  max-height: 250px;
  position: relative;
  &:before {
    content: "";
    position: absolute;
    background: linear-gradient(
      to bottom,
      rgba(255, 255, 255, 0) 0%,
      rgba(255, 255, 255, 1) 100%
    );
    left: 0;
    right: 0;
    bottom: 0;
    height: 100px;
  }
}
</style>