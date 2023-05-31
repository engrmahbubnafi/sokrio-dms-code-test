<script>
import {useForm} from "@inertiajs/vue3";

const addProductForm = useForm({
    product_name: '',
    product_details: '',
});

const submit = () => {
    addProductForm.post(route('products.store'));
};

export default {
    name: "AddProduct"
}
</script>

<template>
    <Head title="Add Product" />

    <AppLayout title="Add Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Product
            </h2>
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="product_name" value="product_name" />
                <TextInput
                    id="product_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="product_name"
                />
                <InputError class="mt-2" :message="addProductForm.errors.product_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="product_details" value="product_details" />
                <TextInput
                    id="product_details"
                    type="textarea"
                    class="mt-1 block w-full"
                    required
                    autocomplete="product_details"
                />
                <InputError class="mt-2" :message="addProductForm.errors.product_details" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': addProductForm.processing }" :disabled="addProductForm.processing">
                    Add
                </PrimaryButton>
            </div>
        </form>
    </AppLayout>
</template>

<style scoped>

</style>
