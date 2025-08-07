<template>
  <Navbars>
    <div class="container py-5">
      <h1 class="mb-4 fw-bold">Getting Started</h1>

      <!-- Step 1: Create Account -->
      <section class="border rounded p-4 mb-4 step-card">
        <h4>1. Create an Account</h4>
        <p class="text-secondary">
          Register to access the Alcoba NHS School Management System. Whether you're a student, parent, teacher, or staff, creating an account gives you personalized access to school services and tools.
        </p>
        <router-link to="/register" class="btn btn-outline-primary btn-sm">Register Now</router-link>
      </section>

      <!-- Step 2: Explore Features -->
      <section class="border rounded p-4 mb-4 step-card">
        <h4>2. Explore System Features</h4>
        <p class="text-secondary">
          Navigate through dashboards to view announcements, grades, schedules, and more. Teachers can manage classes and input student performance. Students and parents can stay informed anytime.
        </p>
        <router-link to="/dashboard" class="btn btn-outline-secondary btn-sm">Go to Dashboard</router-link>
      </section>

      <!-- Step 3: Submit and View Records -->
      <section class="border rounded p-4 mb-4 step-card">
        <h4>3. Submit & View Academic Records</h4>
        <p class="text-secondary">
          Submit assignments, check grades, and track attendance. Parents can monitor their child's academic progress and upcoming school activities in real time.
        </p>
      </section>

      <!-- Step 4: Stay Updated -->
      <section class="border rounded p-4 mb-4 step-card">
        <h4>4. Stay Updated</h4>
        <p class="text-secondary">
          Receive notifications for school announcements, events, and important reminders via SMS or email.
        </p>
      </section>

      <!-- Step 5: Need Help? -->
      <section class="border rounded p-4 step-card">
        <h4>5. Need Help?</h4>
        <p class="text-secondary">
          For assistance, reach out to the school admin office or visit the <router-link to="/contact">Contact Page</router-link>. You may also email us at support@alcobahs.edu.ph.
        </p>
      </section>
    </div>
  </Navbars>
</template>

<script setup>
import Navbars from '../Layouts/Navbars.vue';
</script>

<style scoped>
.step-card {
  background-color: #f8f9fa; /* light gray */
  transition: 0.3s;
}
.step-card:hover {
  box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.05);
  background-color: #ffffff;
}
</style>
