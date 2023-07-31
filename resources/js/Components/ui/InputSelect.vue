<template>
  <q-select
    dense
    v-bind="$attrs"
    outlined
    option-value="id"
    option-label="name"
    :options="list"
    hide-bottom-space
    no-error-icon
    v-model="activeValue"
    :label="label"
    :error="error ? true : false"
    clearable
    clear-icon="close"
  />
</template>

<script setup>
const emit = defineEmits([
  "update:model-value",
  "blur",
  "return-object",
  "update:error",
])

const { locale } = useI18n({ useScope: "global" })
const props = defineProps({
  options: {
    type: Array,
    required: true,
  },
  error: {},
  modelValue: {
    type: [Number, String],
    required: false,
  },
  label: {
    type: [String, null],
  },
})

const list = computed(() => {
  return props.options?.map((item) => {
    return {
      ...item,
      name: item?.name[locale.value] || item?.name,
    }
  })
})
const activeValue = computed({
  get() {
    return list.value?.find((item) => item.id === props.modelValue)
  },
  set(newValue) {
    emit("update:model-value", newValue?.id)
    emit("return-object", newValue)
    emit("update:error", false)
  },
})
</script>
