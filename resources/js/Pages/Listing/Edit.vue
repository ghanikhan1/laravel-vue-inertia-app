<template>
    <form @submit.prevent="update">
        <div>
            <div>
                <label>Beds</label>
                <input type="text" v-model.number="form.beds" @input="form.clearErrors('beds')"/>
                <div v-if="form.errors.beds">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div>
                <label>Baths</label>
                <input type="text" v-model.number="form.baths" @input="form.clearErrors('baths')"/>
                <div v-if="form.errors.baths">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div>
                <label>Area</label>
                <input type="text" v-model.number="form.area" @input="form.clearErrors('area')"/>
                <div v-if="form.errors.area">
                    {{ form.errors.area }}
                </div>
            </div>

            <div>
                <label>City</label>
                <input type="text" v-model="form.city" @input="form.clearErrors('city')"/>
                <div v-if="form.errors.city">
                    {{ form.errors.city }}
                </div>
            </div>

            <div>
                <label>Post Code</label>
                <input type="text" v-model="form.code" @input="form.clearErrors('code')"/>
                <div v-if="form.errors.code">
                    {{ form.errors.code }}
                </div>
            </div>

            <div>
                <label>Street</label>
                <input type="text" v-model="form.street" @input="form.clearErrors('street')"/>
                <div v-if="form.errors.street">
                    {{ form.errors.street }}
                </div>
            </div>

            <div>
                <label>Street Nr</label>
                <input type="text" v-model="form.street_nr" @input="form.clearErrors('street_nr')"/>
                <div v-if="form.errors.street_nr">
                    {{ form.errors.street_nr }}
                </div>
            </div>

            <div>
                <label>Price</label>
                <input type="text" v-model.number="form.price" @input="form.clearErrors('price')"/>
                <div v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>

            <div>
                <button type="submit">Edit</button>
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
