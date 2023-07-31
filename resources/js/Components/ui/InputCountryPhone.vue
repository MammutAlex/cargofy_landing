<template>
    <div class="flex row q-gutter-x-sm no-wrap">
        <div class="tw-min-w-[77px]">
            <q-select
                borderless
                v-model="country"
                :options="countries"
                option-value="id"
                option-label="flag"
                class="flag-select"
                :dense="dense"
                :outlined="!disable"
                :filled="disable"
                :disable="disable"
                @update:model-value="emitPhone(modelValue)"
            >
                <template v-slot:selected>
          <span
              style="
              width: 29px;
              height: 22px;
              border: 1px solid rgba(0, 0, 0, 0.1);
            "
              :class="`fi fi-${country?.id}`"
              v-if="country?.calling_code"
          ></span>
                </template>
                <template v-slot:option="scope">
                    <q-item class="flex items-center" v-bind="scope.itemProps">
            <span
                style="
                width: 24px;
                height: 19px;
                border: 1px solid rgba(0, 0, 0, 0.1);
              "
                :class="`fi fi-${scope.opt?.id}`"
            ></span>

                        <div class="q-ml-md">
                            {{ scope.opt?.name }} (+{{ scope.opt?.calling_code }})
                        </div>
                    </q-item>
                </template>
            </q-select>
        </div>
        <div class="tw-flex-grow">
            <q-input
                v-model="activeValue"
                :prefix="'+' + country?.calling_code"
                :outlined="!disable"
                :filled="disable"
                :disable="disable"
                :autofocus="autofocus"
                :mask="country?.phone_mask || '## ### - ####'"
                hide-bottom-space
                no-error-icon
                ref="input"
                inputmode="numeric"
                :dense="dense"
                :error="error ? true : false"
            />
        </div>
    </div>
</template>

<script setup>
import parsePhoneNumber from "libphonenumber-js"
import {computed, onMounted, ref, watch} from "vue";

const emit = defineEmits(["update:model-value", "update:country_id"])
const props = defineProps({
    modelValue: {
        // type: [Number, String],
        required: true,
    },
    country_id: {
        type: String,
        required: true,
    },
    dense: {
        type: Boolean,
        default: false,
    },
    format: {
        type: Boolean,
        default: false,
    },
    autofocus: {
        type: Boolean,
        default: true,
    },
    disable: {
        type: Boolean,
        default: false,
    },
    error: {},
})

