<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="name" class="label">Your Name</label>
                <input id="name" type="text" class="input" v-model="form.name">
                <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">E-mail</label>
                <input id="email" type="text" class="input" v-model="form.email">
                <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input id="password" type="password" class="input" v-model="form.password">
                <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input id="password_confirmation" type="password" class="input" v-model="form.password_confirmation">
            </div>
            <div class="mt-4">
                <button class="main-button w-full" type="submit">
                    Create account
                </button>

                <div class="mt-2 text-center">
                    <Link :href="route('login')"
                          class="text-sm text-gray-500"
                    >
                        Already have an account? Click here
                    </Link>
                </div>

            </div>
        </div>
    </form>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const register = () => form.post(route('user-account.store'))
</script>
