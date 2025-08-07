<template>
  <div class="container mt-4">
    <h1 class="mb-4">➕ Add Product – {{ shop.name }}</h1>

    <form @submit.prevent="submit">
      <div class="mb-3">
        <label>Name</label>
        <input v-model="form.name" type="text" class="form-control" />
      </div>
      <div class="mb-3">
        <label>Description</label>
        <textarea v-model="form.description" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label>Price</label>
        <input v-model="form.price" type="number" class="form-control" step="0.01" />
      </div>
      <div class="mb-3">
        <label>Stock Quantity</label>
        <input v-model="form.stock_quantity" type="number" class="form-control" />
      </div>
      <div class="mb-3">
        <label>Unit</label>
        <input v-model="form.unit" type="text" class="form-control" />
      </div>

      <button class="btn btn-success" type="submit">✅ Save Product</button>
      <Link :href="`/admin/shops/${shop.id}/inventory`" class="btn btn-secondary ms-2">← Cancel</Link>
    </form>
  </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({ shop: Object })

const form = useForm({
  name: '',
  description: '',
  price: '',
  stock_quantity: '',
  unit: 'pcs'
})

function submit() {
  form.post(`/admin/shops/${props.shop.id}/products`)
}
</script>
