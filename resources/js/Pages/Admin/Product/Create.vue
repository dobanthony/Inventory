<template>
    <AdminLayout>
        <div class="container mt-4">
            <h2>Create Product</h2>
            <form @submit.prevent="submit">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input v-model="form.name" class="form-control" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea v-model="form.description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input v-model="form.price" type="number" class="form-control" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input v-model="form.quantity" type="number" class="form-control" required />
            </div>
            <button class="btn btn-success">Create</button>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  description: '',
  price: 0,
  quantity: 0,
})

function submit() {
  form.post(route('products.store'))
}
</script>
