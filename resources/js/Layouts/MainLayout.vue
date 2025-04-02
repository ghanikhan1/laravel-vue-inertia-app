<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">All Listings</Link>
                </div>
                <div class="text-xl text-center font-bold text-indigo-700 dark:text-indigo-300">
                    <Link :href="route('listing.index')">Larazillow</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <Link class="text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
                    <Link :href="route('listing.create')"
                          class="main-button">+ New Listing
                    </Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign-In</Link>
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

// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(
    () => page.props.value.flash.success,
)

const user = computed(
    () => page.props.value.user,
)
</script>
