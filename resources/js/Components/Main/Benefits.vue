<template>
    <div class="container">
        <UiHeaderSection
            :title="$t('benefits.title')"
            :text="$t('benefits.text')"
        />

        <div class="row q-col-gutter-lg q-mb-md">
            <div
                class="col-md-3 md:tw-mb-6 tw-mb-4 tw-flex md:tw-block"
                v-for="(item, i) in items"
                :key="i"
            >
                <div
                    class="
            advantage-img
            flex
            md:tw-mb-5
            tw-mb-3
            md:tw-bg-[#f8fafc]
            tw-mr-4
            md:tw-h-[75px] md:tw-w-[68px]
            tw-min-w-[40px]
          "
                >
                    <img
                        :src="item.img"
                        width="35"
                        height="35"
                        loading="lazy"
                        class="md:tw-m-auto"
                        :alt="item.title"
                    />
                </div>
                <div class="tw-grow">
                    <div class="text-body2 text-weight-medium q-mb-sm">
                        {{ item.title }}
                    </div>
                    <div class="text-body2">
                        {{ item.description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import UiHeaderSection from "@/Components/Ui/HeaderSection.vue";
import imgFuel from "@/assets/images/benefits/1.svg"
import imgInsurance from "@/assets/images/benefits/2.svg"
import imgParts from "@/assets/images/benefits/3.svg"
import imgTruck from "@/assets/images/benefits/4.svg"
import {useI18n} from "vue-i18n";

const {t, locale} = useI18n();

const items = [
    {
        title: t('benefits.fuel_title'),
        description: t('benefits.fuel_description'),
        img: imgFuel,
    },
    {
        title: t('benefits.insurance_title'),
        description: t('benefits.insurance_description'),
        img: imgInsurance,
    },
    {
        title: t('benefits.parts_title'),
        description: t('benefits.parts_description'),
        img: imgParts,
    },
    {
        title: t('benefits.truck_title'),
        description: t('benefits.truck_description'),
        img: imgTruck,
    }
]
</script>
