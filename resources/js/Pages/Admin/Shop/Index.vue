<template>
    <AdminLayout>
    <div class="container mt-4">
        <h2>Shop Details</h2>
        <div v-if="shop">
            <p><strong>Name:</strong> {{ shop.name }}</p>
            <p><strong>Address:</strong> {{ shop.address }}</p>
            <Link class="btn btn-primary" :href="route('shops.edit', shop.id)">Edit</Link>
            <form :action="route('shops.destroy', shop.id)" method="POST" class="d-inline-block" @submit.prevent="deleteShop">
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger ms-2">Delete</button>
            </form>
        </div>
        <div v-else>
            <Link class="btn btn-success" :href="route('shops.create')">Create Shop</Link>
        </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { router, useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
defineProps({ shop: Object })

function deleteShop() {
  if (confirm('Are you sure you want to delete this shop?')) {
    router.delete(route('shops.destroy', shop.id))
  }
}
</script>
