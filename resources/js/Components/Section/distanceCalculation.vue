<template>
  <div>
    <section-calc-map :fromTo="list" :cities="cities" v-model="form">
      <section-route-map
        :fromTo="list"
        @data="setData"
        :center="[city1.lat, city1.lng]"
      />
    </section-calc-map>

    <section-from-to-list
      :routes="routes"
      :fromTo="list"
      :form="form"
      :navigations="pointsCities"
      v-if="pointsCities.length"
      class="q-mb-xl q-pb-xl q-pt-xl"
    />
  </div>
</template>


<script setup>
const props = defineProps({
  list: {
    type: Array,
    default: () => [],
  },
  cities: {
    type: Array,
    default: () => [],
  },
})

const form = ref({
  consumption: 33,
  cost: 50,
})

const r = useRoute()
const city1 = props.list[0]

const pointsCities = ref([])
const routes = ref([])

async function setData(data) {
  pointsCities.value = addCityToPoints(data, props.list)
  routes.value = data.routes
}
</script>



<style lang="scss">
@media (min-width: 1024px) {
  .wrap-map-leaflet {
    .js-map {
      height: 90vh;
    }
  }
}
</style>