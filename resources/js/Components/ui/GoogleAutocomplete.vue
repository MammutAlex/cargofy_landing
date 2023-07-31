<template>
  <ui-input-text
    ref="input"
    v-bind="$attrs"
    :model-value="modelValue?.name"
    :label="label"
    clearable
    @clear="emit('update:model-value', {})"
    clear-icon="close"
    @click="loadGoogleMaps()"
  />
</template>



<script setup>
const emit = defineEmits(["update:model-value", "blur"])

const props = defineProps({
  modelValue: {},
  // delayInit: {
  //   type: Boolean,
  //   default: false,
  // },
  label: {
    type: String,
    default: "",
  },
})

let autocomplete = null

async function loadGoogleMaps() {
  if (typeof google === "undefined") {
    await useGoogleMaps()
  }

  autocomplete = new google.maps.places.Autocomplete(
    input.value.$el.querySelector("input"),
    {
      //  fields: ["formatted_address", "geometry", "name"],
      // strictBounds: false,
      types: [
        // "locality",
        // "sublocality",
        // "street_address",
        // "street_number",
        // "route",
        "geocode",
      ],
    },
  )
  autocomplete.addListener("place_changed", seeAutoComplete)
}

// onMounted(async () => {
//   if (typeof google === "undefined") {
//     await useGoogleMaps()
//   }

//   autocomplete = new google.maps.places.Autocomplete(
//     input.value.$el.querySelector("input"),
//     {
//       //  fields: ["formatted_address", "geometry", "name"],
//       // strictBounds: false,
//       types: [
//         // "locality",
//         // "sublocality",
//         // "street_address",
//         // "street_number",
//         // "route",
//         "geocode",
//       ],
//     },
//   )
//   autocomplete.addListener("place_changed", seeAutoComplete)
// })

function seeAutoComplete() {
  const data = autocomplete.getPlace()
  const city =
    data.address_components?.find((o) => o.types?.includes("locality"))
      ?.long_name || data.name
  const state =
    data.address_components?.find((o) =>
      o.types?.includes("administrative_area_level_1"),
    )?.long_name || data.name
  const ardess = {
    name: data.formatted_address,
    country: data.country,
    address: "",
    address_2: "",
    city,
    state,
    postal_code: "",
    lat: data.geometry.location.lat(),
    lng: data.geometry.location.lng(),
  }

  emit("update:model-value", ardess)
}

const input = ref(null)
</script>
