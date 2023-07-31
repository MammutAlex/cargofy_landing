<template>
  <q-input
    dense
    v-bind="$attrs"
    outlined
    :model-value="modelValue"
    @update:model-value="send"
    hide-bottom-space
    no-error-icon
    :type="type"
    @keydown="emit('update:error', '')"
    :error="error ? true : false"
    :error-message="error?.[0]"
  >
    <template #append>
      <slot name="append" />
    </template>
    <template #prepend>
      <slot name="prepend" />
    </template>
  </q-input>
</template>


<script setup>
const emit = defineEmits(["update:model-value", "update:error"])
const props = defineProps({
  modelValue: {},
  error: {},
  type: {
    default: "text",
    type: String,
  },
})

function send(val) {
  if (props.type == "number") {
    val = +("" + val).replace(",", ".")
  }
  emit("update:model-value", val)
}
</script>


<style lang="scss">
.q-field--outlined {
  .q-field--outlined {
    .q-field__control {
      padding-right: 0 !important;
      &:before {
        border: none !important;
      }
      &:after {
        content: none !important;
      }
    }
    .q-field__native {
      padding-top: 2px !important;
    }
  }
}
</style>
