<template>
    <Filters :filters="filters" />
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>

    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
    </div>

</template>

<script setup>
import {Inertia} from "@inertiajs/inertia";
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Pagination from "../../UI/Pagination.vue";
import Filters from "@/Pages/Listing/Index/Components/Filters.vue";

defineProps({
    listings: Object,
    filters: Object
})

const deleteListing = (id) => {
    if (confirm("Are you sure you want to delete this listing?")) {
        Inertia.delete(`/listing/${id}`);
    }
};
</script>
