<template>
  <div class="container">
    <ui-header-section
      :title="`${$t('calc.Скільки ви зможете заробляти на')} ${data.name}?`"
      :text="$t('calc.У таблиці нижче наведені')"
    />

    <div class="row q-col-gutter-xl">
      <div class="col-12 col-md-6">
        <div class="text-subtitle2 q-mb-sm">
          {{ $t("calc.Розрахунок собівартості пробігу кілометра для") }}
          {{ data.name }}
        </div>
        <div>
          {{ $t("calc.Гарантовний пробіг в місяць") }}: 6000
          {{ $t("calc.км") }}.
        </div>

        <table class="q-mt-md tw-w-full calc-table q-mb-lg">
          <tr>
            <th class="text-left text-grey-5 text-weight-regular tw-italic">
              {{ $t("calc.тип даних") }}
            </th>
            <th class="text-right text-grey-5 text-weight-regular tw-italic">
              {{ $t("calc.значення") }}
            </th>
          </tr>

          <tr v-for="(item, i) in tableItems">
            <td v-html="item.text ? item.text : $t(`calc.${item.value}`)"></td>
            <td class="text-right">
              <input
                type="number"
                class="calc-input text-right q-px-xs tw-w-[107px] tw-h-[32px] md:tw-h-[22px] md:tw-w-[85px]"
                v-model="form[item.key]"
              />
            </td>
          </tr>

          <tr>
            <td
              class="text-weight-medium"
              v-html="$t(`calc.всього собівартість`)"
            ></td>
            <td class="text-right">
              <div class="text-weight-medium">
                {{ formatPrice(distance_sum) }}
              </div>
            </td>
          </tr>
        </table>

        <div class="flex q-mb-xs">
          <div>{{ $t("calc.Скільки ви готові проїжджати в місяць") }}?</div>
          <div class="q-ml-auto q-pl-md q-pr-sm text-weight-medium">
            {{ formatPrice(form.mileage, 0) }} {{ $t("calc.км") }}
          </div>
        </div>

        <q-slider
          v-model="form.mileage"
          :step="500"
          :min="minMaxDistance.min"
          :max="minMaxDistance.max"
        />
        <div class="flex text-grey-4 tw--mt-1 text-caption">
          <div>
            {{ formatPrice(minMaxDistance.min, 0) }} {{ $t("calc.км") }}
          </div>
          <div class="q-ml-auto">
            {{ formatPrice(minMaxDistance.max, 0) }} {{ $t("calc.км") }}
          </div>
        </div>

        <table class="q-mt-md tw-w-full q-mb-md">
          <tr>
            <td class="text-weight-medium" style="border: none">
              {{ $t("calc.всього ставка за") }} 1 {{ $t("calc.км") }}
              <ui-tooltip class="tw--my-2">{{
                $t("calc.tooltip5")
              }}</ui-tooltip>
            </td>
            <td class="text-right" style="border: none">
              <q-btn
                round
                dense
                flat
                class="tw-mr-1"
                color="primary"
                icon="autorenew"
                @click="form.price = data.truck.price"
              />

              <input
                type="number"
                class="calc-input text-right q-px-xs tw-w-[107px] tw-h-[32px] md:tw-h-[22px] md:tw-w-[85px]"
                v-model="form.price"
              />
            </td>
          </tr>
        </table>
      </div>
      <div class="col-12 col-md-6">
        <div class="text-subtitle2 q-mb-sm">
          {{ $t("calc.Результати підрахунків") }}

          <ui-tooltip class="tw--my-2">
            {{ $t("calc.tooltip0") }}
          </ui-tooltip>
        </div>
        <div>
          {{ $t("calc.Наведіть на значок") }} “<ui-tooltip class="tw--my-2">
            {{ $t("calc.Наведіть на значок") }}
            {{ $t("calc.щоб побачити опис розрахунку") }} </ui-tooltip
          >“,
          {{ $t("calc.щоб побачити опис розрахунку") }}
          .
        </div>

        <q-card class="q-mt-md" flat bordered>
          <div class="tw-p-3 md:tw-p-4">
            <div class="text-body2 q-mb-sm">
              1. {{ $t("calc.Розрахунок собівартості") }} {{ $t("calc.на") }} 1
              {{ $t("calc.км") }}
              <ui-tooltip class="tw--my-2">{{
                $t("calc.tooltip1")
              }}</ui-tooltip>
            </div>
            <div class="text-subtitle2">
              {{ formatPrice(distance_sum) }} {{ $t("calc.грн") }}
            </div>
          </div>
        </q-card>

        <q-card class="q-mt-md" flat bordered>
          <div class="tw-p-3 md:tw-p-4">
            <div class="text-body2 q-mb-md tw-max-w-[420px]">
              2. {{ $t("calc.Розрахунок доходу від співпраці з") }}
              {{ $t("main.Cargofy") }} {{ $t("calc.на") }} 1 {{ $t("calc.км") }}
              <ui-tooltip class="tw--my-2">{{
                $t("calc.tooltip2")
              }}</ui-tooltip>
            </div>
            <div class="flex q-gutter-x-sm q-gutter-y-md">
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Ставка") }}, {{ $t("calc.грн") }}/{{
                    $t("calc.км")
                  }}
                </div>
                <div class="text-subtitle2">{{ formatPrice(form.price) }}</div>
              </div>
              <div style="align-self: end" class="text-subtitle2">-</div>
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Собівартість") }}, {{ $t("calc.грн") }}/{{
                    $t("calc.км")
                  }}
                </div>
                <div class="text-subtitle2">
                  {{ formatPrice(distance_sum) }}
                </div>
              </div>
              <div style="align-self: end" class="text-subtitle2">=</div>
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Дохід (маржинальність)") }}
                </div>
                <div class="text-subtitle2">
                  {{ formatPrice(marginality / form.mileage) }} (10%)
                </div>
              </div>
            </div>
          </div>
        </q-card>

        <q-card class="q-mt-md" flat bordered>
          <div class="tw-p-3 md:tw-p-4">
            <div class="text-body2 q-mb-md tw-max-w-[440px]">
              3. {{ $t("calc.Розрахунок доходу від співпраці з") }}
              {{ $t("main.Cargofy") }}
              {{ $t("calc.в місяць") }}
              <ui-tooltip class="tw--my-2">{{
                $t("calc.tooltip3")
              }}</ui-tooltip>
            </div>
            <div class="flex q-gutter-x-sm q-gutter-y-md">
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Дохід") }}
                </div>
                <div class="text-subtitle2">
                  {{ formatPrice(marginality / form.mileage) }} (10%)
                </div>
              </div>
              <div style="align-self: end" class="text-subtitle2">*</div>
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Км в міс") }}
                </div>
                <div class="text-subtitle2">{{ form.mileage }}</div>
              </div>
              <div style="align-self: end" class="text-subtitle2">=</div>
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Дохід за") }} {{ $t("calc.міс") }},
                  {{ $t("calc.грн") }}
                </div>
                <div class="text-subtitle2">
                  {{ formatPrice(marginality) }} {{ $t("calc.грн") }}
                </div>
              </div>
            </div>
          </div>
        </q-card>

        <q-card class="q-mt-md bg-grey-1" flat bordered>
          <div class="tw-p-3 md:tw-p-4">
            <div class="text-body2 q-mb-md tw-max-w-[390px]">
              4. {{ $t("calc.Розрахунок окупності") }}
              <ui-tooltip class="tw--my-2">{{
                $t("calc.tooltip4")
              }}</ui-tooltip>
            </div>
            <div class="flex q-gutter-x-sm q-gutter-y-md">
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Вартість") }} <br />
                  {{ $t("calc.автопоїзда") }}, {{ $t("calc.грн") }}
                </div>
                <div class="text-subtitle2">
                  {{ formatPrice(form.truck_price) }}
                </div>
              </div>
              <div style="align-self: end" class="text-subtitle2">/</div>
              <div>
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Дохід за") }} {{ $t("calc.міс") }}, <br />
                  {{ $t("calc.грн") }}
                </div>
                <div class="text-subtitle2">{{ formatPrice(price_full) }}</div>
              </div>
              <div style="align-self: end" class="text-subtitle2">=</div>
              <div style="max-width: 150px">
                <div class="text-caption text-grey-5 q-mb-xs">
                  {{ $t("calc.Окупність") }} {{ $t("calc.автопоїзда") }},

                  {{ $t("calc.місяців") }} ({{ $t("calc.років") }})
                </div>
                <div class="text-subtitle2">
                  {{ Math.round(paybackDays / 30) }} ({{
                    Math.round(paybackDays / 30 / 12)
                  }})
                </div>
              </div>
            </div>

            <div class="text-caption text-grey-5 q-mt-md">
              * {{ $t("calc.в перерахунку на відстань") }}: ≈ 120 000 000
              {{ $t("calc.км") }}
            </div>
          </div>
        </q-card>

        <!-- <div class="text-caption q-mt-md text-grey-5 q-mb-md">
          {{ $t("calc.user_info") }}
        </div> -->

        <!-- <q-btn
          outline
          color="primary"
          no-caps
          @click="scrollToTop()"
          :label="$t('calc.personal_calculation')"
        /> -->
      </div>
    </div>
  </div>
