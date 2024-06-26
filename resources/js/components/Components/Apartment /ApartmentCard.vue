<script setup>
defineProps({apartment: Object})
</script>

<template>
    <div class="p-3 border border-solid border-black rounded-2xl flex" style="width: 900px">
        <div>
            <img :src="apartment.image" width="250" height="200" class="rounded-2xl"
                 alt="Hotel photo"/>
        </div>
        <div class="p-4 w-9/12">
            <div class="flex justify-between">
                <div>
                    <p class="text-2xl font-semibold text-gray-700">{{ apartment.name }}</p>
                </div>
                <div>
                    <button class="font-sans font-bold uppercase text-red-500 transition-all hover:opacity-75 focus:ring focus:ring-pink-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50">
                        <i class="bi bi-heart text-xl"></i>
                    </button>
                </div>

            </div>

            <div class="flex justify-between">
                <div>
                    <i v-for="star in Array.from({length: apartment.stars}, (_, index) => index + 1)" class="bi bi-star-fill text-red-300"></i>
                </div>

                <div class="mt-2 flex gap-2 items-center">
                    <p class="pr-1 font-light text-sm">152 оцінки</p>
                    <p class="text-lg font-semibold bg-red-300 rounded pr-3 pl-3 text-center">{{ apartment.rate }}.0</p>

                </div>
            </div>

            <div class="flex justify-between">
                <div class="text-sm">
                    <p>Локація: <span class="text-red-700 font-bold">{{ apartment.location_rate }}.0</span></p>
                    <p>Чистота: <span class="text-red-700 font-bold">{{ apartment.clean_rate }}.0</span></p>
                    <p>Обслуговування: <span class="text-red-700 font-bold">{{ apartment.service_rate }}.0</span></p>
                    <p>Комфорт: <span class="text-red-700 font-bold">{{ apartment.comfort_rate }}.0</span></p>
                </div>

                <div class="self-end">
                    <div class="in-block">
                        <button class="rounded-lg border border-dotted border-red-400 py-3 px-6 font-sans text-xs font-bold uppercase shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Переглянути</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
