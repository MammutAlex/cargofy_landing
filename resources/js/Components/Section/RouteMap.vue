<template>
  <div style="max-width: 100%; overflow: hidden" class="wrap-map-leaflet">
    <div id="map" class="js-map tw-h-full"></div>
  </div>
</template>



<script setup>
import L from "leaflet"
import "leaflet/dist/leaflet.css"
const props = defineProps({
  fromTo: {
    type: Array,
    //  default: () => {},
  },
  dotList: {
    type: Array,
  },
  center: {
    type: Array,
    default: () => [],
  },
})
const emit = defineEmits(["data"])
let map = null

const accessToken =
  "pk.eyJ1IjoiYWxleGtvdmFsY2h1ayIsImEiOiJjazRyMnE2NzQyYTg3M2RsZGQ4ZmhjaXc0In0.0AJkupUiwKj17q-vpOIt4w"

const defIcon = L.icon({
  iconUrl: "/images/svg/marker-point.svg",
  iconSize: [24, 24],
  iconAnchor: [12, 12],
})

onMounted(async () => {
  const center = props.dotList
    ? [props.dotList[0].lat, props.dotList[0].lng]
    : props.center

  map = L.map("map").setView(center, 7)

  L.tileLayer(
    "https://api.mapbox.com/styles/v1/alexkovalchuk/cktvt8q9m04kz17m0g91fefg9/tiles/256/{z}/{x}/{y}@2x?access_token=" +
      accessToken,
    {
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      id: "mapbox/streets-v11",
      tileSize: 512,
      zoomOffset: -1,
      boxZoom: false,
      dragging: false,
      accessToken,
    },
  ).addTo(map)
  map.scrollWheelZoom.disable()

  if (props.fromTo) {
    getRoute()
  }

  if (props.dotList) {
    setDotList(props.dotList)
  }
})

function setDotList(dotList) {
  const markers = dotList.map((o) =>
    L.marker([o.lat, o.lng], { icon: defIcon }),
  )

  // додати маркери на карту
  markers.forEach((marker) => {
    marker.addTo(map)
  })

  // викликати метод fitBounds для масиву маркерів
  const group = new L.featureGroup(markers)
  map.fitBounds(group.getBounds())
}

async function getRoute() {
  // const from = [props.fromTo.city1.lat, props.fromTo.city1.lng]
  // const to = [props.fromTo.city2.lat, props.fromTo.city2.lng]

  // const startPoint = L.marker(from, { icon: defIcon }).addTo(map)
  // const endPoint = L.marker(to, { icon: defIcon }).addTo(map)

  //   const url =
  //     "https://api.mapbox.com/directions/v5/mapbox/driving/" +
  //     startPoint.getLatLng().lng +
  //     "," +
  //     startPoint.getLatLng().lat +
  //     ";" +
  //     endPoint.getLatLng().lng +
  //     "," +
  //     endPoint.getLatLng().lat +
  //     "?steps=true&geometries=geojson&access_token=" +
  //     accessToken

  // const url = `https://router.project-osrm.org/route/v1/driving/${
  //   +startPoint.getLatLng().lng +
  //   "," +
  //   startPoint.getLatLng().lat +
  //   ";" +
  //   endPoint.getLatLng().lng +
  //   "," +
  //   endPoint.getLatLng().lat
  // }?overview=false&alternatives=true&steps=true&hints=;`

  const coordinates = props.fromTo
    .map((o) => {
      const c = [o.lat, o.lng]
      L.marker(c, { icon: defIcon }).addTo(map)
      return c.reverse().join(",")
    })
    .join(";")

  const url = `https://router.project-osrm.org/route/v1/driving/${coordinates}?overview=false&alternatives=true&steps=true`

  // const url =
  //   "https://api.mapbox.com/directions/v5/mapbox/driving/" +
  //   coordinates +
  //   "?steps=true&geometries=geojson&access_token=" +
  //   accessToken

  fetch(url)
    .then((response) => response.json())
    .then(async (data) => {

      const coordinates = []
      data.routes[0].legs.map((leg) =>
        leg.steps.map((o) => coordinates.push(o.maneuver.location)),
      )
      const geometry = {
        coordinates,
        type: "LineString",
      }
      const route = L.geoJSON(geometry, {
        style: {
          color: "#FF5B1A",
        },
      })

      route.addTo(map)
      const bounds = route.getBounds()
      map.fitBounds(bounds)

      const points = await getRoutePoints(
        addIntermediatePoints(geometry.coordinates),
      )

      emit("data", {
        ...data,
        points,
      })

      addMaprkers(points)
    })
}

function addMaprkers(points) {
  points.forEach((point) => {
    const marker = L.marker([point.lat, point.lng], {
      icon: L.icon({ iconUrl: point.icon }),
    }).addTo(map)
  })
}
</script>



<style lang="scss">
.wrap-map-leaflet {
  position: relative;
  > div {
    min-height: 300px;
    width: 100%;
  }
  //   &:before {
  //     content: "";
  //     position: absolute;
  //     top: 0;
  //     bottom: 0;
  //     right: 0;
  //     left: 0;
  //     z-index: 100;
  //   }
}
</style>