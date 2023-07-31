<template>
  <div class="container">
    <slot>
      <UiHeaderSection :title="$t('loads.title')" :text="$t('loads.text')" />
    </slot>

    <div
      class="wrap-table md:tw-p-6 md:tw-min-h-[40vh] md:tw-bg-[#F8FAFC] tw-rounded-lg md:tw-border-2"
      style="border-color: #f1f5f9"
    >
      <div class="text-body1 text-weight-medium q-mb-md">
        {{ $t(title2) }}
      </div>

      <div class="q-mb-md row q-col-gutter-lg input-white">
        <div class="col-md-4 col-12">
          <UiInputAutocomplete
            :label="$t('loads.From')"
            option-value="alias"
            option-label="city"
            class="ellipsis-select"
            :options="cities"
            v-model="geo.from"
            @update:model-value="setGeoParams($event, 'from')"
          />
        </div>
        <div class="col-md-4 col-12">
          <UiInputAutocomplete
            :label="$t('loads.Where')"
            option-value="alias"
            option-label="city"
            class="ellipsis-select"
            :options="cities"
            v-model="geo.to"
            @update:model-value="setGeoParams($event, 'to')"
          />
        </div>
        <div class="col-md-4 col-12">
          <UiInputSelect
            :options="truckBodyTypes"
            v-model="filter.truck_body_id"
            :label="$t('loads.Truck type')"
          />
        </div>
      </div>

      <q-table
        :rows="items"
        :columns="columns"
        :loading="loading"
        :grid="$q.platform.is.mobile"
        :flat="!$q.platform.is.mobile"
        :rows-per-page-options="[150]"
        hide-pagination
        class="bg-transparent table-loads"
        ref="table"
      >
        <template v-slot:body="props">
          <q-tr
            :no-hover="props.expand"
            :props="props"
            class="cursor-pointer"
            @click="toggleExpandItem(props.row.id)"
          >
            <q-td v-for="col in props.cols" :key="col.name" :props="props">
              <template v-if="col.name == 'distance'">
                {{ col.value }} {{ props.row.distance_symbol }}
              </template>
              <template v-else-if="col.name == 'length'">
                {{ col.value }} {{ props.row.length_symbol }}
              </template>
              <template v-else-if="col.name == 'weight'">
                {{ col.value }} {{ props.row.weight_symbol }}
              </template>
              <template v-else-if="col.name == 'age'">
                <q-badge rounded color="green" class="tw-mr-2" />
                {{ props.row.minutes }} {{ $t("date.minutes") }}
              </template>
              <template v-else-if="col.name == 'btn'">
                <q-btn
                  no-caps
                  :color="props.expand ? 'grey-4' : 'blue-grey-3'"
                  dense
                  flat
                  class="tw--ml-6"
                  :icon="props.expand ? 'expand_less' : 'expand_more'"
                />
              </template>

              <div style="max-width: 90px" class="ellipsis" v-else>
                {{
                  col.name == "date_from" ? props.row?.from?.date : col.value
                }}
                <q-tooltip max-width="180px" v-if="col.value?.length > 12">
                  {{ col.value }}
                </q-tooltip>
              </div>
            </q-td>
          </q-tr>
          <q-tr no-hover v-if="props.expand" :props="props">
            <q-td colspan="100%" class="bg-white">
              <main-row-table :item="props.row" style="overflow: hidden" />
            </q-td>
          </q-tr>
        </template>

        <template #no-data="props">
          <div
            class="flex justify-center col-12 q-py-lg q-my-xl"
            v-if="!loading"
          >
            <div
              class="text-center column justify-center text-body2"
              style="max-width: 288px"
            >
              <img
                class="q-mb-md q-mx-auto"
                width="80"
                loading="lazy"
                height="77"
                src="@/assets/images/empty-box.svg"
              />
              <div class="q-mb-sm text-weight-medium">
                {{ $t("loads.No data available") }}
              </div>
            </div>
          </div>
        </template>

        <template v-slot:item="props">
          <div
            class="bg-grey-2 flex col-12 q-pa-md text-body2"
            style="border-bottom: 1px solid #e2e8f0"
            @click="openDialog(props.row)"
            :style="props.rowIndex == 0 ? `border-top: 1px solid #e2e8f0` : ``"
          >
            <div>
              <div class="q-mb-xs text-grey-5">
                {{ props.row.from.date || "—" }}
              </div>
              <div class="text-body1">
                {{ props.row.from.address?.city || "—" }} —
                {{ props.row.to.address?.city || "—" }}
              </div>
            </div>

            <div class="q-ml-auto text-grey-5">
              <!-- {{ $timeAgo(props.row.created_at) }} -->

              <q-badge rounded color="green" class="tw-mr-2" />
              {{ props.row.minutes }} {{ $t("date.minutes") }}
            </div>
          </div>
        </template>
      </q-table>

      <q-dialog
        v-model="dialog"
        v-if="$q.platform.is.mobile"
        maximized
        transition-show="slide-right"
        transition-hide="slide-left"
      >
        <q-card class="lg:tw-w-[664px]">
          <q-bar class="bg-transparent q-pt-sm">
            <q-btn
              dense
              flat
              unelevated
              icon="keyboard_backspace"
              size="md"
              @click="dialog = false"
            />
            <q-space />
          </q-bar>

          <q-card-section class="q-pt-none">
            <MainRowTable :item="dialogData" style="overflow: hidden" />
          </q-card-section>
        </q-card>
      </q-dialog>
    </div>
  </div>
