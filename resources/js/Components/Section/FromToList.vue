<template>
  <div class="container">
    <ui-header-section
      :title="`${$t('loads.Route')} ${city1.city} – ${city2.city} ${$t(
        'calc.на автомобілі',
      )}`"
      :text="`${$t('loads.Trip')} ${data.distance}  ${$t('calc.км')}. ${$t(
        'fromto.Час в дорозі',
      )}: ${data.duration} ${$t('date.hours')} ${$t('fromto.fuel')}: ${data.consumptionCalcFuel}${$t('calc.л')}. ${
        data.price
      } ${$t('calc.грн')}`"
    />

    <q-list padding class="q-mx-auto tw-max-w-[688px]">
      <q-expansion-item
        header-class="items-center q-py-md"
        dense
        dense-toggle
        class="tw-rounded-md tw-overflow-hidden r-expand"
        :class="{ 'bg-grey-2 q-mb-sm r-expanded': state[i] }"
        expand-icon="keyboard_arrow_down"
        expand-icon-class="text-grey-4"
        v-for="(route, i, k) in navigations"
        :key="i"
        @click="state[i] = state[i] ? false : true"
      >
        <template #header="{ expanded }">
          <div
            class="num q-mr-md tw-min-w-[24px] tw-h-[24px] text-center tw-rounded-full text-grey-4"
            style="border: 2px solid #8c9aa3"
          >
            {{ i + 1 }}
          </div>

          <div class="q-mr-auto">{{ route.name || route.city }}</div>

          <div class="flex sm:tw-w-[54%] q-ml-auto" v-if="!expanded">
            <div class="text-grey-4 sm:tw-w-[20%] tw-hidden sm:tw-block">
              +{{ route.paramsPlus.time || "0:00" }}
            </div>
            <div
              class="tw-w-[25%] text-grey-4 text-weight-medium tw-hidden sm:tw-block"
            >
              {{ route.params.time || "0:00" }}
            </div>
            <div class="tw-w-[27%] tw-hidden sm:tw-block">
              +{{ route.paramsPlus.distance || "0" }} {{ $t("calc.км") }}
            </div>
            <div class="sm:tw-w-[26%] text-weight-medium tw-w-[70px]">
              {{ route.params.distance || "0" }} {{ $t("calc.км") }}
            </div>
          </div>
        </template>

        <q-separator class="bg-blue-grey-2" v-if="state[i]" />
        <q-card style="background: none">
          <q-card-section class="sm:tw-ml-10 sm:tw-mr-4 q-pt-sm">
            <!-- <div class="md:tw-flex tw-mt-2 md:tw-mt-3">
              <div class="q-mr-sm">
                АЗС WOG 15
                <q-badge class="q-mr-md" rounded label="-10 грн на 1 л" />
              </div>

              <div class="md:tw-ml-auto text-grey-4 tw-mt-2 md:tw-mt-0">
                Рейтинг: 4.8 (15 відгуків)
              </div>
            </div> -->
            <div
              class="md:tw-flex tw-mt-3 md:tw-mt-3"
              v-for="(point, i2) in route.items"
              :key="i2"
            >
              <img
                class="tw-w-[20px] tw-h-[20px] q-mr-sm tw-hidden sm:tw-block"
                :src="point.icon"
                alt=""
              />
              <div class="q-mr-sm flex items-center">
                <div class="q-mr-xs">{{ point.category_name }}</div>
                <small>({{ point.name }})</small>
              </div>

              <div class="md:tw-ml-auto text-grey-4">
                {{ $t("fromto.Рейтинг") }}: {{ point.rating }} ({{
                  point.reviews
                }}
                {{ $t("fromto.відгуків") }})
              </div>
            </div>
          </q-card-section>
        </q-card>
      </q-expansion-item>
    </q-list>
  </div>
</template>


<script setup>
const props = defineProps({
  routes: {
    type: Array,
    default: () => [],
  },
  navigations: {
    type: Object,
    default: () => {},
  },
  fromTo: {
    type: Object,
    default: () => {},
  },
  form: {
    type: Object,
    default: () => {
      return {
        consumption: 33,
        cost: 50,
      }
    },
  },
})
const state = ref({})
//TODO брати велечини (літри і км з країни)

const city1 = props.fromTo[0]
const city2 = props.fromTo[props.fromTo.length - 1]

const data = computed(() => {
  return getParamsRoute(props.routes[0], props.form)
})
</script>


<style lang="scss">
.r-expand {
  border: 1px solid transparent;
}
.r-expanded {
  border: 1px solid #e2e8f0;
}
</style>