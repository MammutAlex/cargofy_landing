<template>
    <div v-click-outside="hide">
        <div class="flex items-center cursor-pointer" @click="show = !show">
            <q-icon name="language" color="primary" size="22px"/>
            <div class="tw-ml-2 text-body2">
                <span class="text-weight-medium">{{ activeLocale?.country }}</span>
                — {{ activeLocale?.name }}
                <q-icon
                    color="blue-grey-3"
                    size="sm"
                    :name="show ? 'expand_more' : 'expand_less'"
                />
            </div>
        </div>

        <div
            :class="{ show: show }"

            class="language-list tw-absolute tw-bottom-[110px]  md:tw-bottom-[68px] tw-right-0 tw-left-0 bg-white"
        >
            <q-separator/>
            <div class="md:tw-pt-8 tw-pt-4 tw-pb-2">
                <div class="text-h6 container q-mb-lg">
                    {{ $t('footer.choose_your_country') }}
                </div>

                <div
                    class="container tw-overflow-auto tw-pb-4 md:tw-pb-6"
                    style="max-height: calc(100vh - 238px)"
                >
                    <ul class="md:tw-columns-3 xl:tw-columns-4">
                        <li @click="switchLang(item)"
                            v-for="item in locales"
                            :key="item.code"
                            class="q-py-xs tw-cursor-pointer"
                            :class="{'text-primary':item.code===activeLocale.code}">
                            <span class="text-weight-medium">{{ item.country }}</span>
                            — {{ item?.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import {router, usePage} from '@inertiajs/vue3'
import {computed, ref} from "vue";

const page = usePage()


const locales = computed(() => page.props.locales)
const activeLocale = computed(() => page.props.activeLocale)


const show = ref(false)

function hide() {
    show.value = false
}

function switchLang(item) {
    router.post(route('locale'), {
        locale: item.code,
    }, {
        onSuccess: page => location.reload(),
    })
}
</script>
<style lang="scss">
.language-list {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s ease;

    &.show {
        opacity: 1;
        visibility: visible;
    }

    ul a:hover {
        color: var(--q-primary);
    }
}
</style>
