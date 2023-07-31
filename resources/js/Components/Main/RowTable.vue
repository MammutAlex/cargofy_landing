<template>
  <div class="q-py-md q-px-sm" style="white-space: normal">
    <div class="tw-mb-4">
      <span class="text-h6 q-mr-sm">{{ $t("loads.Load data") }} </span>
      <!-- <span class="text-caption text-grey-6">
        {{ item.minutes }} {{ $t("date.minutes") }} {{ $t("loads.ago") }}</span
      > -->
    </div>
    <div class="row q-col-gutter-x-xl">
      <div
        class="col-md-5 col-12 q-ml-auto tw-mb-4 mb:tw-mb-0 md:tw-order-1 md:tw--mt-8"
      >
        <map-trip
          :model-value="{ waypoints: [item.from, item.to] }"
          style="height: 334px; width: 100%"
        />
      </div>
      <div class="col-md-7 tw-relative">
        <div class="row">
          <div class="col-md-6">
            <div class="text-grey-6 text-caption">{{ $t("loads.Route") }}</div>
            <div class="q-mb-md">
              <ui-route-waypoint
                position="xs"
                connect="solid"
                gap="sm"
                label="1"
              >
                <div class="text-body2" style="padding-top: 3px">
                  {{ item.from?.date }}
                  {{ item.from?.address?.city || "—" }}
                </div>
                <div class="text-grey-6 text-caption tw--mb-1 tw-mt-2">
                  {{ item.distance }} {{ item.distance_symbol }}, 23 h
                </div>
              </ui-route-waypoint>
              <ui-route-waypoint
                position="xs"
                connect="solid"
                gap="sm"
                last
                label="2"
              >
                <div class="text-body2" style="padding-top: 2px">
                  {{ $formatDate(item.to?.date, "DD. MM") }}
                  {{ item.to?.address?.city || "—" }}
                </div></ui-route-waypoint
              >
            </div>

            <div class="text-grey-6 text-caption">
              {{ $t("loads.Type of truck") }}
            </div>
            <div class="text-body2">{{ item.truck_type }}</div>
          </div>

          <div class="col-md-6">
            <div class="text-grey-6 text-caption">{{ $t("loads.Broker") }}</div>

            <div class="row q-gutter-x-xs no-wrap items-center">
              <q-icon name="star" size="20px" color="yellow-7" />
              <div class="text-subtitle2 text-weight-medium q-mx-xs">
                {{ item.rating }}
              </div>

              <ui-badge-pro />

              <div class="text-primary q-ml-sm flex items-end">
                {{ $t("loads.For authorized") }}
                <q-icon
                  name="o_lock"
                  class="q-ml-sm"
                  size="20px"
                  color="primary"
                />
              </div>
            </div>

            <!-- <div class="q-mt-sm">
              <div class="text-grey-6 text-caption">{{ t("Company") }}</div>
              <div class="text-primary flex items-end">
                {{ t("For authorized") }}
                <q-icon
                  name="o_lock"
                  class="q-ml-sm"
                  size="20px"
                  color="primary"
                />
              </div>
            </div> -->

            <div class="q-mt-sm flex items-center">
              <div class="text-grey-6 text-caption">
                {{ $t("loads.Phone") }}
              </div>
              <div class="text-primary flex items-end q-ml-sm">
                {{ $t("loads.For authorized") }}
                <q-icon
                  name="o_lock"
                  class="q-ml-sm"
                  size="20px"
                  color="primary"
                />
              </div>
            </div>
          </div>
        </div>

        <div
          class="q-px-md q-py-md bg-grey-2 q-mt-lg tw-rounded-lg tw-relative"
        >
          <div class="text-weight-medium q-mb-sm">
            {{ $t("loads.Register to see details") }}
          </div>
          <q-form
            class="row q-col-gutter-x-md q-col-gutter-y-xs"
            @submit="send()"
          >
            <div class="col-12 col-md-5 q-mb-sm">
              <ui-input-text
                v-model="form.name"
                v-model:error="errors.name"
                :label="$t('loads.name')"
              />
            </div>
            <div class="col-12 col-md-7 q-mb-sm">
              <ui-input-country-phone
                :autofocus="false"
                dense
                v-model:error="errors.phone"
                v-model="form.phone"
              />
            </div>
            <div class="col-md-6 col-12">
              <q-btn
                no-caps
                color="primary"
                unelevated
                type="submit"
                :loading="isLoading"
                :label="$t('loads.send')"
              />
            </div>
          </q-form>

          <form-success2
            v-if="isSuccess"
            :title="$t('loads.Thank you!')"
            :text="$t('loads.Thank you text')"
          />

          <form-error
            v-if="isError"
            class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  item: {
    type: Object,
    default: () => {},
  },
})

const { isLoading, postLead, isSuccess, isError, errors } = useForm()

const form = ref({})

async function send() {
  const resp = await postLead(form.value, {
    redirect: true,
  })
}
</script>