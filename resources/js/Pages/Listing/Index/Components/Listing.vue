<template>

    <Box >
        <div>
            <!--            <Link :href="`/listing/${listing.id}`">-->
            <Link :href="route('listing.show', listing.id)">
                <div class="flex items-center gap-1">
                    <Price :price="listing.price" class="text-2xl font-bold"/>
                    <div class="text-sm text-gray-500">
                        <Price :price="monthlyPayment"/>
                        pm
                    </div>
                </div>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
            <!--            <Link :href="`/listing/${listing.id}/edit`">Edit</Link>-->
        </div>
    </Box>
</template>

<script setup>
import Box from "../../../../UI/Box.vue";
import Price from "../../../../components/Price.vue";
import ListingSpace from "../../../../components/ListingSpace.vue";
import ListingAddress from "../../../../components/ListingAddress.vue";
import {Link} from "@inertiajs/inertia-vue3";
import {useMonthlyPayment} from "../../../../Composables/useMonthlyPayment.js";


const props = defineProps({listing: Object})
const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25,)

</script>
