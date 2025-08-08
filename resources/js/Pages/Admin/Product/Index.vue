<template>
    <AdminLayout>
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Products</h2>
                <Link class="btn btn-success" :href="route('products.create')">Add Product</Link>
            </div>

            <input v-model="search" @input="searchProducts" class="form-control mb-3" placeholder="Search products..." />

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products.data" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.quantity }}</td>
                    <td>₱{{ product.price }}</td>
                    <td>
                        <Link class="btn btn-primary btn-sm" :href="route('products.edit', product.id)">Edit</Link>
                        <Link class="btn btn-info btn-sm ms-2" :href="route('products.show', product.id)">View</Link>
                        <button @click="deleteProduct(product.id)" class="btn btn-danger btn-sm ms-2">Delete</button>
                        <Link :href="route('products.buy', product.id)" class="btn btn-sm btn-success me-2">
                            Buy
                        </Link>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { router } from '@inertiajs/vue3'
import { Link, usePage } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

const props = defineProps({
  products: Object,
  search: String,
})

const search = ref(props.search || '')

function searchProducts() {
  router.get(route('products.index'), { search: search.value }, { preserveState: true })
}

function deleteProduct(id) {
  if (confirm('Delete this product?')) {
    router.delete(route('products.destroy', id))
  }
}
</script>
