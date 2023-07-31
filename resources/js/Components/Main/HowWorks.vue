<template>
  <div class="container">
    <UiHeaderSection
      :title="$t('how_it_works.title')"
      :text="$t('how_it_works.text')"
    />

    <div
      class="row hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative"
      v-for="(item, i) in items"
      :key="i"
    >
      <div
        class="
          work-num
          tw-absolute tw-left-0
          bg-primary
          text-white
          flex
          items-center
          justify-center
        "
      >
        {{ i + 1 }}
      </div>
      <div class="col-12 col-md-5 sm:tw-pl-5">
        <div class="text-subtitle2 q-mb-sm">
          {{ item.title }}
        </div>
        <div class="text-body2 q-mb-md">
          {{ item.description }}
        </div>
      </div>
      <div class="q-ml-auto col-md-3 md:tw-block tw-hidden">
        <img
          :src="item.image"
          loading="lazy"
          class="q-mx-auto"
          :style="i == 2 ? 'transform: scale(.9);' : ''"
          style="max-width: 185px; max-height: 80px"
          :alt="item.img_text"
        />
        <div class="text-center text-caption text-blue-grey-4 q-pt-sm">
          {{ item.img_text }}
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import UiHeaderSection from "@/Components/Ui/HeaderSection.vue";
import findImage from "@/assets/images/svg/hiw-4.svg";
import bookImage from "@/assets/images/svg/hiw-5.svg";
import deliverImage from "@/assets/images/svg/hiw-6.svg";
import {useI18n} from "vue-i18n";

const {t, locale} = useI18n();

const items = [
    {
        title: t('how_work.find_title'),
        description: t('how_work.find_description'),
        img_text: t('how_work.find_img_text'),
        image: findImage,
    },
    {
        title: t('how_work.book_title'),
        description: t('how_work.book_description'),
        img_text: t('how_work.book_img_text'),
        image: bookImage,
    },
    {
        title: t('how_work.deliver_title'),
        description: t('how_work.deliver_description'),
        img_text: t('how_work.deliver_img_text'),
        image: deliverImage,
    },
]
</script>
