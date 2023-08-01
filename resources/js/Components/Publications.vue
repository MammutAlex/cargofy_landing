<template>
    <div class="container">
        <UiHeaderSection
            :title="$t('blog.section_title')"
            :text="$t('blog.section_text')"
        />

        <div class="q-mb-lg text-body2 container2">
            <BlogList :article="article" v-for="article in list" :key="article.slug"/>
        </div>

        <Link :href="route('publications.index')" class="flex-center flex">
            <q-btn
                no-caps
                color="primary"
                outline
                class="bg-blue-grey-11"
                :label="$t('blog.section_read_all')"
            />
        </Link>
    </div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import UiHeaderSection from "@/Components/ui/HeaderSection.vue";
import BlogList from "@/Components/Blog/List.vue";

defineProps({
    list: Array,
})
</script>
