<template>
  <q-btn
    @click.stop.prevent="toggleTooltip"
    round
    dense
    flat
    color="grey-4"
    v-bind="$attrs"
    :icon="icon"
  >
    <q-tooltip v-model="tooltipShow" class="text-body2 tw-max-w-[320px]">
      <div v-click-outside="close"><slot /></div>
    </q-tooltip>
  </q-btn>
</template>

<script setup>
const props = defineProps({
  icon: {
    type: String,
    default: "info_outline",
  },
})

const tooltipShow = ref(false)

function close() {
  tooltipShow.value = false
}

function toggleTooltip() {
  tooltipShow.value = !tooltipShow.value
}
</script>
