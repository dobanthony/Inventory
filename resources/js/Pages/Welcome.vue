<template>
  <Navbars>
    <div>
      <!-- Hero Section -->
      <section class="bg-light text-center py-5 border-bottom">
        <div class="container">
          <h1 class="display-5 fw-bold text-dark">Welcome to <span class="text-success">Alcoba NHS</span></h1>
          <p class="lead text-muted">
            Empowering students, supporting educators, and delivering a smarter school management experience.
          </p>
          <Link href="/getStarted" class="btn btn-dark btn-lg mt-3">
            Get Started
          </Link>
        </div>
      </section>

      <!-- Features Section with Hover -->
      <section class="py-5 bg-white">
        <div class="container">
          <h2 class="h3 fw-semibold text-dark text-center mb-4">Why Choose Our Management System?</h2>
          <div class="row text-center">
            <div class="col-md-4 mb-4 feature-card">
              <i class="bi bi-speedometer2 display-4 text-dark"></i>
              <h5 class="fw-bold mt-3 text-dark">Efficient Operations</h5>
              <p class="text-muted">
                Streamline daily administrative tasks and enhance productivity across departments.
              </p>
            </div>
            <div class="col-md-4 mb-4 feature-card">
              <i class="bi bi-shield-lock display-4 text-dark"></i>
              <h5 class="fw-bold mt-3 text-dark">Secure & Reliable</h5>
              <p class="text-muted">
                Keep student and school data protected with secure access and encrypted systems.
              </p>
            </div>
            <div class="col-md-4 mb-4 feature-card">
              <i class="bi bi-people display-4 text-dark"></i>
              <h5 class="fw-bold mt-3 text-dark">Student-Centered</h5>
              <p class="text-muted">
                Foster better communication and performance tracking between teachers, students, and parents.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action -->
      <section class="py-5 bg-dark text-white text-center">
        <div class="container">
          <h2 class="h3 fw-bold">Transform Your School Today</h2>
          <p class="lead mb-4">Experience the future of school management with Alcoba NHS.</p>
          <Link href="/register" class="btn btn-outline-light btn-lg">
            Get Started
          </Link>
        </div>
      </section>
    </div>
  </Navbars>
</template>

<script setup>
import Navbars from '@/Layouts/Navbars.vue';
import { Link } from '@inertiajs/vue3'
</script>

<style scoped>
.feature-card {
  transition: all 0.3s ease;
  padding: 24px;
  border-radius: 12px;
}

.feature-card:hover {
  background-color: #f8f9fa; /* light gray */
  transform: translateY(-6px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}
</style>
