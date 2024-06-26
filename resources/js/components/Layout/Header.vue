<script setup>

import {CheckIcon, LinkIcon, PencilIcon} from "@heroicons/vue/20/solid";
</script>

<template>
    <div class="lg:flex lg:items-center lg:justify-between py-3 px-3 shadow-lg bg-stone-100 mb-10">
        <div class="min-w-0 flex-1">
            <img src="../../../../public/img/logo.png" width="250px" alt="logo">
        </div>
        <div class="mt-5 flex lg:ml-4 lg:mt-0 mr-5">

            <span class="ml-3 hidden sm:block">
        <button type="button"
                class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          Реєстрація
        </button>
      </span>

            <span class="sm:ml-3">
        <button type="button"
                class="inline-flex items-center rounded-md bg-red-600/70 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Вхід
        </button>
      </span>
        </div>
    </div>
</template>

<style scoped>

</style>
