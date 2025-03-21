<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <div>
                <!--            <Link :href="`/listing/${listing.id}`">-->
                <Link :href="route('listing.show', listing.id)">
                    <Price :price="listing.price" class="text-2xl font-bold" />
                    <ListingSpace :listing="listing" class="text-lg" />
                    <ListingAddress :listing="listing" class="text-gray-500" />
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
                <!--            <Link :href="`/listing/${listing.id}/edit`">Edit</Link>-->
            </div>
            <div>
                <!--            <button @click="deleteListing(listing.id)">Delete</button>-->
                <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/inertia-vue3";
import ListingAddress from "../../components/ListingAddress.vue";
import Box from "../../UI/Box.vue";
import ListingSpace from "../../components/ListingSpace.vue";
import Price from "../../components/Price.vue";

defineProps({
    listings: Array,
})

const deleteListing = (id) => {
    if (confirm("Are you sure you want to delete this listing?")) {
        Inertia.delete(`/listing/${id}`);
    }
};
</script>