</template>


<style lang="scss">
.calc-input {
  line-height: 22px;
  border: 1px solid #e5e7eb;
  border-radius: 1px;
  &:focus {
    outline: none;
  }
}

@media (max-width: 400px) {
  .calc-input {
    max-width: 80px !important;
  }
}

.q-card--bordered {
  border-color: #e5e7eb;
}

.calc-table {
  td {
    border-bottom: 1px solid #f1f5f9;

    transition: all 0.3s ease;
  }
  th,
  td {
    padding: 4px 8px;
  }
  tr {
    &:hover {
      td {
        background: #f1f5f9;
      }
    }
  }
}
</style>

<script setup>
const { t } = useI18n({ useScope: "global" })

const props = defineProps({
  data: {
    type: Object,
    default: () => {},
  },
})

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" })
}

const { data: country } = await getContent("country", "data")

const activeLocale = useActiveLocale()

const form = ref({
  slider: 8000,
  fuel_consumption: 35,
  fuel_price: 29,
  mileage: 8000,
  wheel_cost: 3500,
  wheel_count: 12,
  wheel_mileage: 100000,
  salary_distance: 0,
  business_trips: 150,
  scheduled_maintenance: 3000,
  emergency_maintenance: 800,
  tax: 200,
  accountant: 5000,
  phone: 200,
  fine: 100,
  parking: 100,
  inspection: 400,
  insurance: 2500,
  credit_percent: 0,
  price: 22,
  usd: 40,
  fuel_ratio: 1,
  truck_price: 40000,
})

