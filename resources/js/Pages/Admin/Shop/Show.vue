<template>
  <div class="container mt-4">
    <h1 class="mb-4">{{ shop.name }} – Management</h1>

    <p><strong>Type:</strong> {{ capitalize(shop.type) }}</p>
    <p><strong>Description:</strong> {{ shop.description || 'No description provided.' }}</p>

    <hr />

    <h3>Shop Modules</h3>
    <ul class="list-group">
        <li class="list-group-item">
            <Link :href="`/admin/shops/${shop.id}/inventory`">🗃 Manage Products / Inventory</Link>
        </li>
        <li class="list-group-item">
            <Link :href="`/admin/shops/${shop.id}/orders`">🛒 Create Sales Order</Link>
        </li>
        <li class="list-group-item">
            <Link :href="`/admin/shops/${shop.id}/reports`">📊 Sales & Stock Reports</Link>
        </li>
    </ul>

    <div class="mt-4">
      <Link href="/admin/shops" class="btn btn-secondary">← Back to Shops</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  shop: Object
})

function capitalize(value) {
  return value.charAt(0).toUpperCase() + value.slice(1)
}
</script>
