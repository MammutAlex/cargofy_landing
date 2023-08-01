<template>
  <div class="tw-overflow-hidden">
    <div class="container tw-relative">
      <ui-header-section
        :title="$t('findlead.title')"
        :text="$t('findlead.text')"
      />

      <div>
        <div class="hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative">
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
            1
          </div>
          <div class="md:tw-pl-7">
            <div
              class="flex q-pb-md q-pt-xs items-center"
              style="border-bottom: 1px dashed #bbc2c6"
            >
              <div class="text-subtitle2 q-mr-md">
                {{ $t("findlead.Збираємо вантажі") }}
              </div>
              <div class="items-center q-gutter-md tw-hidden sm:tw-flex">
                <nuxt-img src="/images/brands/coca-cola.svg" loading="lazy" alt="" />
                <nuxt-img
                  src="/images/brands/ovostar.png"
                  loading="lazy"
                  width="64"
                  height="31"
                  alt=""
                />
                <nuxt-img
                  src="/images/brands/heineken.png"
                  loading="lazy"
                  width="102"
                  height="24"
                  alt=""
                  style="transform: translate(0px, -4px)"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative">
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
            2
          </div>
          <div class="md:tw-pl-7">
            <div
              class="flex q-pb-md q-pt-xs items-center"
              style="border-bottom: 1px dashed #bbc2c6"
            >
              <div class="text-subtitle2 q-mr-md">
                {{ $t("findlead.Завантаження поруч?") }}
              </div>
            </div>
          </div>
        </div>

        <div class="hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative">
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
            3
          </div>
          <div class="md:tw-pl-7">
            <div
              class="flex q-pb-md q-pt-xs items-center"
              style="border-bottom: 1px dashed #bbc2c6"
            >
              <div class="text-subtitle2 q-mr-md">
                {{ $t("findlead.Вантажівка підходить?") }}
              </div>
            </div>
          </div>
        </div>

        <div class="hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative">
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
            4
          </div>
          <div class="md:tw-pl-7">
            <div
              class="flex q-pb-md q-pt-xs items-center"
              style="border-bottom: 1px dashed #bbc2c6"
            >
              <div class="text-subtitle2 q-mr-md">
                {{ $t("findlead.Ціна підходить?") }}
              </div>
            </div>
          </div>
        </div>

        <div class="hiw-item tw-pb-2 md:tw-pb-12 q-pl-xl tw-relative">
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
            5
          </div>
          <div class="md:tw-pl-7">
            <div
              class="flex q-pb-md q-pt-xs items-center"
              style="border-bottom: 1px dashed #bbc2c6"
            >
              <div class="text-subtitle2 q-mr-md">
                {{ $t("findlead.Створюємо заявку") }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <nuxt-img
        src="/images/filter-car.svg"
        class="
          tw-absolute tw--right-16
          md:tw-bottom-0
          tw--bottom-8 tw-max-h-[300px]
          md:tw-max-h-fit
        "
        alt=""
      />
      <div
        class="
          tw-absolute tw--right-11
          md:tw-bottom-0
          tw--bottom-8 tw-ml-7 tw-left-9
          md:tw-left-16
          bg-black
          tw-h-[2px]
        "
      ></div>
    </div>
  </div>
</template>


<script setup>
</script>