</template>


<script setup>
import UiHeaderSection from "@/Components/Ui/HeaderSection.vue";
import UiInputAutocomplete from "@/Components/Ui/InputAutocomplete.vue";
import UiInputSelect from "@/Components/Ui/InputSelect.vue";
import MainRowTable from "@/Components/Main/RowTable.vue";
import {onMounted, ref, watch} from "vue";

const emit = defineEmits(["loading"])
const props = defineProps({
  city: {
    type: Object,
    default: () => {},
  },
  title2: {
    type: String,
    default: "loads.title2",
  },
  count: {
    default: 5,
  },
})

const { code } = useActiveLocale()
const cities = await queryContent(code, "cities")
  .only(["id", "alias", "city", "lat", "lng"])
  .sort({ population: -1, $numeric: "population" })
  .find()
const truckBodyTypes = await queryContent(code, "body_types").find()

const table = ref(null)
const { locale } = useI18n()
const { t: $t } = useI18n({ useScope: "global" })

const dialog = ref(false)
const dialogData = ref({})

function openDialog(data) {
  dialog.value = true
  dialogData.value = data
}

const columns = [
  {
    name: "age",
    label: $t("loads.Age"),
    align: "left",
    field: "age",
    sortable: false,
  },
  {
    name: "date_from",
    label: $t("loads.Pickup"),
    align: "left",
    field: "date_from",
    sortable: false,
  },
  {
    name: "a_from",
    label: $t("loads.Origin"),
    align: "left",
    field: "a_from",
    sortable: false,
  },
  {
    name: "a_to",
    label: $t("loads.Destination"),
    align: "left",
    field: "a_to",
    sortable: false,
  },
  {
    name: "distance",
    label: $t("loads.Trip"),
    align: "left",
    field: "distance",
    sortable: false,
  },
  {
    name: "name",
    label: $t("loads.Description"),
    align: "left",
    field: "name",
    sortable: false,
  },
  {
    name: "weight",
    label: $t("loads.Weight"),
    align: "left",
    field: "weight",
    sortable: false,
  },
  {
    name: "length",
    label: $t("loads.Length"),
    align: "left",
    field: "length",
    sortable: false,
  },
  {
    name: "truck_type",
    label: $t("loads.Truck"),
    align: "left",
    field: "truck_type",
    sortable: false,
  },
  { name: "btn", label: "", field: "btn" },
]
const loading = ref(false)

const geo = ref({})
const filter = ref({})

if (props.city) {
  filter.value["from[lat]"] = props.city.lat
  filter.value["from[lng]"] = props.city.lng
  geo.value.from = props.city
}

const loads = ref([])

async function getData(params = {}) {
  const config = useFetchConfig()
  params.country_id = config.params.country_id
  loading.value = true
  emit("loading", loading.value)
  const data = await $fetch("loads", {
    ...config,
    params,
  })
  loading.value = false
  emit("loading", loading.value)
  if (!Array.isArray(data?.data)) return
  loads.value = data.data
}

await getData(filter.value)

const items = ref([])

function setData(cont = 5) {
  let shuffled = loads.value
    ?.filter((o) => (items.value.find((o2) => o2.id == o.id) ? false : true))
    ?.sort(() => 0.5 - Math.random())
    ?.slice(0, cont)
    ?.map((o) => {
      const minutes = Math.floor(Math.random() * (59 - 1 + 1) + 1)

      o.a_from = o.from?.address?.city
      o.a_to = o.to?.address?.city
      o.minutes = minutes
      return o
    })

  return shuffled || []
}

function setGeoParams(obj, name = "from") {
  filter.value[`${name}[lat]`] = obj?.lat
  filter.value[`${name}[lng]`] = obj?.lng
}

watch(
  () => filter,
  async () => {
    await getData(filter.value)
    items.value = setData()
  },
  {
    deep: true,
  },
)

onMounted(() => {
  items.value = setData(props.count)
  const refreshIntervalId = setInterval(() => {
    if (items.value.length == loads.value?.data?.length) {
      clearInterval(refreshIntervalId)
      return
    }
    if (isExpanded) return
    items.value.pop()
    items.value = sortDate([...items.value, ...setData(1)])
  }, 5000)
})

function sortDate(arr) {
  // return arr.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
  return arr.sort((a, b) => a.minutes - b.minutes)
}

let isExpanded = false

function toggleExpandItem(id) {
  const { value } = table
  if (value?.isRowExpanded(id)) {
    value?.setExpanded([])
    isExpanded = false
  } else {
    value?.setExpanded([id])
    isExpanded = true
  }
}
</script>


<style lang="scss">
.table-loads {
  thead th:first-child {
    padding-left: 38px;
  }
}

@media (max-width: 600px) {
  .table-loads {
    margin-left: -15px;
    margin-right: -15px;
  }
}
</style>
