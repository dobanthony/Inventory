<template>
    <AdminLayout>
        <div class="container mt-4">
            <h1 class="mb-4">Admin Dashboard</h1>

            <div class="card">
            <div class="card-body">
                <p>Welcome, {{ user.name }}!</p>
                <p class="mb-0">Manage shops, inventory, and view analytics here.</p>
            </div>
            </div>
        </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { usePage } from '@inertiajs/vue3'

const { props } = usePage()
const user = props.auth.user
</script>