const rounding = (value, dp = 2) => (isNaN(+value) ? 0 : +value).toFixed(dp)

const minMaxDistance = computed(() => {
  return {
    min: 6000 / country.value.country.mileage_ratio,
    max: 10000 / country.value.country.mileage_ratio,
  }
})

onMounted(() => {
  const obj = {
    ...form.value,
    ...props.data,
    ...country.value.country,
  }

  obj.truck_price = rounding(obj.truck_price * obj.usd, 0)
  obj.mileage = obj.mileage / obj.mileage_ratio
  obj.wheel_mileage = obj.wheel_mileage / obj.mileage_ratio
  // obj.fuel_consumption = obj.fuel_consumption / obj.mileage_ratio
  obj.fuel_consumption = rounding(
    (obj.fuel_consumption / 100 / obj.fuel_ratio) * (100 * obj.mileage_ratio),
  )
  form.value = obj
})

const tableItems = [
  {
    value: "витрата палива на",
    key: "fuel_consumption",
  },
  {
    value: "вартість палива 1л",
    key: "fuel_price",
  },
  {
    value: "пробіг щомісячний км",
    key: "mileage",
  },
  {
    value: "вартість 1 колеса",
    key: "wheel_cost",
  },
  {
    value: "кількість коліс (тягач + причіп)",
    key: "wheel_count",
  },
  {
    value: "пробіг 1 колеса за кілометр",
    key: "wheel_mileage",
  },
  // {
  //   value: "кілкість робочих діб на місяць",
  //   key: "count_d",
  // },
  // {
  //   value: "кількість машин",
  //   key: "dssdfg",
  // },

  // {
  //   value: "з/п водію щомісячна",
  //   key: "hjkghjk",
  // },
  {
    value: "з/п водію по кілометражу",
    key: "salary_distance",
  },
  // {
  //   value: "оплата відрядження за",
  //   key: "hjk",
  // },
  {
    value: "планове ТО, грн",
    key: "scheduled_maintenance",
  },
  // {
  //   value: "ремонти позапланові",
  //   key: "dfgsdfg",
  // },
  {
    value: "податки за 1 автомобіль, грн/місяць",
    key: "tax",
  },
  // {
  //   value: "зарплата бухгалтеру 1 місяць",
  //   key: "dfgdsfg",
  // },
  {
    value: "телефонія та інтернет",
    key: "phone",
  },
  // {
  //   value: "інтернет",
  //   key: "internet",
  // },
  // {
  //   value: "логіст зарплата",
  //   key: "sdfsdf",
  // },
  // {
  //   value: "порожні пробіги",
  //   key: "sdfsdf",
  // },
  {
    value: "стоянки, грн/місяць (всі машини)",
    key: "parking",
  },
  // {
  //   value: "реклама, грн/місяць",
  //   key: "sdfsdf",
  // },

  // {
  //   value: "інформаційні послуги",
  //   key: "sdfsdf",
  // },
  {
    value: "непередбачені витрати",
    key: "emergency_maintenance",
  },
  {
    value: "техогляд",
    key: "inspection",
  },
  // {
  //   value: "ліцензії та інші документи на рік",
  //   key: "dfgsdfg",
  // },
  // {
  //   value: "оренда офісу",
  //   key: "dfgsdfg",
  // },
  {
    value: "виплата за кредитом",
    key: "credit_percent",
  },
  {
    text: `${t("calc.Вартість")} ${t("calc.автопоїзда")}, ${t(
      "calc.грн",
    )}`.toLowerCase(),
    key: "truck_price",
  },
  // {
  //   value: "вулканізація за 1 місяць",
  //   key: "dfgsdfg",
  // },
  // {
  //   value: "вартість вантажівки",
  //   key: "dfgdfg",
  // },
]

