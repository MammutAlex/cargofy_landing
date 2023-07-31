<template>
  <q-select
    dense
    v-bind="$attrs"
    outlined
    :options="list"
    hide-bottom-space
    no-error-icon
    v-model="activeValue"
    :label="label"
    :error="error ? true : false"
    use-input
    input-debounce="0"
    @filter="filterFn"
  />
</template>

<script setup>
const emit = defineEmits(["update:model-value", "blur", "update:error"])

const { locale } = useI18n({ useScope: "global" })
const props = defineProps({
  options: {},
  error: {},
  exclude: {
    type: Array,
    default: [],
  },
  modelValue: {},
  label: {
    type: [String, null],
  },
})
const options = ref(props.options)

const list = computed(() => {
  return options.value?.filter((o) => !props.exclude.includes(o.alias))
})

const activeValue = computed({
  get() {
    return options.value?.find((item) => item.alias === props.modelValue?.alias)
  },
  set(newValue) {
    emit("update:model-value", newValue ? newValue : {})
    emit("update:error", false)
  },
})

function filterFn(val, update) {
  if (val === "") {
    update(() => {
      options.value = props.options
    })
    return
  }

  update(() => {
    const needle = val.toLowerCase()
    options.value = props.options.filter(
      (v) => v.city.toLowerCase().indexOf(needle) > -1,
    )
  })
}
</script>
