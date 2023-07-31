<script setup>
import CommonHeader from '@/Components/Common/Header.vue';
import CommonFooter from '@/Components/Common/Footer.vue';
import {Head} from "@inertiajs/vue3";

defineProps({
    landing: {
        type: Boolean,
        default: true
    },
    page: {
        type: Object,
    },
})
</script>

<template>
    <Head v-if="page">
        <title>{{page.meta_title||page.title}}</title>
        <meta name="description" :content="page.meta_description||page.description"/>
        <component is="script" type="application/ld+json" v-if="page.schema">
            {{ JSON.stringify(page.schema) }}
        </component>
    </Head>
    <q-layout view="hHh lpR lff">
        <div
            class="page-wrap"
            :class="{'tw-min-h-screen column q-pt-xl':landing}"
        >
            <CommonHeader/>

            <slot v-if="landing"/>
            <q-page-container class="q-mb-xl" v-else>
                <slot/>
            </q-page-container>

            <CommonFooter class="q-mt-auto"/>
        </div>
    </q-layout>
</template>
