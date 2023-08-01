<template>
    <div class="q-py-xl download-touch bg-grey-2 lg:tw-rounded-[80px]">
        <div class="container">
            <div class="row">
                <div class="col-md-5 column">
                    <div class="q-mb-md">
                        <div class="text-h6 q-mb-sm">{{ $t("download_app.title") }}</div>
                        <div class="md:tw-text-base">
                            {{ $t("download_app.text") }}
                        </div>
                    </div>

                    <q-form @submit="send()" class="q-pb-lg q-pt-lg">
                        <div class="text-body1 text-weight-medium q-mb-md">
                            {{ $t("download_app.text2") }}:
                        </div>
                        <div class="md:tw-max-w-[300px]">
                            <UiInputCountryPhone
                                :autofocus="false"
                                dense
                                v-model="form.phone"
                                v-model:country_id="form.country_id"
                                v-model:error="form.errors.phone"
                                class="q-mb-lg"
                            />

                            <q-btn
                                no-caps
                                color="primary"
                                class="q-mb-sm full-width"
                                unelevated
                                :loading="form.processing"
                                type="submit"
                                :label="$t('download_app.get_link')"
                            />
                            <div class="text-blue-grey-5 tw-text-[.75rem]">
                                {{ $t("download_app.text3") }}

                                <Link
                                    style="text-decoration: underline"
                                    class="text-primary"
                                    :href="route('terms-of-use')"
                                >{{ $t("download_app.privacy_terms") }}
                                </Link>
                            </div>
                        </div>
                        <div
                            v-if="isSuccess"
                            class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10 flex items-center bg-grey-2"
                        >
                            <div>
                                <div class="text-h6 q-mb-sm">
                                    <span>{{ $t("download_app.Thank you!") }}</span>
                                </div>
                                <div class="q-mb-md">
                                    {{ $t("download_app.Thank you text") }}
                                </div>

                                <q-btn
                                    no-caps
                                    color="blue-grey-3"
                                    icon="done"
                                    style="min-width: 150px"
                                    disable
                                    unelevated
                                    :label="$t('download_app.Sent')"
                                />
                            </div>
                        </div>
                        <FormError
                            v-if="form.hasErrors && !form.errors.phone"
                            class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
                        />
                    </q-form>

                    <div class="q-mt-auto">
                        <div class="q-mb-sm tw-text-sm">
                            {{ $t("download_app.download") }}
                        </div>
                        <CommonApps class="flex q-gutter-md"/>
                    </div>
                </div>

                <div
                    class="tw-ml-auto md:tw-mr-0 tw-mr-auto tw-mt-7 md:tw-mt-0 tw-hidden md:tw-block"
                >
                    <img
                        src="@/assets/images/phone-xl.webp"
                        loading="lazy"
                        style="margin-bottom: -20px; max-height: 491px; max-width: 400px"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import UiInputCountryPhone from "@/Components/Ui/InputCountryPhone.vue";
import FormError from "@/Components/Form/Error.vue";
import CommonApps from "@/Components/Common/Apps.vue";
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

async function send() {
    form.post(route('registration'))
}
</script>
