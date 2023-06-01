<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Dropdown from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/Dropdown.vue";

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
                    <!-- Product Dropdown -->
                    <select name="product_id" id="product_id" v-model="form.product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Select a product</option>
                        <option v-for="(product, id) in data.products" :value="{ id }">{{ product }}</option>
                    </select>

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
