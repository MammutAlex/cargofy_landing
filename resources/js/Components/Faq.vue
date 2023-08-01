<template>
  <div class="container" v-if="list.length">
    <UiHeaderSection :title="$t('faq.title')" :text="$t('faq.text')" />

    <div class="container2">
      <q-list class="md:tw--mx-5" separator>
        <q-expansion-item
          header-class="text-weight-medium"
          :header-style="
            $q.platform.is.mobile ? `padding: 7px 0;` : `padding: .3rem 1rem;`
          "
          expand-icon-class="text-grey-13"
          v-for="(item, i) in list"
          :key="i"
          :label="item.question"
        >
          <div
            class="tw-px-0 md:tw-px-4 tw-pt-3 tw-pb-5"
            v-html="item.answer"
          ></div>
        </q-expansion-item>
      </q-list>
    </div>
  </div>
</template>
<script setup>
import UiHeaderSection from "@/Components/ui/HeaderSection.vue";

const props = defineProps({
    list: Array,
})
</script>
