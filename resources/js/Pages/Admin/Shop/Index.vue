<template>
  <div class="container mt-4">
    <h1 class="mb-4">My Shops</h1>

    <Link href="/admin/shops/create" class="btn btn-primary mb-3">+ Create New Shop</Link>

    <div v-if="shops.length === 0" class="alert alert-info">
      You don’t have any shops yet. Click “Create New Shop” to get started.
    </div>

    <div v-else class="row">
      <div v-for="shop in shops" :key="shop.id" class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">{{ shop.name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ capitalize(shop.type) }}</h6>
            <p class="card-text">{{ shop.description || 'No description provided.' }}</p>

            <div class="d-flex justify-content-between">
              <Link :href="`/admin/shops/${shop.id}/edit`" class="btn btn-sm btn-warning">
                Edit
              </Link>
              <button @click="deleteShop(shop.id)" class="btn btn-sm btn-danger">
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  shops: Array
})

function deleteShop(id) {
  if (confirm('Are you sure you want to delete this shop?')) {
    router.delete(`/admin/shops/${id}`)
  }
}

function capitalize(value) {
  return value.charAt(0).toUpperCase() + value.slice(1)
}
</script>
