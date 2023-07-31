<template>
  <div>
    <div class="flex items-center cursor-pointer">
      <q-icon name="language" size="22px" />
      <div class="tw-ml-3">
        <div class="text-body2 text-weight-medium">
          {{ activeLocale?.original_name }}
        </div>
        <div class="text-body2 text-grey-5">
          {{ activeLocale?.name }}
        </div>
      </div>
    </div>
    <q-menu>
      <q-list separator dense>
        <q-item
          clickable
          @click="switchLang(item)"
          v-for="item in locales"
          :key="item.code"
        >
          <div class="flex text-caption items-center" style="min-width: 170px">
            <div
              class="q-mr-sm"
              style="
                width: 22px;
                height: 17px;
                border: 1px solid rgba(0, 0, 0, 0.1);
              "
              :class="`fi fi-${item?.country_id}`"
            ></div>
            <div>{{ item.original_name }} — {{ item?.name }}</div>

            <!-- <div class="q-ml-auto" style="margin-right: -5px">
              <div
                class="bg-grey-1 tw-px-2 tw-py-[1px] tw-rounded"
                style="border: 1px solid #cbd5e1; text-transform: uppercase"
              >
                {{ item.code_lang }}
              </div>
            </div> -->
          </div>
        </q-item>
      </q-list>
    </q-menu>
  </div>
</template>


<script setup>
const { locale, locales } = useI18n()
// const switchLocalePath = useSwitchLocalePath()
const activeLocale = useActiveLocale()

function switchLang(item) {
  const base = location.pathname.replace(`/${locale.value}`, "")
  location.pathname = (item.base_url + base).replaceAll("//", "/")
}
</script>