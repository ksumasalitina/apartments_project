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

require('./bootstrap');

Vue.use(Vuetify);

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

//Vue.component('home-component', require('./components/FindApartmentsComponent.vue').default);
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
            rate: null,
            stars: null
        }
    },

    mounted() {
        this.datePicker()
    },

    methods: {
        filter(){
            document.getElementById('price').value = this.price;
            document.getElementById('rate').value = this.rate;
            document.getElementById('stars').value = this.stars;
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
        showAddPhoto() {
            document.getElementById("div2").style.display = "block";
        },
        showRate(e) {
            this.rate = e.target.value;
            document.getElementById('rate-value').innerHTML = this.rate;
        },
        showComfort(e) {
            this.comfort = e.target.value;
            document.getElementById('comfort-value').innerHTML = this.comfort;
        },
        showClean(e) {
            this.clean = e.target.value;
            document.getElementById('clean-value').innerHTML = this.clean;
        },
        showStaff(e) {
            this.staff = e.target.value;
            document.getElementById('staff-value').innerHTML = this.staff;
        },
        showLocat(e) {
            this.locat = e.target.value;
            document.getElementById('locat-value').innerHTML = this.locat;
        },

        datePicker() {
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
