<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm(
    {
        'name': '',
        'details': ''
    }
)
function submit(){
    form.post(route('products.store'));
}
</script>

<template>
    <AppLayout title="Add Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Product
            </h2>
        </template>

        <div class="grid h-screen place-items-center">
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" @submit.prevent="submit">
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Add product</h5>
                    <div>
                        <InputLabel for="name" value="Product Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <TextInput id="name" v-model="form.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="name" placeholder="Product Name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div>
                        <InputLabel for="details" value="Product Details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <TextInput id="details" v-model="form.details" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required autocomplete="details" placeholder="Product Details" />
                         <InputError class="mt-2" :message="form.errors.details" />
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
