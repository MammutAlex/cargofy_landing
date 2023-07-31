<template>
  <div class="tw-flex tw-gap-x-4">
    <div
      class="tw-w-[17px] tw-flex-shrink-0 tw-relative tw-flex tw-items-center"
    >
      <div
        v-if="!last"
        :class="[bottomDistanceClass, connectClass]"
        class="tw-border-r tw-border-gray-400 tw-absolute tw-left-[8px]"
      />
      <div
        :class="topDistanceClass"
        class="
          tw-absolute
          tw-left-0
          tw-right-0
          tw-h-[17px]
          tw-rounded-full
          tw-border
          tw-border-gray-400
          tw-text-xs
          tw-text-gray-400
          tw-flex
          tw-items-center
          tw-justify-center
        "
      >
        {{ label }}
      </div>
    </div>
    <div class="tw-flex-grow" :class="gapClass">
      <slot />
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  label: {
    type: [String, Number],
    required: true,
  },
  position: {
    type: String,
    default: "sm",
  },
  gap: {
    type: String,
    default: "lg",
  },
  last: {
    type: Boolean,
    default: false,
  },
  connect: {
    type: String,
    default: "dashed",
  },
});

const connectClass = computed(() => {
  switch (props.connect) {
    case "solid":
      return "tw-border-solid";
    default:
    case "dashed":
      return "tw-border-dashed";
  }
});

const topDistanceClass = computed(() => {
  switch (props.position) {
    case "xs":
      return "tw-top-[4px]";
    default:
    case "sm":
      return "tw-top-[8px]";
  }
});

const bottomDistanceClass = computed(() => {
  switch (props.position) {
    case "xs":
      return "tw--bottom-[4px] tw-top-[21px]";
    default:
    case "sm":
      return "tw--bottom-[8px] tw-top-[25px]";
  }
});

const gapClass = computed(() => {
  if (props.last) {
    return "";
  } else {
    switch (props.gap) {
      case "xs":
        return "q-pb-xs";
      case "sm":
        return "q-pb-sm";
      case "md":
        return "q-pb-md";
      case "lg":
        return "q-pb-lg";
      default:
        return props.gap;
    }
  }
});
</script>
