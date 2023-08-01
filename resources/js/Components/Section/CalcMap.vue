<template>
  <q-page-container class="md:tw-h-screen tw-overflow-hidden">
    <section
      class="tw-h-full row items-center container q-pb-xl md:tw-py-0 tw-py-12 md:tw-mb-0 tw-mb-16"
    >
      <div class="col-12 col-md-5 md:tw-mb-0 tw-mb-16">
        <div class="text-h4 q-mb-md">
          {{ $t("calc.Перший навігатор для дальнобійників") }}
        </div>
        <div class="q-mb-md ellipsis">
          {{ city1.city }} — {{ city2.city }},
          {{ $t("calc.відстань на машині") }}
        </div>

        <ui-route-waypoint
          v-for="(item, i) in form"
          :key="item.city"
          :label="i + 1"
          :last="i == 5"
          class="tw-relative"
          :class="{ 'q-mb-lg': i == 5 }"
        >
          <ui-input-autocomplete
            :label="$t(`loads.${i == 0 ? 'From' : 'Destination'}`)"
            option-value="alias"
            option-label="name"
            class="ellipsis-select"
            :options="listCities"
            :exclude="
              form.map((o) => o?.alias).filter((k) => k != form[i]?.alias)
            "
            v-model="form[i]"
          />

          <q-btn
            icon="close"
            padding="none"
            flat
            round
            color="blue-grey-3"
            v-if="i > 1"
            @click="form.splice(i, 1)"
            style="position: absolute; right: -34px; top: 8px"
          />
        </ui-route-waypoint>
        <!-- <ui-route-waypoint label="2">
          <ui-input-autocomplete
            :label="$t('loads.Destination')"
            option-value="alias"
            option-label="name"
            class="ellipsis-select"
            :options="listCities"
            :exclude="form.from"
            v-model="form.to"
          />
        </ui-route-waypoint> -->

        <ui-route-waypoint last label="+" v-if="form.length < 6">
          <q-btn
            no-caps
            color="primary"
            flat
            @click="form.push({})"
            style="margin-top: -2px"
            :label="$t('calc.Додати пункт')"
          />
        </ui-route-waypoint>

        <div class="tw-ml-8 q-mt-md">
          <div class="row q-col-gutter-md">
            <div class="col-6">
              <ui-input-text
                :label="$t('calc.Витрати пального')"
                :model-value="modelValue.consumption"
                type="number"
                @update:model-value="update($event, 'consumption')"
              />
            </div>
            <div class="col-6">
              <ui-input-text
                :label="$t('calc.Варстіть, грн/л')"
                :model-value="modelValue.cost"
                type="number"
                @update:model-value="update($event, 'cost')"
              />
            </div>
          </div>

          <q-btn
            no-caps
            color="primary"
            class="q-mt-md"
            unelevated
            @click="send()"
            :label="$t('calc.Розрахувати')"
          />
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div
          style="top: 50px"
          class="tw-mx-[-16px] lg:tw-mx-0 lg:tw-absolute lg:tw-w-[50%] lg:tw-h-[90vh] lg:tw-bottom-0 lg:tw-right-0"
        >
          <slot />
          <!-- <a :href="url" data-fancybox>
            <q-img
              :src="url"
              fit="contain"
              class="md:tw-h-[90vh]"
              style="min-height: 266px; width: 100%"
            />
          </a> -->
        </div>
      </div>
    </section>
  </q-page-container>
</template>


<style lang="scss">
.ellipsis-select {
  .q-field__native {
    > span {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
      max-width: 290px;
    }
  }
}
</style>

<script setup>
import clonedeep from "lodash.clonedeep"
const emit = defineEmits(["update:model-value"])
const props = defineProps({
  fromTo: {
    type: Array,
    default: () => [],
  },
  cities: {
    type: Array,
    default: () => [],
  },
  modelValue: {
    type: Object,
    default: () => {
      return {
        consumption: 33,
        cost: 25,
      }
    },
  },
})

const route = useRoute()
const listCities = computed(() => {
  const t = props.cities.map((o) => {
    return {
      ...o,
      name: `${o.city}${o.region && o.parent ? ` (${o.region} область)` : ""}`,
    }
  })
  return t
})

const form = ref(clonedeep(props.fromTo))

const city1 = props.fromTo[0]
const city2 = props.fromTo[props.fromTo.length - 1]

function update(e, key) {
  emit("update:model-value", {
    ...props.modelValue,
    [key]: e,
  })
}

const router = useRouter()
async function send() {
  if (form.value.length < 2) return
  router.push({
    params: {
      slug: form.value.filter((o) => o?.alias).map((o) => o.alias),
    },
  })
  //
}
</script>