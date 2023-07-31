<template>
  <div class="md:tw-text-center tw-mb-6 md:tw-mb-9">
    <div class="text-h6 q-mb-sm">{{ title }}</div>
    <slot>
      <div
        class="text-body1 q-mx-auto md:tw-max-w-[60%]"
        v-if="text"
        v-html="text"
      ></div>
    </slot>
  </div>
</template>

<script setup>
const props = defineProps({
  title: {
    default: "",
  },
  text: {
    default: "",
  },
})
</script>