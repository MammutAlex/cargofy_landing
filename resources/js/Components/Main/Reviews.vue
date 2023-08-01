<template>
  <div class="container" v-show="list.length">
    <div class="md:tw-text-center tw-mb-6 md:tw-mb-9">
      <div class="text-h6 q-mb-sm">{{ $t("main.reviews_title") }}</div>
      <SectionTrustpilot class="text-body1" style="line-height: 1.8" />
    </div>

    <div class="reviews-carousel carousel" ref="carousel">
      <div
        class="column no-wrap flex-center carousel__slide"
        v-for="(item, i) in list"
        :key="i"
      >
        <div class="container2 tw-px-6 md:tw-px-2">
          <img
            src="@/assets/images/quote.svg"
            width="31"
            height="22"
            class="q-mb-lg"
            loading="lazy"
            alt="quote"
          />
          <div>{{item.review}}</div>
          <div class="flex flex-center q-mt-lg">
            <!-- <img src="/images/user.png" class="q-mr-lg" alt="" /> -->
            <div class="text-grey-7">
              <div class="text-weight-medium">{{ item.author }}</div>
              <!-- {{ item.company }} -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>




<style lang="scss">
.reviews-carousel {
  overflow: hidden;
  --carousel-slide-width: 100%;
}

@media (max-width: 500px) {
  .reviews-carousel {
    .carousel__button {
      transform: scale(0.8);
      //  bottom: 10px;
      &.is-prev {
        left: -10px;
      }
      &.is-next {
        right: -10px;
      }
    }
  }
}
</style>


<script setup>
import SectionTrustpilot from "@/Components/Section/Trustpilot.vue";
import {onMounted, ref} from "vue";
import {Carousel} from "@fancyapps/ui";

defineProps({
    list: Array,
})

onMounted(() => {
  new Carousel(carousel.value, {
    infinite: true,
    Dots: false,
  })
})

const carousel = ref(null)
</script>
