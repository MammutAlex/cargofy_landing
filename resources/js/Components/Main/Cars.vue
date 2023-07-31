<template>
    <div
        class="tw-h-full tw-relative parallax-cars tw-overflow-hidden"
        style="
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      max-width: 100%;
      height: 100vh;
    "
    >
        <img
            src="@/assets/images/cars/1.webp"
            ref="car1"
            class="md:tw-w-[13vw] md:tw-top-[20vh] md:tw-left-[-5vw] md:tw-right-none tw-right-[-80px] tw-w-[200px] tw-top-[175px]"
        />
        <img
            src="@/assets/images/cars/2.webp"
            ref="car2"
            loading="lazy"
            class="md:tw-w-[13vw] md:tw-top-[52vh] md:tw-left-[2vw] tw-left-[-120px] tw-w-[200px] tw-top-[240px]"
        />

        <img
            src="@/assets/images/cars/3.webp"
            ref="car3"
            loading="lazy"
            class="md:tw-w-[4.5vw] md:tw-top-[17vh] md:tw-left-[38vw] tw-left-[60vw] tw-w-[70px] tw-top-[65px]"
        />

        <img
            src="@/assets/images/cars/4.webp"
            ref="car4"
            loading="lazy"
            class="tw-hidden md:tw-block"
            style="width: 13vw; top: 52vh; left: 43vw"
        />

        <img
            src="@/assets/images/cars/5.webp"
            ref="car5"
            loading="lazy"
            class="tw-hidden md:tw-block"
            style="width: 5vw; top: 24vh; left: 80vw"
        />
        <img
            src="@/assets/images/cars/2.webp"
            ref="car6"
            loading="lazy"
            class="tw-hidden md:tw-block"
            style="width: 12vw; top: 50vh; left: 90vw"
        />
        <img
            src="@/assets/images/cars/6.webp"
            ref="car7"
            loading="lazy"
            class="tw-hidden md:tw-block"
            style="width: 6vw; top: 86vh; left: 66vw"
        />
    </div>
</template>
<script setup>
import simpleParallax from "simple-parallax-js"
import {onMounted, ref} from "vue";

const car1 = ref(null)
const car2 = ref(null)
const car3 = ref(null)
const car4 = ref(null)
const car5 = ref(null)
const car6 = ref(null)
const car7 = ref(null)

onMounted(() => {
    if (window.innerWidth < 600) return
    new simpleParallax(car1.value, {
        delay: 0,
        orientation: "up-right",
        scale: 2.3,
        overflow: true,
    })

    new simpleParallax(car2.value, {
        delay: 0,
        orientation: "down-left",
        scale: 2.3,
        overflow: true,
    })

    new simpleParallax(car3.value, {
        delay: 0,
        orientation: "down-left",
        scale: 4.5,
        overflow: true,
    })

    new simpleParallax(car4.value, {
        delay: 0,
        orientation: "up-right",
        scale: 2.3,
        overflow: true,
    })

    new simpleParallax(car5.value, {
        delay: 0,
        orientation: "up-right",
        scale: 2.3,
        overflow: true,
    })

    new simpleParallax(car6.value, {
        delay: 0,
        orientation: "down-left",
        scale: 2.3,
        overflow: true,
    })

    new simpleParallax(car7.value, {
        delay: 0,
        orientation: "down-left",
        scale: 3,
        overflow: true,
    })
})
</script>


<style lang="scss">
.parallax-cars {
    opacity: 0.3;

    img {
        position: absolute;
    }
}
</style>
