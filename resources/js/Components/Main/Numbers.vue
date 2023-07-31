<template>
  <div class="row q-col-gutter-lg">
    <div class="col-6 col-md-auto">
      <div class="q-pl-md tr-item">
        <div class="text-h6 q-mb-xs">8</div>
        <div>{{ t("years working") }}</div>
      </div>
    </div>
    <div class="col-6 col-md-auto">
      <div class="q-pl-md tr-item">
        <div class="text-h6 q-mb-xs">300+</div>
        <div>{{ t("satisfied reviews") }}</div>
      </div>
    </div>

    <div class="col-6 col-md-auto">
      <div class="q-pl-md tr-item">
        <div class="text-h6 q-mb-xs">15</div>
        <div>{{ t("countries available for work") }}</div>
      </div>
    </div>
  </div>
</template>



<i18n>
{
  "en-us": {
    "years working": "years working",
    "satisfied reviews": "satisfied reviews",
    "countries available for work": "countries available for work",
  },
  "uk-ua": {
    "years working": "років роботи",
    "satisfied reviews": "задоволених відгуків",
    "countries available for work": "доступних для роботи країн",

  }
}
</i18n>

<script setup>
const { t } = useI18n()
</script>