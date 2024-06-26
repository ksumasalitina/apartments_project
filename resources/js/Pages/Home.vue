<script setup>
import Header from "../components/Layout/Header.vue";
import SearchForm from "../components/Components/Home/SearchForm.vue";
import ApartmentCard from "../components/Components/Apartment /ApartmentCard.vue";
import {Link, router} from "@inertiajs/vue3";

defineProps({
    cities: Object,
    apartments: Object,
    currentCityId: Number
})
</script>

<template>
    <div>
        <Header></Header>
        <SearchForm :cities="cities"></SearchForm>

        <div class="mt-10 mb-7 ml-10">
            <p class="font-semibold text-3xl">Найкращі пропозиції для вас!</p>
        </div>

        <div class="flex gap-40">
            <div class="flex flex-col gap-2 ml-10">
                <Link
                    :href="'/?city=' + city.id"
                    v-for="city in cities"
                    as="button"
                    :class="{'bg-red-400/10': city.id === currentCityId}"
                    class="middle none center rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase text-red-900 transition-all hover:bg-red-400/10 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                >
                    {{ city.name }}
                </Link>
            </div>
            <div class="flex flex-col gap-4">
                <ApartmentCard v-for="apartment in apartments" :apartment="apartment"></ApartmentCard>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
