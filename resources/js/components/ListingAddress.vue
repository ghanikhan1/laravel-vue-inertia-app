<template>
    <div>
        {{ listing.street }},
        {{ listing.street_nr }},
        for ${{ listing.price }},
        {{ listing.city }}
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>
