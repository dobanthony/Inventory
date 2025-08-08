<template>
    <AdminLayout>
        <h2>Buy Product</h2>
        <p><strong>{{ product.name }}</strong></p>
        <p>Available Stock: {{ product.stock }}</p>
        <p>Price: ₱{{ product.price }}</p>

        <form @submit.prevent="submit">
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" v-model="form.quantity" class="form-control" min="1" required>
                <div v-if="form.errors.quantity" class="text-danger">{{ form.errors.quantity }}</div>
            </div>

            <button type="submit" class="btn btn-success">Confirm Purchase</button>
        </form>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const props = defineProps({
    product: Object
})

const form = useForm({
    quantity: 1
})

function submit() {
    form.post(route('admin.products.buy.store', props.product.id))
}
</script>
