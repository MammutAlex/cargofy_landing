<template>
    <Layout :page="page">
        <div>
            <MainForm class="tw-mb-10 md:tw-mb-0"/>
            <!--        <MainLoads class="q-mb-xl q-pb-xl"/>-->
            <MainHowWorks class="q-mb-md q-pb-xl"/>
            <MainRates :list="trucks" class="q-mb-xl q-pb-xl"/>
            <MainAdvantages class="q-mb-xl q-pb-xl"/>
            <MainDownloadApp class="q-mb-xl q-pb-xl"/>
            <MainBenefits class="q-mb-xl q-pb-xl q-pt-xl"/>
            <MainPartners :list="partners" class="q-mb-xl q-pb-xl"/>
            <MainReviews :list="reviews" class="q-mb-xl q-pb-xl"/>
            <Publications :list="publications" class="q-mb-xl q-pb-xl"/>
            <Faq :list="faq" class="q-mb-lg q-pb-xl"/>
            <MainPartner class="q-mb-xl q-pb-xl"/>
            <Seo :text="page.seo_text" class="q-mb-xl q-pb-xl q-pt-lg"/>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Layouts/default.vue";
import MainForm from "@/Components/Main/Form.vue";
import MainLoads from "@/Components/Main/Loads.vue";
import MainHowWorks from "@/Components/Main/HowWorks.vue";
import MainRates from "@/Components/Main/Rates.vue";
import MainAdvantages from "@/Components/Main/Advantages.vue";
import MainDownloadApp from "@/Components/Main/DownloadApp.vue";
import MainBenefits from "@/Components/Main/Benefits.vue";
import MainPartners from "@/Components/Main/Partners.vue";
import MainReviews from "@/Components/Main/Reviews.vue";
import Publications from "@/Components/Publications.vue";
import Faq from "@/Components/Faq.vue";
import MainPartner from "@/Components/Main/Partner.vue";
import Seo from "@/Components/Seo.vue";

defineProps({
    page: Object,
    trucks: Array,
    partners: Array,
    reviews: Array,
    publications: Array,
    faq: Array,
})
</script>
