<template>
    <!--    <div> The Page with time {{ timer }}</div>-->
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">All Listings</Link>
                </div>
                <div class="text-xl text-center font-bold text-indigo-700 dark:text-indigo-300">
                    <Link :href="route('listing.index')">Larazillow</Link>
                </div>
                <div class="text-lg font-medium">
                    <Link :href="route('listing.create')"
                          class="main-button">+ New Listing
                    </Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess"
             class="mb-4 border rounded-md shadow-sm border-green-300 dark:border-green-800 bg-green-100 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>


<script setup>
import {computed, ref} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

// Help to understand how computed working
// const x = ref(0)
// const y = computed(() => x.value * 2)

// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(
    () => page.props.value.flash.success,
)

// import { ref } from 'vue';

// const  timer = ref(0)
// setInterval(() => timer.value++, 1000)
</script>
