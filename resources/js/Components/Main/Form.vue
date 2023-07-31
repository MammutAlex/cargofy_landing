<template>
    <q-page-container class="md:tw-h-screen">
        <div class="tw-relative flex items-center tw-h-full">
            <MainCars class="tw-mt-[-50px] md:tw-mt-[-100px]"/>

            <section
                class="row container items-center q-pb-xl tw-relative tw-z-10 md:tw-py-0 tw-py-12"
            >
                <div
                    class="col-md-5 column tw-mb-[90px] tw-mt-[36px] md:tw-mb-0 md:tw-mt-0"
                >
                    <slot>
                        <div>
                            <h1 class="tw-text-2xl tw-leading-tight q-mb-sm tw-font-normal">
                                {{ $t("section1.title") }}
                            </h1>
                            <div class="tw-text-[1rem]">
                                {{ $t("section1.text") }}
                            </div>
                        </div>
                    </slot>
                </div>

                <div class="md:tw-ml-auto tw-relative md:tw-w-auto tw-w-full">
                    <q-form
                        class="md:tw-bg-white md:tw-p-6 form-lead md:tw-max-w-[360px] tw-relative"
                        @submit="send()"
                        autofocus
                    >
                        <div class="text-subtitle2 q-mb-lg">
                            {{ $t("section1.form_title") }}
                        </div>

                        <div class="tw-relative">
                            <div class="q-gutter-md q-mb-lg">
                                <q-radio
                                    dense
                                    v-model="form.carrier_type_id"
                                    val="1"
                                    :label="$t('section1.1_truck')"
                                />
                                <q-radio
                                    dense
                                    v-model="form.carrier_type_id"
                                    val="2"
                                    :label="$t('section1.2_truck')"
                                />
                            </div>

                            <UiInputText
                                v-model="form.name"
                                v-model:error="form.errors.name"
                                class="q-mb-lg"
                                :label="$t('section1.name')"
                            />
                            <UiInputCountryPhone
                                :autofocus="false"
                                dense
                                v-model="form.phone"
                                v-model:country_id="form.country_id"
                                v-model:error="form.errors.phone"
                                class="q-mb-lg"
                            />
                            <UiInputText
                                v-model="form.email"
                                v-model:error="form.errors.email"
                                class="q-mb-lg"
                                label="E-mail"
                            />

                            <q-btn
                                no-caps
                                color="primary"
                                class="q-mb-sm full-width"
                                unelevated
                                type="submit"
                                :loading="form.processing"
                                :label="$t('section1.send')"
                            />
                            <FormError
                                v-if="form.hasErrors && !form.errors.email"
                                class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
                            />
                        </div>

                        <div class="text-caption text-blue-grey-5">
                            {{ $t("section1.text3") }}
                            <Link
                                style="text-decoration: underline"
                                class="text-primary"
                                :href="route('terms-of-use')"
                            >{{ $t("section1.privacy_terms") }}
                            </Link>
                        </div>
                    </q-form>
                </div>
            </section>
        </div>
    </q-page-container>
</template>

<script setup>
import MainCars from "@/Components/Main/Cars.vue";
import UiInputText from "@/Components/Ui/InputText.vue";
import UiInputCountryPhone from "@/Components/Ui/InputCountryPhone.vue";
import FormError from "@/Components/Form/Error.vue";
import {Link, useForm, usePage} from '@inertiajs/vue3';
import {computed} from "vue";

const page = usePage()

const activeLocale = computed(() => page.props.activeLocale)
const form = useForm({
    carrier_type_id: "1",
    country_id: activeLocale.value.country_id,
    name: "",
    phone: "",
    email: "",
})

function send() {
    form.post('register')
}
</script>
<style lang="scss">
.tr-item {
    line-height: 1;
    border-left: 1px solid #e2e8f0;
}
</style>
