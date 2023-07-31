<template>
  <q-item
    class="q-px-lg"
    :to="link"
    @click="$router.push(link)"
    :active="active"
    clickable
    v-ripple
    :class="{ 'bg-blue-grey-11': active }"
  >
    <!-- <q-item-section avatar>
      <q-icon :color="active ? 'primary' : 'grey-5'" :name="icon" />
    </q-item-section> -->

    <q-item-section>
      <div :class="{ 'text-weight-medium': active }">
        {{ label }}
      </div>
    </q-item-section>
    <!-- <div
      v-show="active"
      class="tw-absolute tw-top-0 tw-bottom-0 tw-right-0 tw-w-0.5 bg-primary"
    /> -->
  </q-item>
</template>

<script setup>
defineProps({
  link: {
    type: [String, Object],
    required: true,
  },
  label: {
    type: String,
    required: true,
  },
  // icon: {
  //   type: String,
  //   required: true,
  // },
  // active: {
  //   type: Boolean,
  //   default: false,
  // },
})
</script>
