<template>
  <div class="apps">
    <a
      href="https://play.google.com/store/apps/details?id=com.wozward.tonadriver"
      target="_blank"
      class="flex flex-center tw-h-[36px] tw-w-[122px]"
      rel="noreferrer nofollow"
    >
      <img
        src="@/assets/images/apps/google_play.svg"
        style="width: 102px"
        width="102"
        height="20"
        loading="lazy"
        alt=""
    /></a>
    <a
      href="https://apps.apple.com/app/cargofy-partner/id1268820287"
      target="_blank"
      class="flex flex-center tw-h-[36px] tw-w-[122px]"
      rel="noreferrer nofollow"
    >
      <img
        src="@/assets/images/apps/ios.svg"
        width="97"
        loading="lazy"
        height="22"
        alt=""
      />
    </a>
  </div>
</template>
<style lang="scss">
.apps {
  a {
    border: 1px solid #64748b;
    border-radius: 8px;
    transition: all 0.3s ease;
    &:hover {
      background: #e0e7ff;
    }
  }
}
</style>
