<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";

const form = useForm(
    {
        'product_id': '',
        'price': '',
        'quantity': ''
    }
)
function submit(){
    form.post(route('purchases.store'));
}

const data = defineProps({ products: Object });
let stock = 0;

function showStock(productId) {
    axios.post(route('ajax.showStock', { product_id: productId }))
        .then((res) => {
            stock = res.data[0].quantity;
        })

    return stock;
}
</script>

<template>
    <AppLayout title="Add Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Purchase
            </h2>
        </template>

        <div class="grid h-screen place-items-center">
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" @submit.prevent="submit">

                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Add product</h5>
                    Product ID: {{ form.product_id }}
                    <!-- Product Dropdown -->
                    <select name="product_id" id="product_id" v-model="form.product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" @change="showStock(form.product_id)">
                        <option value="">Select a product</option>
                        <option v-for="(product, id) in data.products" :value="id">{{ product }}</option>
                    </select>

                    <!-- Product stock readonly -->
                    <div v-show="form.product_id">
                        <InputLabel for="stock" value="Product Stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <input type="number" id="stock" :value="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required readonly />
                        <InputError class="mt-2" :message="form.errors.price" />
                    </div>

                    <!-- Product price input -->
                    <div>
                        <InputLabel for="price" value="Product Price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <input type="number" id="price" name="price" v-model="form.price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required placeholder="Product Price" />
                        <InputError class="mt-2" :message="form.errors.price" />
                    </div>

                    <!-- Product quantity input -->
                    <div>
                        <InputLabel for="quantity" value="Product Quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <input type="number" id="quantity" name="quantity" v-model="form.quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required placeholder="Product Quantity" />
                        <InputError class="mt-2" :message="form.errors.quantity" />
                    </div>

                    <div class="flex items-center justify-start mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Add
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
