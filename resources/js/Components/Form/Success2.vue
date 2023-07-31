<template>
  <div
    class="
      tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10
      flex
      items-center
      q-px-md
      bg-grey-2
    "
  >
    <div>
      <div class="text-subtitle2 q-mb-sm">
        <span>{{ title }}</span>
      </div>
      <div class="q-mb-sm tw-max-w-[360px]">
        {{ text }}
      </div>

      <q-btn
        no-caps
        color="blue-grey-3"
        icon="done"
        style="min-width: 150px"
        disable
        unelevated
        :label="$t('form.Sent')"
      />
    </div>
  </div>
</template>




<script setup>
const props = defineProps({
  title: {},
  text: {},
})
</script>