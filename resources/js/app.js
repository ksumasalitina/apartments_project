/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
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

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('aparts-component', require('./components/ShowAparts.vue').default);
//Vue.component('find-form', require('./components/FindForm').default);

Vue.component('google-map', require('./components/GoogleMap.vue').default);
Vue.component('map-change', require('./components/MapChange.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

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


/*
import './bootstrap';
import '../css/app.css';
import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';

let visibility = false;
let prev = 1;
let rate = 0;
let comfort = 0;
let clean = 0;
let staff = 0;
let locat = 0

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







function showReviewForm(){
    document.getElementById("div1").style.display = "block";
}


let chooseCity = document.getElementsByClassName('chooseCity');
for(let i=0; i < chooseCity.length; i++){
    chooseCity[i].addEventListener('click', function (event){

        let elements = document.getElementsByClassName("test");
        for(let i=0; i<elements.length; i++){
            elements[i].style.display = "none";
        }
        let el = document.getElementsByClassName(chooseCity[i].value);
        for(let i=0; i<el.length;i++){
            el[i].style.display = "block";
        }

    });
}




function showAddPhoto() {
    document.getElementById("div2").style.display = "block";
}

function showRate(e){
    rate = e.target.value;
    document.getElementById('rate-value').innerHTML = rate;
}

function showComfort(e){
    comfort = e.target.value;
    document.getElementById('comfort-value').innerHTML = comfort;
}

function showClean(e){
    clean = e.target.value;
    document.getElementById('clean-value').innerHTML = clean;
}

function showStaff(e){
    staff = e.target.value;
    document.getElementById('staff-value').innerHTML = staff;
}

function showLocat(e){
    locat = e.target.value;
    document.getElementById('locat-value').innerHTML = locat;
}
*/
