<template>
        <div>
            <h1>Index</h1>
            <Link href="/show">Show Page</Link>
        </div>
        <div>
            The Message is {{ message}}
        </div>
  </template>

<script setup>
import { Link} from "@inertiajs/inertia-vue3";
defineProps({
    message: String
})
</script>

