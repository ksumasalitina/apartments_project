<script setup>
import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import { onMounted } from 'vue'

defineProps({cities: Object})

function datePickerMain() {
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

function datePickerChange() {
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
}

onMounted(() => {
    datePickerMain();
    datePickerChange();
})

</script>

<template>
    <div class="flex justify-center">
        <div class="border border-dotted shadow-lg border-neutral-700 p-3 rounded-xl">
            <p class="text-xl p-2 font-semibold text-red-900">Знайдіть житло для вашої подорожі!</p>

            <div>
                <form class="col-md-15 text-center mt-5 flex justify-center" method="GET"
                      action="#">
                    <select
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 m-2"
                        name="city">
                        <option disabled selected>Куди їдемо</option>
                        <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                    </select>
                    <input type="text" placeholder="З"
                           class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 m-2"
                           name="startDate"
                           id="startDate">
                    <input type="text" placeholder="По"
                           class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 m-2"
                           name="endDate"
                           id="endDate">
                    <select
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 m-2"
                        name="people">
                        <option selected disabled>Кількість гостей</option>
                        <option v-for="value in Array.from({length: 10}, (_, index) => index + 1)" :value="value">{{ value }}</option>
                    </select>
                    <button type="submit" class="m-3 rounded-lg bg-red-400 hover:bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Пошук
                    </button>
                </form>
            </div>
            <!--                <v-card-text>-->
            <!--                    <span class="alert-danger">-->
            <!--                        @error('city')-->
            <!--                            <p class="text-danger center-text">{{$message}}</p>-->
            <!--                        @enderror-->
            <!--                        @error('startDate')-->
            <!--                            <p class="text-danger center-text">{{$message}}</p>-->
            <!--                        @enderror-->
            <!--                        @error('endDate')-->
            <!--                            <p class="text-danger center-text">{{$message}}</p>-->
            <!--                        @enderror-->
            <!--                        @error('people')-->
            <!--                            <p class="text-danger center-text">{{$message}}</p>-->
            <!--                        @enderror-->
            <!--                    </span>-->
            <!--                </v-card-text>-->
        </div>
    </div>

</template>

<style scoped>

</style>
