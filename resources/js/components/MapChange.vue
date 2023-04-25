<template>
<div>
    <v-row justify="space-between">
        <v-col><v-text-field label="Latitude" v-model="latitude" name="latitude" required></v-text-field></v-col>
        <v-col><v-text-field label="Longitude" v-model="longitude" name="longitude" required></v-text-field></v-col>
    </v-row>
    <GmapMap
        :center='center'
        :zoom='12'
        style='width:100%;  height: 400px;'
    >
        <GmapMarker
            :position='center'
            :draggable="true"
            @dragend="updateCoordinates"
        />
    </GmapMap>
</div>
</template>

<script>
export default {
    name: "MapChange",
    data(){
        return {
            latitude: "",
            longitude: "",
            center: {lat:0, lng:0},
        }
    },

    mounted() {
        this.geolocate()
    },

    methods: {
        geolocate(){
            navigator.geolocation.getCurrentPosition(position => {
                this.center = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
            });
        },

        updateCoordinates(position){
            console.log(position);
            this.center = {
                lat: position.latLng.lat(),
                lng: position.latLng.lng(),
            };
            this.latitude = position.latLng.lat();
            this.longitude = position.latLng.lng();
        }
    }
}
</script>

<style scoped>

</style>
