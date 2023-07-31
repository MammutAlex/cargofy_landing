<template>
  <div v-if="items.length">
    <CommonInfiniteSlideBar duration="30s">
      <div class="row q-col-gutter-lg q-mr-lg">
        <div v-for="(item, i) in items" :key="i" style="width: 280px">
          <div
            class="bg-grey-1 text-body2 tw-h-full column"
            style="border-radius: 8px"
          >
            <div class="flex q-pa-md">
              <div style="max-width: 63%">
                <div class="q-mb-xs">{{ item.subtitle }}</div>
                <div class="q-mb-xs text-h6">{{ item.name }}</div>
                <div class="q-mb-sm">{{ item.text }}</div>
              </div>
              <div class="q-ml-auto">
                <div class="sale-img flex tw-rounded-full">
                  <img
                    :src="item.photo"
                    loading="lazy"
                    format="webp"
                    :alt="item.name"
                  />
                </div>
              </div>
            </div>

            <div class="q-pa-md q-mt-auto sale-bottom-block">
              <div class="q-mb-xs">{{ $t("partners.sales") }}</div>
              <div class="text-h6">{{ item.sale }}</div>
            </div>
          </div>
        </div>
      </div>
    </CommonInfiniteSlideBar>

    <div class="q-mt-lg text-center text-caption text-blue-grey-4">
      {{ $t("partners.text") }}
    </div>
  </div>
</template>
<script setup>
import CommonInfiniteSlideBar from "@/Components/Common/InfiniteSlideBar.vue";
import {computed} from "vue";

const props = defineProps({
    list: Array,
})
const items = computed(() => {
  const list = []
  for (let i = 0; i < 10 / (props.list.length || 10); i++) {
    list.push(...props.list)
  }
  return list
})
</script>
<style lang="scss">
.sale-bottom-block {
  border-top: 1px dashed #cbd5e1;
}

.sale-img {
  width: 78px;
  height: 78px;
  background: #fff;

  img {
    margin: auto;
  }
}

.sales-carousel {
  overflow: hidden;
  --carousel-slide-width: 280px;
}
</style>
