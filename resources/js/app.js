import Vue from 'vue';
import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css';
import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import MapChange from "./components/MapChange";
import GmapVue from 'gmap-vue';
import * as frontendCredentials from './env/env';

require('./bootstrap');

Vue.use(Vuetify);
Vue.use(GmapVue, {
    load: {
        key: frontendCredentials.GOOGLE_MAP_KEY,
        libraries: 'places'
    }
});

Vue.component('google-map', require('./components/GoogleMap.vue').default);
Vue.component('map-change', require('./components/MapChange.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data() {
        return {
            filters: false,
            visibility: false,
            prev: 1,
            price: [1,1000],
            facilities: [],
            rate: null,
            add_room: null,
            stars: null,
            show_booking: false,
            booking_status: 'processing'
        }
    },

    mounted() {
        this.datePickerMain();
        this.datePickerChange();
        this.datePickerDOB();
    },

    methods: {
        filterPrice(){
            document.getElementById('price').value = this.price;
        },

        filterRate(){
            document.getElementById('rate').value = this.rate;
        },

        filterStars(){
            document.getElementById('stars').value = this.stars;
        },

        resetFilters() {
            document.getElementById('reset').value = true;
        },

        showReviewForm() {
            document.getElementById("div1").style.display = "block";
        },

        dropdown(id) {
            console.log('Im here');
            let elements = document.getElementsByClassName("test");
            for (let i = 0; i < elements.length; i++) {
                elements[i].style.display = "none";
            }
            let el = document.getElementsByClassName(id);
            for (let i = 0; i < el.length; i++) {
                el[i].style.display = "block";
            }
        },

        showAddAvatar() {
            document.getElementById('fileInput').click();
        },

        handleFileUpload(image) {
            let url = URL.createObjectURL(image);
            this.$refs.avatar.src = url;
            console.log(url);
        },

        addFacility(id) {
            console.log(id);
            this.facilities.push(id);
        },

        addRoom() {
            this.add_room = 1;
        },

        datePickerMain() {
            let dpMin, dpMax;

            dpMin = new AirDatepicker('#startDate', {
                minDate: new Date(),
                onSelect({date}) {
                    dpMax.update({
                        minDate: date.setDate(date.getDate() + 1)
                    })
                }
            })

            dpMax = new AirDatepicker('#endDate', {
                minDate: new Date(),
                onSelect({date}) {
                    dpMin.update({
                        maxDate: date
                    })
                }
            })
        },

        datePickerChange() {
            let dpMin, dpMax;

            dpMin = new AirDatepicker('#startDateChange', {
                minDate: new Date(),
                onSelect({date}) {
                    dpMax.update({
                        minDate: date.setDate(date.getDate() + 1)
                    })
                }
            })

            dpMax = new AirDatepicker('#endDateChange', {
                minDate: new Date(),
                onSelect({date}) {
                    dpMin.update({
                        maxDate: date
                    })
                }
            })
        },

        datePickerDOB(){
            new AirDatepicker('#dob');
        }
    },
});
