<template>
    <div class="q-mb-lg q-pb-sm">
        <div class="flex q-mb-sm tw-items-start">
            <Link
                class="text-weight-medium md:tw-max-w-[75%]"
                :href="route('publications.show',article.slug)"
            >
                {{ article.title }}
            </Link>
            <div
                class="md:tw-ml-auto text-grey-7 items-center tw-flex tw-my-3 md:tw-my-0 tw-order-first md:tw-order-last tw-w-full md:tw-w-auto tw-whitespace-nowrap"
                v-if="article.author"
            >
                <img
                    :src="article.author.avatar"
                    :width="24"
                    :height="24"
                    class="q-mr-sm tw-rounded-full"
                    loading="lazy"
                    :alt="article.author.name"
                />
                {{ article.author.name }}
            </div>
        </div>

        <div class="q-mb-sm">{{ article.description }}</div>

        <div class="text-grey-4">
            <span class="q-mr-lg">{{ dateFormat(article.published_at) }} </span>
            {{ article.views_count }} {{ $t("blog.views") }}
        </div>
    </div>
</template>
<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage()

const activeLocale = computed(() => page.props.activeLocale)
defineProps({
    article: {
        type: Object,
        required: true,
    },
})

function dateFormat(date) {
    return new Date(date).toLocaleDateString(activeLocale.value.code, {
        day: "numeric",
        month: "long",
    })
}
</script>
