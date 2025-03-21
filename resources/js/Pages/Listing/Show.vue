<template>
    <div>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
    </div>
</template>

<script setup>
import ListingAddress from "@/components/ListingAddress.vue";
import Price from "../../components/Price.vue";
import ListingSpace from "../../components/ListingSpace.vue";

defineProps({
    listing: Object,
});
</script>
