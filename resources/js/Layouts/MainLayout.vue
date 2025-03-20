<template>
    <Link href="/listing">All Listings</Link>&nbsp;
    <Link href="/listing/create">Create New Listing</Link>
<!--    <div> The Page with time {{ timer }}</div>-->
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot>Default</slot>
</template>


<script setup>
import {computed, ref} from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";


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

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