const countries = [
    {
        id: "us",
        name: "United States",
        phone_mask: "### ###-####",
        flag: "🇺🇸",
        locale: "en-US",
        calling_code: "1",
    },
    {
        id: "it",
        name: "Italia",
        phone_mask: "## #### ####",
        flag: "🇮🇹",
        locale: "it-IT",
        calling_code: "39",
    },
    {
        id: "ua",
        name: "Україна",
        phone_mask: "## ###-##-##",
        flag: "🇺🇦",
        locale: "uk-UA",
        calling_code: "380",
    },
    {
        id: "sk",
        name: "Slovensko",
        phone_mask: "#### ### ###",
        flag: "🇸🇰",
        locale: "sk-SK",
        calling_code: "421",
    },
    {
        id: "si",
        name: "Slovenija",
        phone_mask: "## ### ## ##",
        flag: "🇸🇮",
        locale: "sl-SI",
        calling_code: "386",
    },
    {
        id: "se",
        name: "Sverige",
        phone_mask: "##-### ### ##",
        flag: "🇸🇪",
        locale: "sv-SE",
        calling_code: "46",
    },
    {
        id: "ro",
        name: "România",
        phone_mask: "### ### ####",
        flag: "🇷🇴",
        locale: "ro-RO",
        calling_code: "40",
    },
    {
        id: "pt",
        name: "Portugal",
        phone_mask: "### ### ###",
        flag: "🇵🇹",
        locale: "pt-PT",
        calling_code: "351",
    },
    {
        id: "pl",
        name: "Polska",
        phone_mask: "## ### ## ##",
        flag: "🇵🇱",
        locale: "pl-PL",
        calling_code: "48",
    },
    {
        id: "nl",
        name: "Nederland",
        phone_mask: "### ### ####",
        flag: "🇳🇱",
        locale: "nl-NL",
        calling_code: "31",
    },
    {
        id: "mx",
        name: "México",
        phone_mask: "##-##-####",
        flag: "🇲🇽",
        locale: "en-MX",
        calling_code: "52",
    },
    {
        id: "mt",
        name: "Malta",
        phone_mask: "####-####",
        flag: "🇲🇹",
        locale: "en-MT",
        calling_code: "356",
    },
    {
        id: "md",
        name: "Moldova",
        phone_mask: "### ### ## ##",
        flag: "🇲🇩",
        locale: "ro-MD",
        calling_code: "373",
    },
    {
        id: "lv",
        name: "Latvija",
        phone_mask: "## ### ###",
        flag: "🇱🇻",
        locale: "lv-LV",
        calling_code: "371",
    },
    {
        id: "lu",
        name: "Luxembourg",
        phone_mask: "(###)###-###",
        flag: "🇱🇺",
        locale: "en-LU",
        calling_code: "352",
    },
    {
        id: "lt",
        name: "Lietuva",
        phone_mask: "#### #####",
        flag: "🇱🇹",
        locale: "lt-LT",
        calling_code: "370",
    },
    {
        id: "at",
        name: "Österreich",
        phone_mask: "#### ######",
        flag: "🇦🇹",
        locale: "de-AT",
        calling_code: "43",
    },
    {
        id: "ie",
        name: "Éire",
        phone_mask: "(###)###-###",
        flag: "🇮🇪",
        locale: "en-IE",
        calling_code: "353",
    },
    {
        id: "hu",
        name: "Magyarország",
        phone_mask: "# ### ####",
        flag: "🇭🇺",
        locale: "hu-HU",
        calling_code: "36",
    },
    {
        id: "hr",
        name: "Hrvatska",
        phone_mask: "## #### ###",
        flag: "🇭🇷",
        locale: "hr-HR",
        calling_code: "385",
    },
    {
        id: "gr",
        name: "Ελλάδα",
        phone_mask: "## #### ####",
        flag: "🇬🇷",
        locale: "el-GR",
        calling_code: "30",
    },
    {
        id: "fr",
        name: "France",
        phone_mask: "## ## ## ## ##",
        flag: "🇫🇷",
        locale: "fr-FR",
        calling_code: "33",
    },
    {
        id: "fi",
        name: "Suomi",
        phone_mask: "## ########",
        flag: "🇫🇮",
        locale: "fi-FI",
        calling_code: "358",
    },
    {
        id: "es",
        name: "España",
        phone_mask: "### ## ## ##",
        flag: "🇪🇸",
        locale: "es-ES",
        calling_code: "34",
    },
    {
        id: "ee",
        name: "Eesti",
        phone_mask: "## ###-##-##",
        flag: "🇪🇪",
        locale: "et-EE",
        calling_code: "372",
    },
    {
        id: "dk",
        name: "Danmark",
        phone_mask: "## ## ## ##",
        flag: "🇩🇰",
        locale: "da-DK",
        calling_code: "45",
    },
    {
        id: "de",
        name: "Deutschland",
        phone_mask: "### ########",
        flag: "🇩🇪",
        locale: "de-DE",
        calling_code: "49",
    },
    {
        id: "cz",
        name: "Česká republika",
        phone_mask: "### ### ###",
        flag: "🇨🇿",
        locale: "cs-CZ",
        calling_code: "420",
    },
    {
        id: "cy",
        name: "Κύπρος",
        phone_mask: "##-###-###",
        flag: "🇨🇾",
        locale: "en-CY",
        calling_code: "357",
    },
    {
        id: "ca",
        name: "Canada",
        phone_mask: "(###)###-####",
        flag: "🇨🇦",
        locale: "en-CA",
        calling_code: "1",
    },
    {
        id: "bg",
        name: "България",
        phone_mask: "## ### ####",
        flag: "🇧🇬",
        locale: "bg-BG",
        calling_code: "359",
    },
    {
        id: "be",
        name: "België",
        phone_mask: "## ### ## ##",
        flag: "🇧🇪",
        locale: "de-BE",
        calling_code: "32",
    },
]

const country = ref(
    countries.find((o) => o.id === (props.country_id || "us")),
)

const countryPhone = ref("")

onMounted(() => {
    setPhone()
})

watch(
    () => props.modelValue,
    () => {
        setPhone()
    },
)

function setPhone() {
    const {modelValue} = props
    if (!modelValue) return
    const phone = "+" + ("" + modelValue).replace(/\D/g, "")
    const phoneNumber = parsePhoneNumber(phone)
    country.value = countries.find(
        (o) => o.calling_code == (phoneNumber.countryCallingCode || "380"),
    )
    countryPhone.value = phone?.replace(phoneNumber.countryCallingCode, "") || ""
}

function emitPhone(value) {
    if (!value) emit("update:model-value", "")
    const phone = parsePhoneNumber(
        "+" + country.value.calling_code + value?.replace(/\D/g, ""),
    )
    if (!phone) return
    emit("update:model-value", phone.number.replace("+", ""))
    emit("update:country_id", country.value.id)
}

const activeValue = computed({
    get() {
        return countryPhone.value
    },
    set(newValue) {
        emitPhone(newValue)
    },
})
</script>


<style lang="scss">
.input-country-phone {
    .q-field--outlined {
        transform: scale(0.8);

        .q-field__control {
            padding: 0 !important;

            &:before {
                border: none !important;
            }

            &:after {
                content: none !important;
            }
        }

        .q-field__native {
            padding-top: 2px !important;
        }
    }
}

.flag-select {
    .q-field__native {
        > span {
            margin-right: -7px;
            font-size: 150%;
        }
    }
}
</style>
