<template>
    <AdminLayout>
        <div class="container mt-4">
            <h2>Product Details</h2>
            <p><strong>Name:</strong> {{ product.name }}</p>
            <p><strong>Description:</strong> {{ product.description }}</p>
            <p><strong>Price:</strong> ₱{{ product.price }}</p>
            <p><strong>Quantity:</strong> {{ product.quantity }}</p>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ product: Object })
</script>
