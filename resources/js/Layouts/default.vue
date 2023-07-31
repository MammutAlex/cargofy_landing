<script setup>
import CommonHeader from '@/Components/Common/Header.vue';
import CommonFooter from '@/Components/Common/Footer.vue';
import {Link} from '@inertiajs/vue3';

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
