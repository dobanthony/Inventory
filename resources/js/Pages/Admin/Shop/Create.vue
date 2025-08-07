<template>
    <AdminLayout>
        <div class="container mt-4">
            <h2>Create Shop</h2>
            <form @submit.prevent="submit">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input v-model="form.name" type="text" class="form-control" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input v-model="form.address" type="text" class="form-control" />
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  address: '',
})

function submit() {
  form.post(route('shops.store'))
}
</script>
