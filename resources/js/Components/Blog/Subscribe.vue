<template>
    <div class="bg-grey-2 q-pa-lg text-center tw-rounded-md tw-relative">
        <img src="@/assets/images/blog/bus.svg" class="q-mb-md q-mx-auto" alt="bus"/>

        <div class="text-subtitle2 q-mb-sm">{{ $t("subscribe.title") }}</div>
        <div class="q-mb-md">
            {{ $t("subscribe.text") }}
        </div>
        <q-form @submit="send()">
            <UiInputText
                v-model:error="form.errors.email"
                v-model="form.email"
                class="q-mb-md"
                label="E-mail"
            />

            <q-btn
                no-caps
                color="primary"
                class="q-mb-sm full-width"
                unelevated
                type="submit"
                :loading="form.processing"
                :label="$t('subscribe.send')"
            />
        </q-form>

        <form-success
            v-if="form.wasSuccessful"
            class="bg-grey-2 tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
        >
            <div class="text-h6">
                {{ $t("subscribe.Thank you, you are subscribed to our newsletter") }}
            </div>
        </form-success>
        <FormError
            v-if="form.hasErrors && !form.errors.email"
            class="tw-absolute tw-top-0 tw-left-0 tw-right-0 tw-bottom-0 tw-z-10"
        />

        <div class="text-caption text-blue-grey-4">
            {{ $t("subscribe.text3") }}

            <Link style="text-decoration: underline" :href="route('terms-of-use')">
                {{ $t("subscribe.privacy_terms") }}
            </Link>
        </div>
    </div>
</template>

<script setup>
import {Link, useForm} from '@inertiajs/vue3';
import UiInputText from "@/Components/ui/InputText.vue";
import FormSuccess from "@/Components/Form/Success.vue";
import FormError from "@/Components/Form/Error.vue";


const form = useForm({
    email: null,
})

async function send() {
    form.post(route('subscribe'), {
        preserveScroll: true,
    })
}
</script>
