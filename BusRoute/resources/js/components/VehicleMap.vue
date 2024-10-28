<template>
    <div>
      <div id="map"></div>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    data() {
      return {
        map: null,
        vehicleMarker: null,
      };
    },
    mounted() {
      this.initMap();
      this.loadRouteData();
      this.listenForUpdates();
    },
    methods: {
      initMap() {
        this.map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 0, lng: 0 },
          zoom: 14,
        });
      },
      loadRouteData() {
        axios.get("/api/routes").then((response) => {
          const route = response.data[0];
          route.stops.forEach((stop) => {
            new google.maps.Marker({
              position: { lat: stop.latitude, lng: stop.longitude },
              map: this.map,
            });
          });
        });
      },
      listenForUpdates() {
        Echo.channel("vehicle.positions").listen("VehiclePositionUpdated", (event) => {
          const position = event.position;
          if (this.vehicleMarker) {
            this.vehicleMarker.setPosition({ lat: position.latitude, lng: position.longitude });
          } else {
            this.vehicleMarker = new google.maps.Marker({
              position: { lat: position.latitude, lng: position.longitude },
              map: this.map,
            });
          }
        });
      },
    },
  };
  </script>

  <style>
  #map {
    width: 100%;
    height: 500px;
  }
  </style>
