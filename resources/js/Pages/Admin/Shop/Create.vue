<template>
    <AdminLayout>
        <div class="container mt-4">
            <h1 class="mb-4">Create New Shop</h1>

            <form @submit.prevent="submit" class="card p-4 shadow-sm">
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Shop Name</label>
                <input
                type="text"
                id="name"
                v-model="form.name"
                class="form-control"
                :class="{ 'is-invalid': form.errors.name }"
                />
                <div class="invalid-feedback" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>

            <!-- Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Shop Type</label>
                <select
                id="type"
                v-model="form.type"
                class="form-select"
                :class="{ 'is-invalid': form.errors.type }"
                >
                <option value="" disabled>Select type</option>
                <option value="grocery">Grocery</option>
                <option value="farm">Farm</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                </select>
                <div class="invalid-feedback" v-if="form.errors.type">{{ form.errors.type }}</div>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                id="description"
                v-model="form.description"
                class="form-control"
                rows="4"
                :class="{ 'is-invalid': form.errors.description }"
                ></textarea>
                <div class="invalid-feedback" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>

            <!-- Submit -->
            <div class="d-flex justify-content-between">
                <Link href="/admin/shops" class="btn btn-secondary">Cancel</Link>
                <button type="submit" class="btn btn-success">Create Shop</button>
            </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
  name: '',
  type: '',
  description: ''
})

function submit() {
  form.post('/admin/shops')
}
</script>
