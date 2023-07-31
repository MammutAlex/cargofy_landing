<template>
  <div class="flex flex-center tw-bg-white q-pa-lg">
    <div class="text-center" style="max-width: 210px">
      <q-icon
        name="check_circle_outline"
        size="72px"
        color="primary"
        class="q-mb-md"
      />
      <slot>
        <div class="text-h6 q-mb-sm">
          <span>{{ $t("form.success_title") }}</span>
        </div>
        <div>{{ $t("form.success_text") }}</div>
      </slot>
    </div>
  </div>
</template>