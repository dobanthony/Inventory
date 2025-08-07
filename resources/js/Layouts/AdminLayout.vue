<template>
  <div>
    <!-- Sidebar -->
    <nav id="sidebar" class="p-3 text-white" :class="{ show: sidebarOpen }">
      <form class="mb-3">
        <input type="text" class="form-control form-control-sm" placeholder="Search..." />
      </form>
        <ul class="nav flex-column mb-3">
            <li class="nav-item">
                <Link href="/dashboard" class="nav-link text-white text-decoration-none">Dashboard</Link>
            </li>
            <li class="nav-item">
            <Link class="nav-link" :href="route('shops.index')">Shop</Link>
            </li>

            <!-- Create Shop -->
            <li class="nav-item">
            <Link class="nav-link" :href="route('shops.create')">Add Shop</Link>
            </li>
        </ul>
      <hr class="bg-secondary" />
    </nav>

    <!-- Desktop Toggle Buttons -->
    <button
      id="hideSidebarBtn"
      v-show="!isMobile && sidebarOpen"
      @click="closeSidebar"
      title="Hide Sidebar"
    >
      &#8592;
    </button>

    <button
      id="showSidebarBtn"
      v-show="!isMobile && !sidebarOpen"
      @click="openSidebar"
      title="Show Sidebar"
    >
      &#8594;
    </button>

    <!-- Topbar -->
    <nav id="topbar" class="d-flex justify-content-between align-items-center px-3 shadow-sm">
      <div class="d-flex align-items-center gap-3">
        <button id="toggleArrow" class="btn p-1" @click="openSidebar">&#9776;</button>
        <span class="logo">🌐 MyCompany</span>
      </div>

      <div class="dropdown">
        <a
          href="#"
          class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
          data-bs-toggle="dropdown"
        >
          <img src="https://via.placeholder.com/32" alt="avatar" class="avatar me-2" />
          <span>{{ $page.props.auth?.user?.name ?? 'Guest' }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><Link class="dropdown-item" href="/profile">Profile</Link></li>
          <li><Link class="dropdown-item" href="/settings">Settings</Link></li>
          <li><hr class="dropdown-divider" /></li>
          <li>
            <Link class="dropdown-item" href="/logout" method="post" as="button">Sign out</Link>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Overlay -->
    <div id="overlay" :class="{ show: isMobile && sidebarOpen }" @click="closeSidebar"></div>

    <!-- Main Content -->
    <main id="content" :class="{ shifted: sidebarOpen && !isMobile }">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const sidebarOpen = ref(false)
const isMobile = ref(false)

const openSidebar = () => {
  sidebarOpen.value = true
}

const closeSidebar = () => {
  sidebarOpen.value = false
}

const handleResize = () => {
  isMobile.value = window.innerWidth < 768
  sidebarOpen.value = !isMobile.value
}

onMounted(() => {
  handleResize()
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  window.removeEventListener('resize', handleResize)
})
</script>

<style scoped>
body {
  overflow-x: hidden;
}

#sidebar {
  width: 250px;
  height: 100vh;
  background-color: #343a40;
  position: fixed;
  top: 0;
  left: -250px;
  z-index: 1060;
  transition: left 0.3s ease;
}

#sidebar.show {
  left: 0;
}

#sidebar .nav-link {
  color: #ffffff;
}
#sidebar .nav-link.active {
  background-color: #495057;
}

#topbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 60px;
  background-color: #ffffff;
  border-bottom: 1px solid #dee2e6;
  z-index: 1050;
}

.logo {
  font-size: 1.25rem;
  font-weight: 600;
}

.avatar {
  border-radius: 50%;
  width: 32px;
  height: 32px;
}

#overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1040;
}
#overlay.show {
  display: block;
}

#toggleArrow {
  border: none;
  background: transparent;
  font-size: 1.5rem;
}

#hideSidebarBtn,
#showSidebarBtn {
  display: none;
  position: fixed;
  top: 10px;
  z-index: 1065;
  background-color: #343a40;
  color: white;
  border: none;
  padding: 4px 10px;
  font-size: 1.25rem;
}

#hideSidebarBtn {
  left: 250px;
  border-radius: 0 5px 5px 0;
}

#showSidebarBtn {
  left: -20px;
  border-radius: 0 5px 5px 0;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
  opacity: 0.9;
}

#content {
  padding: 1.5rem;
  margin-top: 70px;
  transition: margin-left 0.3s ease;
}

#content.shifted {
  margin-left: 250px;
}

@media (min-width: 768px) {
  #hideSidebarBtn,
  #showSidebarBtn {
    display: block;
  }

  #toggleArrow {
    display: none !important;
  }
}
</style>
