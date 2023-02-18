<template>
    <div>
        <v-dialog v-model="dialog" width="700">
            <template v-slot:activator="{ on, attrs }">
                <v-btn color="blue" text width="45%" v-bind="attrs" v-on="on">Показати на карті</v-btn>
            </template>
            <v-card>
                <GmapMap
                    :center='center'
                    :zoom='10'
                    style='width:100%; height: 400px;'>
                    <GmapMarker :position='center'/>
                </GmapMap>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    name: "GoogleMap",
    props: ['latitude', 'longitude'],
    data() {
        return {
            dialog: false,
            center: { lat: parseFloat(this.latitude), lng: parseFloat(this.longitude) }
        }
    }
}
</script>

<style scoped>

</style>
