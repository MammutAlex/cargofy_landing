<template>
    <div class="container">
        <UiHeaderSection
            :title="$t('our_advantages.title')"
            :text="$t('our_advantages.text')"
        />
        <div class="row q-col-gutter-lg tw--mb-2">
            <div
                class="col-md-4 md:tw-mb-6 tw-mb-2 tw-flex md:tw-block"
                v-for="(item, i) in items"
                :key="i"
            >
                <div
                    class="advantage-img flex md:tw-mb-5 tw-mb-3 tw-grow md:tw-bg-[#f8fafc] tw-mr-4 md:tw-h-[75px] md:tw-w-[68px] tw-min-w-[40px]"
                >
                    <img
                        :src="item.img"
                        width="35"
                        height="35"
                        loading="lazy"
                        class="md:tw-m-auto"
                        alt=""
                    />
                </div>

                <div>
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
import imgMileage from "@/assets/images/advantages/1.svg"
import imgRates from "@/assets/images/advantages/2.svg"
import imgSet from "@/assets/images/advantages/3.svg"
import imgDispatcher from "@/assets/images/advantages/4.svg"
import imgBrand from "@/assets/images/advantages/5.svg"
import imgPay from "@/assets/images/advantages/6.svg"
import {useI18n} from "vue-i18n";

const {t, locale} = useI18n();

const items = [
    {
        title: t('advantages.mileage_title'),
        description: t('advantages.mileage_description'),
        img: imgMileage,
    },
    {
        title: t('advantages.rates_title'),
        description: t('advantages.rates_description'),
        img: imgRates,
    },
    {
        title: t('advantages.set_title'),
        description: t('advantages.set_description'),
        img: imgSet,
    },
    {
        title: t('advantages.dispatcher_title'),
        description: t('advantages.dispatcher_description'),
        img: imgDispatcher,
    },
    {
        title: t('advantages.brand_title'),
        description: t('advantages.brand_description'),
        img: imgBrand,
    },
    {
        title: t('advantages.pay_title'),
        description: t('advantages.pay_description'),
        img: imgPay,
    },
];
</script>


<style lang="scss">
.advantage-img {
    border-radius: 8px;

    img {
        max-width: 40px;
        max-height: 40px;
        height: auto;
        width: auto;
    }
}
</style>