// function rounding(value, precision = 2) {
//   return (isNaN(+value) ? 0 : +value).toFixed(precision)
// }

const fuel_price_distance = computed(() => {
  return rounding(
    (form.value.fuel_consumption *
      form.value.fuel_ratio *
      form.value.fuel_price) /
      100,
  )
})
const wheel_count_distance = computed(() => {
  return rounding(
    (form.value.wheel_cost * form.value.wheel_count) / form.value.mileage,
  )
})
const business_trips_distance = computed(() => {
  return rounding(form.value.business_trips / (form.value.mileage / 500))
})
const scheduled_maintenance_distance = computed(() => {
  return rounding(form.value.scheduled_maintenance / (form.value.mileage * 12))
})
const emergency_maintenance_distance = computed(() => {
  return rounding(form.value.emergency_maintenance / form.value.mileage)
})
const tax_distance = computed(() => {
  return rounding(+form.value.tax / form.value.mileage)
})
const accountant_distance = computed(() => {
  return rounding(+form.value.accountant / form.value.mileage)
})
const phone_distance = computed(() => {
  return rounding(+form.value.phone / form.value.mileage)
})
const fine_distance = computed(() => {
  return rounding(+form.value.fine / form.value.mileage)
})
const parking_distance = computed(() => {
  return rounding(+form.value.parking / form.value.mileage)
})
const inspection_distance = computed(() => {
  return rounding(+form.value.inspection / (form.value.mileage * 12))
})
const insurance_distance = computed(() => {
  return rounding(+form.value.insurance / (+form.value.mileage * 12))
})
const credit_percent_distance = computed(() => {
  return rounding(+form.value.credit_percent / (form.value.mileage * 12))
})
const price_full = computed(() => {
  return rounding(form.value.price * +form.value.mileage)
})
const price_usd = computed(() => {
  return rounding(+price_full.value / +form.value.usd)
})
const marginality = computed(() => {
  return rounding(price_full.value - +distance_sum.value * +form.value.mileage)
})
const paybackDistance = computed(() => {
  return rounding(
    form.value.truck_price / (marginality.value / form.value.mileage),
    0,
  )
})
const paybackDays = computed(() => {
  return rounding(paybackDistance.value / 500, 0)
})
const distance_sum = computed(() => {
  const summ =
    +fuel_price_distance.value +
    +wheel_count_distance.value +
    +form.value.salary_distance +
    +business_trips_distance.value +
    +scheduled_maintenance_distance.value +
    +emergency_maintenance_distance.value +
    +tax_distance.value +
    +accountant_distance.value +
    +phone_distance.value +
    +fine_distance.value +
    +parking_distance.value +
    +inspection_distance.value +
    +insurance_distance.value +
    +credit_percent_distance.value
  return rounding(summ)
})

function formatPrice(val, FractionDigits = 2) {
  return new Intl.NumberFormat(activeLocale.country_id, {
    minimumFractionDigits: FractionDigits,
    maximumFractionDigits: FractionDigits,
  })?.format(val || 0)
}
</script>