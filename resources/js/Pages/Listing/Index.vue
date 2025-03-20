<template>
    <div v-for="listing in listings" :key="listing.id">
        <div>
<!--            <Link :href="`/listing/${listing.id}`">-->
            <Link :href="route('listing.show', listing.id)">
                <ListingAddress :listing="listing" />
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
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import {Link} from "@inertiajs/inertia-vue3";
import ListingAddress from "../../components/ListingAddress.vue";

defineProps({
    listings: Array,
})

const deleteListing = (id) => {
    if (confirm("Are you sure you want to delete this listing?")) {
        Inertia.delete(`/listing/${id}`);
    }
};
</script>
