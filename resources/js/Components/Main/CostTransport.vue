<template>
  <div class="q-py-xl download-touch bg-grey-2 lg:tw-rounded-[80px]">
    <div class="container">
      <div class="row">
        <div class="col-md-7 column tw-mb-8 md:tw-mb-0">
          <div class="text-h6 q-mb-sm tw-max-w-[340px]">
            {{ $t("seo.cost_transport_text") }}
          </div>
          <div class="tw-max-w-[380px] q-pb-xl md:tw-text-base">
            {{ $t("seo.cost_transport_title") }}
          </div>

          <nuxt-img
            src="/images/cost-transport.svg"
            class="q-mt-auto q-mb-sm md:tw-mr-auto"
            loading="lazy"
            alt=""
          />
        </div>

        <div class="md:tw-ml-auto tw-relative md:tw-w-auto tw-w-full">
          <q-form
            class="md:tw-bg-white md:tw-p-6 form-lead md:tw-max-w-[360px] tw-relative"
            @submit="send()"
          >
            <div class="tw-relative">
              <ui-input-text
                v-model="form.name"
                v-model:error="errors.name"
                class="q-mb-lg"
                :label="$t('section1.name')"
              />
              <ui-input-country-phone
                :autofocus="false"
                dense
                v-model="form.phone"
                v-model:error="errors.phone"
                class="q-mb-lg"
              />
              <ui-input-text
                v-model="form.email"
                v-model:error="errors.email"
                class="q-mb-lg"
                label="E-mail"
              />

              <q-btn
                no-caps
                color="primary"
                class="q-mb-sm full-width"
                unelevated
                type="submit"
                :loading="isLoading"
                :label="$t('section1.send')"
              />

              <form-success
                v-if="isSuccess"
                class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
              />
              <form-error
                v-if="isError"
                class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
              />
            </div>

            <div class="text-caption text-blue-grey-5">
              {{ $t("section1.text3") }}
              <!-- <a
                :href="$config.public.termsUrl"
                target="_blank"
                style="text-decoration: underline"
                ></a
              > -->

              <nuxt-link
                style="text-decoration: underline"
                class="text-primary"
                :to="localePath({ name: 'terms-of-use' })"
                >{{ $t("section1.privacy_terms") }}</nuxt-link
              >
            </div>
          </q-form>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
const { locale } = useI18n()
const activeLocale = useActiveLocale()
const form = ref({})
const { isLoading, postLead, isSuccess, isError, errors } = useForm()
async function send() {
  const resp = await postLead(form.value, {
    // url: "sms_link",
    redirect: true,
  })
}
</script>