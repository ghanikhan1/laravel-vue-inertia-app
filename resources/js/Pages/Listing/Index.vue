<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings" :key="listing.id" :listing="listing"/>
    </div>
</template>

<script setup>
import {Inertia} from "@inertiajs/inertia";
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";

defineProps({
    listings: Array,
})

const deleteListing = (id) => {
    if (confirm("Are you sure you want to delete this listing?")) {
        Inertia.delete(`/listing/${id}`);
    }
};
</script>
