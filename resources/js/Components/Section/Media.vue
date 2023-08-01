<template>
  <div class="flex flex-center q-gutter-xl text-body2">
    <div class="text-blue-grey-4">{{ t("text1") }}:</div>
    <img src="/images/media/1.svg" loading="lazy" alt="" />
    <img src="/images/media/2.svg" loading="lazy" alt="" />
    <img src="/images/media/3.svg" loading="lazy" alt="" />
    <img src="/images/media/4.svg" loading="lazy" alt="" />
    <img src="/images/media/5.svg" loading="lazy" alt="" />
  </div>
</template>


<i18n>
{
  "en-us": {
    "text1": "Media about us",

  },
  "uk-ua": {
    "text1": "ЗМІ про нас",

  }
}
</i18n>


<script setup>
const { t } = useI18n()
const form = ref({})
</script>