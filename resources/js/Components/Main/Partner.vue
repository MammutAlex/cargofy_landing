<template>
  <div class="q-py-xl tw-relative tw-overflow-hidden bg-grey-2">
    <div class="container tw-relative">
      <div class="row">
        <div
          class="q-ml-auto md:tw-mb-0 tw-mb-5 lg:tw-absolute flex flex-center tw-right-0 tw-top-0 tw-bottom-0"
        >
          <nuxt-img
            class="md:tw-w-auto tw-w-3/4"
            width="639"
            height="135"
            loading="lazy"
            src="/images/bus4.svg"
          />
        </div>

        <div class="col-md-4 column tw-relative">
          <slot>
            <q-form @submit="send()">
              <div class="q-mb-lg">
                <div class="text-h6 q-mb-sm">{{ $t("partner.title") }}</div>
                <div class="md:tw-text-base">
                  {{ $t("partner.text") }}
                </div>
              </div>

              <div class="tw-relative">
                <div class="text-body1 text-weight-medium q-mb-sm">
                  {{ $t("partner.text2") }}:
                </div>

                <ui-input-country-phone
                  :autofocus="false"
                  dense
                  v-model="form.phone"
                  v-model:error="errors.phone"
                  class="q-mb-md"
                />

                <q-btn
                  no-caps
                  color="primary"
                  class="q-mb-sm full-width"
                  unelevated
                  type="submit"
                  :loading="isLoading"
                  :label="$t('partner.get_link')"
                />
                <div class="text-caption text-blue-grey-5">
                  {{ $t("partner.text3") }}

                  <nuxt-link
                    style="text-decoration: underline"
                    class="text-primary"
                    :to="localePath({ name: 'terms-of-use' })"
                    >{{ $t("partner.privacy_terms") }}</nuxt-link
                  >
                </div>

                <form-error
                  v-if="isError"
                  class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
                />
              </div>

              <!-- <form-success
              v-if="isSuccess"
              class="
                tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10
              "
            /> -->
            </q-form>

            <div
              v-if="isSuccess"
              class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10 flex items-center bg-grey-2"
            >
              <div>
                <div class="text-h6 q-mb-sm">
                  <span>{{ $t("partner.Thank you!") }}</span>
                </div>
                <div class="q-mb-md">{{ $t("partner.Thank you text") }}</div>

                <q-btn
                  no-caps
                  color="blue-grey-3"
                  icon="done"
                  style="min-width: 150px"
                  disable
                  unelevated
                  :label="$t('partner.Sent')"
                />
              </div>
            </div>
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>



<script setup>
const form = ref({})
const localePath = useLocalePath()
const { isLoading, postLead, isSuccess, isError, errors } = useForm()
async function send() {
  const resp = await postLead(form.value, {
    url: "sms_link",
  })
}
</script>