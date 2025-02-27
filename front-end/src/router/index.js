import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import { isAuthenticated } from '@/store/auth';
import Swal from "sweetalert2";

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

// Global navigation guard to check authentication
router.beforeEach(async (to, from, next) => {
  if (to.meta.requiresAuth) {
    const { authenticated, user } = await isAuthenticated();
    if (authenticated) {
      to.meta.user = user;
      next();
    } else {
      toast("You need to be authenticated to access this page", "error");
      next('/');
    }
  } else {
    next();
  }
});

function toast(message, icon) {
  Swal.fire({
      toast: true,
      position: "top-end",
      text: message,
      icon: icon,
      timer: 3000,
      showConfirmButton: false,
  });
}

export default router
