<script setup>
import { useForm } from '@inertiajs/vue3';

const { product, errors } = defineProps({
    product: Object,
    errors: Object,
});

const form = useForm({
    name: product.name,
    description: product.description,
    price: product.price,
    quantity: product.quantity
});

function updateProduct() {
    form.put(route('admin.products.update', product.id));
}
</script>

<template>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Product</h5>
            </div>
            <div class="card-body">
                <form @submit.prevent="updateProduct" class="needs-validation">

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Product Name</label>
                        <input
                            v-model="form.name"
                            type="text"
                            class="form-control"
                            placeholder="Enter product name"
                        >
                        <div v-if="errors.name" class="text-danger small mt-1">{{ errors.name }}</div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea
                            v-model="form.description"
                            class="form-control"
                            rows="3"
                            placeholder="Enter product description"
                        ></textarea>
                        <div v-if="errors.description" class="text-danger small mt-1">{{ errors.description }}</div>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Price</label>
                        <input
                            v-model="form.price"
                            type="number"
                            step="0.01"
                            class="form-control"
                            placeholder="Enter price"
                        >
                        <div v-if="errors.price" class="text-danger small mt-1">{{ errors.price }}</div>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <input
                            v-model="form.quantity"
                            type="number"
                            class="form-control"
                            placeholder="Enter quantity"
                        >
                        <div v-if="errors.quantity" class="text-danger small mt-1">{{ errors.quantity }}</div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button
                            type="submit"
                            class="btn btn-success px-4"
                            :disabled="form.processing"
                        >
                            <span v-if="form.processing" class="spinner-border spinner-border-sm me-2"></span>
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
