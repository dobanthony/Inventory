<template>
  <Navbars>
    <div class="container py-5">

      <!-- Hero Section -->
      <div class="text-center mb-5">
        <h3 class="display-5 fw-bold text-dark">About Us</h3>
        <p class="lead text-muted">
          Empowering education through digital innovation, streamlined processes, and a commitment to student success.
        </p>
      </div>

      <!-- Who We Are -->
      <div class="card card-hover shadow-sm mb-4">
        <div class="card-body text-center">
          <h4 class="card-title fw-semibold text-dark mb-3">
            <i class="bi bi-people-fill me-2 text-primary"></i>Who We Are
          </h4>
          <p class="card-text text-muted fs-5">
            <strong class="text-success">Alcoba National High School</strong> is committed to delivering quality education supported by a smart and efficient school management system. Our platform empowers teachers, students, and parents to communicate, collaborate, and stay organized through accessible digital tools.
          </p>
        </div>
      </div>

      <!-- Mission -->
      <div class="card card-hover shadow-sm mb-4">
        <div class="card-body text-center">
          <h4 class="card-title fw-semibold text-dark mb-3">
            <i class="bi bi-bullseye me-2 text-success"></i>Our Mission
          </h4>
          <p class="card-text text-muted fs-5">
            To foster academic excellence and community engagement by integrating modern technology into school operations. We strive to support every learner’s growth through transparent systems and collaborative tools that enhance teaching and learning.
          </p>
        </div>
      </div>

      <!-- Our Story -->
      <div class="card card-hover shadow-sm mb-4">
        <div class="card-body text-center">
          <h4 class="card-title fw-semibold text-dark mb-3">
            <i class="bi bi-book-half me-2 text-warning"></i>Our Story
          </h4>
          <p class="card-text text-muted fs-5">
            Alcoba NHS began its digital transformation in response to the growing need for accessible education technology. From manual paper-based processes, we evolved into a tech-powered institution using centralized systems to simplify academic workflows and support all school stakeholders.
          </p>
        </div>
      </div>

      <!-- Why Choose Us -->
      <div class="card card-hover shadow-sm mb-4">
        <div class="card-body">
          <h4 class="card-title fw-semibold text-dark mb-4 text-center">
            <i class="bi bi-hand-thumbs-up me-2 text-danger"></i>Why Choose Alcoba NHS System?
          </h4>
          <div class="row text-muted fs-5">
            <div class="col-md-6 mb-3">
              <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Centralized student information and grading</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Accessible dashboards for students and teachers</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Efficient class and subject management</li>
              </ul>
            </div>
            <div class="col-md-6 mb-3">
              <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Real-time announcements and updates</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Parent involvement through progress monitoring</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Data security and user-friendly design</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="card card-hover shadow-sm mb-4">
        <div class="card-body text-center">
          <h4 class="card-title fw-semibold text-dark mb-3">
            <i class="bi bi-envelope-at-fill me-2 text-info"></i>Get in Touch
          </h4>
          <p class="text-muted fs-5 mb-1">
            📍 <strong>Campus:</strong> Alcoba National High School, Alcoba, Philippines
          </p>
          <p class="text-muted fs-5 mb-1">
            📞 <strong>Phone:</strong> +63 987 654 3210
          </p>
          <p class="text-muted fs-5">
            📧 <strong>Email:</strong> info@alcobahs.edu.ph
          </p>
        </div>
      </div>

    </div>
  </Navbars>
</template>

<script setup>
import Navbars from '../Layouts/Navbars.vue';
</script>

<style scoped>
.card-hover {
  transition: all 0.3s ease;
  padding: 24px;
  border-radius: 12px;
  background-color: #f8f9fa;
}
.card-hover:hover {
  transform: translateY(-6px);
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
}
</style>
