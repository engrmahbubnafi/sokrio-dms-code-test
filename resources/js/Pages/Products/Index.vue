<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);

const columns = [
    { data: 'name', title: 'Name' },
    { data: 'price', title: 'Price' },
    { data: 'details', title: 'Details' }
];

const data = defineProps(['products']);
</script>

<template>
    <AppLayout title="Products List">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products List
            </h2>
        </template>

        <DataTable :columns="columns" :data="data.products" class="display" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Details</th>
                </tr>
            </thead>
        </DataTable>
    </AppLayout>
</template>

<style>
@import 'datatables.net-dt';
</style>
