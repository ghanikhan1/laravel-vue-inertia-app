<template>
    <form @submit.prevent="update">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input class="input" type="text" v-model.number="form.beds" @input="form.clearErrors('beds')"/>
                <div v-if="form.errors.beds" class="input-error">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" type="text" v-model.number="form.baths" @input="form.clearErrors('baths')"/>
                <div v-if="form.errors.baths" class="input-error">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input" type="text" v-model.number="form.area" @input="form.clearErrors('area')"/>
                <div v-if="form.errors.area" class="input-error">
                    {{ form.errors.area }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">City</label>
                <input class="input" type="text" v-model="form.city" @input="form.clearErrors('city')"/>
                <div v-if="form.errors.city" class="input-error">
                    {{ form.errors.city }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label">Post Code</label>
                <input class="input" type="text" v-model="form.code" @input="form.clearErrors('code')"/>
                <div v-if="form.errors.code" class="input-error">
                    {{ form.errors.code }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Street</label>
                <input class="input" type="text" v-model="form.street" @input="form.clearErrors('street')"/>
                <div v-if="form.errors.street" class="input-error">
                    {{ form.errors.street }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label">Street Nr</label>
                <input class="input" type="text" v-model="form.street_nr" @input="form.clearErrors('street_nr')"/>
                <div v-if="form.errors.street_nr" class="input-error">
                    {{ form.errors.street_nr }}
                </div>
            </div>

            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input" type="text" v-model.number="form.price" @input="form.clearErrors('price')"/>
                <div v-if="form.errors.price" class="input-error">
                    {{ form.errors.price }}
                </div>
            </div>

            <div>
                <button class="main-button" type="submit">Edit</button>
            </div>
        </div>
    </form>
</template>

<script setup>

import {useForm} from "@inertiajs/inertia-vue3";
import {defineProps} from "vue";

const props = defineProps({
   listing: Object
});

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    code: props.listing.code,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
})

const update = () => {
    form.put(route('listing.update', {listing: props.listing.id}));
    // form.put(`/listing/${props.listing.id}`);
};

</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
