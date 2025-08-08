<template>
    <AdminLayout>
        <h2>Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Purchased At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.product.name }}</td>
                    <td>{{ order.quantity }}</td>
                    <td>₱{{ order.price }}</td>
                    <td>₱{{ order.total }}</td>
                    <td>{{ new Date(order.created_at).toLocaleString() }}</td>
                </tr>
            </tbody>
        </table>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'

defineProps({
    orders: Array
})
</script>
