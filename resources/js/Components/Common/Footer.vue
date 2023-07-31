<template>
  <div>
    <div class="q-pt-xl">
      <div
        class="container tw-flex tw-flex-col md:tw-flex-row tw-justify-between"
      >
        <div>
          <div class="q-mb-sm">
            <Link :href="route('about-us')"
              >{{ $t("footer.about_us") }}
            </Link>
          </div>
          <div class="q-mb-sm">
            <Link target="_blank" :href="`https://hr.cargohub.co/jobs/country/`">{{
              $t("footer.Vacancies")
            }}</Link>
          </div>
          <div class="q-mb-sm">
            <Link :href="route('truck-dispatcher.index')">
                {{ $t("sitemap.dispatchers") }}
            </Link>
          </div>
        </div>

        <div class="tw-pb-6">
          <div class="q-mb-sm">
            <Link :href="route('sitemap.index')"
              >{{ $t("footer.site_map") }}
            </Link>
          </div>
          <div class="q-mb-sm">
            <Link :href="route('publications.index')"
              >{{ $t("footer.blog") }}
            </Link>
          </div>
        </div>

        <div class="tw-pb-8">
          <div class="tw-mb-[10px]">{{ $t("footer.download_app") }}</div>
          <CommonApps class="column q-gutter-sm" />
        </div>

        <div class="tw-pb-8 md:tw-order-first">
          <div class="flex q-col-gutter-sm soc-list">
              <a
                  href="https://www.facebook.com/cargofy"
                  target="_blank"
                  rel="noreferrer nofollow"
              >
                  <img
                      width="24"
                      height="24"
                      src="@/assets/images/social/facebook.svg"
                      alt="facebook"
                  />
              </a>
              <a
                  href="https://www.linkedin.com/company/cargofy"
                  target="_blank"
                  rel="noreferrer nofollow"
              >
                  <img
                      width="24"
                      height="24"
                      src="@/assets/images/social/linkedin.svg"
                      alt="linkedin"
                  />
              </a>
              <a
                  href="https://twitter.com/cargofy"
                  target="_blank"
                  rel="noreferrer nofollow"
              >
                  <img
                      width="24"
                      height="24"
                      src="@/assets/images/social/twitter.svg"
                      alt="twitter"
                  />
              </a>
              <a
                  href="https://www.instagram.com/cargofy"
                  target="_blank"
                  rel="noreferrer nofollow"
              >
                  <img
                      width="24"
                      height="24"
                      src="@/assets/images/social/instagram.svg"
                      alt="instagram"
                  />
              </a>
          </div>
        </div>
      </div>
    </div>
    <div class="tw-pt-6 tw-pb-3 bg-grey-12">
      <div
        class="container tw-flex tw-flex-col md:tw-flex-row md:tw-items-center"
      >
        <div class="md:tw-mr-6 tw-pb-2">
          <Link :href="route('agreements')">
              {{ $t("footer.Public offer") }}
          </Link>
        </div>

        <div class="md:tw-mr-6 tw-pb-2">
          <Link :href="route('terms-of-use')">
              {{ $t("footer.Terms of use") }}
          </Link>
        </div>

        <div class="md:tw-mr-6 tw-pb-2">
          <Link :href="route('policy')">
              {{ $t("footer.Privacy policy") }}
          </Link>
        </div>

        <div class="flex items-center tw-my-3 md:tw-my-0 md:tw-mx-auto tw-pb-2">
          <img class="q-mr-sm" src="@/assets/images/payments/visa.svg" alt="visa" />
          <img src="@/assets/images/payments/mastercard.svg" alt="mastercard" />
        </div>

        <SelectLanguage class="tw-pb-2" />

        <div
          class="md:tw-mr-6 tw-pb-2 tw-pt-5 md:tw-pt-0 md:tw-order-first text-center text-grey-5"
        >
          © {{ new Date().getFullYear() }} Cargofy Inc.
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import CommonApps from '@/Components/Common/Apps.vue';
import SelectLanguage from "@/Components/Common/SelectLanguage.vue";
</script>

