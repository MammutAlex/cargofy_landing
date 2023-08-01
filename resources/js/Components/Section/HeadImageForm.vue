<template>
  <q-page-container
    class="md:tw-min-h-screen flex items-center tw-relative md:tw-border-b"
  >
    <section class="row container items-center q-pb-xl md:tw-py-0 tw-py-8">
      <div
        class="col-md-7 column tw-mb-[90px] tw-mt-[36px] md:tw-mb-0 md:tw-mt-0 tw-z-10 tw-relative"
      >
        <div style="max-width: 500px" class="q-mb-lg">
          <h1 class="tw-text-2xl tw-leading-tight q-mb-sm tw-font-normal">
            {{ data.title }}
          </h1>
          <h2 class="text-body1" style="max-width: 460px">
            {{ data.description }}
          </h2>
        </div>

        <slot>
          <q-form class="md:tw-max-w-[300px] tw-relative" @submit="send()">
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
                :label="$t('dispatchers.send')"
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
              {{ $t("dispatchers.text3") }}

              <nuxt-link
                style="text-decoration: underline"
                class="text-primary"
                :to="localePath({ name: 'terms-of-use' })"
                >{{ $t("dispatchers.privacy_terms") }}</nuxt-link
              >
            </div>
          </q-form>
        </slot>
      </div>
    </section>

    <nuxt-img
      :src="image"
      class="tw-hidden lg:tw-block tw-h-full"
      :style="`
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(0px, -50%);
        max-width: ${imagemaxw};
        object-position: left bottom;
        object-fit: cover;
      `"
    />
  </q-page-container>
</template>


<script setup>
const props = defineProps({
  data: {
    type: Object,
    default: () => {},
  },
  imagemaxw: {
    type: String,
    default: "50%",
  },
  image: {
    type: String,
    default: "/images/trucks2.png",
  },
})

const form = ref({})
const localePath = useLocalePath()

const { isLoading, postLead, isSuccess, isError, errors } = useForm()

async function send() {
  return await postLead(form.value, {
    redirect: true,
  })
}
</script>