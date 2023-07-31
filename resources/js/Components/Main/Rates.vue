<template>
    <div class="container">
        <UiHeaderSection :title="$t('rates.title')"/>

        <div v-if="$q.platform.is.mobile">
            <q-list separator>
                <q-expansion-item
                    header-class="text-weight-medium q-px-none mob-track-header"
                    expand-icon-class="text-grey-13"
                    class=""
                    v-for="(item, i) in list"
                    :key="i"
                >
                    <template #header="{ expanded, toggle }">
                        <div class="q-py-xs">
                            <div class="text-weight-medium q-mb-xs">{{ item.name }}</div>
                            <div class="text-weight-regular tw-max-w-[130px]">
                                {{ item.capacity }}{{ item.capacity_unit }} <br/>
                                {{item.volume }}<span style="font-family: monospace">{{
                                    item.volume_unit
                                }}</span
                            ><br/>
                                {{ $t("rates.from") }} {{
                                    item.price_per_unit_length
                                }}{{ item.currency }} {{ $t("rates.per") }}
                                {{ item.distance_unit }}
                            </div>
                        </div>

                        <div class="q-ml-auto text-primary q-py-xs">
                            ≈{{ item.price_per_month }}
                            {{ item.currency }}
                            <div class="text-weight-regular">{{ $t("rates.per month") }}</div>
                        </div>
                    </template>
                    <div class="items-center q-py-md" style="display: flex">
                        <img
                            :src="item.photo"
                            loading="lazy"
                            height="300"
                            format="webp"
                            style="width: 30%"
                            class="q-mr-lg"
                            alt=""
                        />

                        <div>
                            {{ item.example }}
                            <div class="text-grey-4">{{ $t("rates.or similar") }}</div>
                        </div>
                    </div>
                </q-expansion-item>
            </q-list>
        </div>

        <div v-else class="row q-col-gutter-lg q-pb-md">
            <div class="col-md-6 tw-mb-5 md:tw-mb-0">
                <template v-for="item in list" :key="item.title">
                    <div
                        class="q-pb-lg q-pl-lg item-rate tw-relative cursor-pointer md:tw-ml-7"
                        :class="{ active: active.photo == item.photo }"
                        @mouseover="active = item"
                    >
                        <div class="q-mb-sm text-subtitle2">{{ item.name }}</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="tw-max-w-[130px]">
                                    {{ item.capacity }}{{ item.capacity_unit }}  <br/>
                                    {{item.volume }}<span style="font-family: monospace">{{item.volume_unit }}</span><br/>
                                    {{ $t("rates.from") }} {{
                                        item.currency
                                    }}{{ item.price_per_unit_length }} {{ $t("rates.per") }}
                                    {{ item.distance_unit }}
                                </div>
                            </div>
                            <div class="q-ml-auto text-primary md:tw-text-right">
                                <div class="text-weight-medium">
                                    ≈ {{ item.currency }}{{ item.price_per_month }}
                                </div>
                                <div class="text-weight-regular">{{ $t("rates.per month") }}</div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="col-md-6 column flex-center img md:tw-order-first">
                <img
                    format="webp"
                    height="500"
                    loading="lazy"
                    :src="active?.photo"
                    class="max-w-full"
                    style="max-height: 300px"
                    alt=""
                />

                <div class="text-center q-mt-md">
                    {{ active?.example }}
                    <span class="text-grey-4"> {{ $t("rates.or similar") }} </span>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
.mob-track-header {
    .q-item__section--side {
        padding: 0;
        position: absolute;
        bottom: 8px;
        right: 5px;
    }
}

.item-rate {
    > div {
        opacity: 0.3;
        transition: all 0.3s ease;
    }

    &:last-child {
        padding-bottom: 0 !important;

        &.active {
            &:after {
                height: 100%;
            }
        }
    }

    &.active {
        > div {
            opacity: 1;
        }

        &:after {
            content: "";
            display: block;
            width: 2px;
            height: calc(100% - 24px);
            background-color: var(--q-primary);
            position: absolute;
            top: 0px;
            left: 0px;
        }
    }

    &:before {
        content: "";
        display: block;
        width: 2px;
        height: 100%;
        background-color: #e2e8f0;
        position: absolute;
        top: 0px;
        left: 0px;
    }
}
</style>
<script setup>
import UiHeaderSection from "@/Components/Ui/HeaderSection.vue";
import {ref} from "vue";

const props = defineProps({
    list: Array,
})

const active = ref(props.list[0])
</script>
