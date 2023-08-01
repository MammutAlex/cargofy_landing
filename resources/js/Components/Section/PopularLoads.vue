<template>
  <div class="container">
    <ui-header-section
      :title="`${$t('seo.Популярні напрямки з')} ${fromTo.from}`"
    />
    <ul
      class="tw-grid lg:tw-grid-cols-5 md:tw-grid-cols-4 sm:tw-grid-cols-3 tw-grid-cols-2 tw-gap-1"
    >
      <li v-for="(item, i) in items" :key="i" class="ellipsis">
        <nuxt-link
          class="hover:tw-underline"
          :to="
            localePath({
              name: 'route-planner-slug',
              params: {
                slug: [$route.params.slug[0], item.alias],
              },
            })
          "
        >
          {{ item.city }}</nuxt-link
        >
      </li>
    </ul>
  </div>
</template>


<script setup>
const props = defineProps({
  fromTo: {
    type: Object,
    default: () => {},
  },
  items: {
    type: Array,
    default: () => [],
  },
})
</script>



