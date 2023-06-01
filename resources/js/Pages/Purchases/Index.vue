<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);

const columns = [
    { data: 'product_id', title: 'Product' },
    { data: 'price', title: 'Price' },
    { data: 'quantity', title: 'Quantity' }
];

const data = defineProps(['purchases']);
</script>

<template>
    <AppLayout title="Products List">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Purchases List
            </h2>
        </template>

        <DataTable :columns="columns" :data="data.purchases" class="display" width="100%">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
        </DataTable>
    </AppLayout>
</template>

<style>
@import 'datatables.net-dt';
</style>
