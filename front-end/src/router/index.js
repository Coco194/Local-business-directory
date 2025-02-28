import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CreateJobView from '../views/job/CreateJobView.vue'
import JobsView from '../views/job/JobsView.vue'
import JobView from '../views/job/JobView.vue'
import { isAuthenticated } from '@/store/auth';
import Swal from "sweetalert2";

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/post-job',
    name: 'post-job',
    component: CreateJobView,
    meta: { requiresAuth: true }
  },
  {
    path: '/jobs',
    name: 'jobs',
    component: JobsView
  },
  {
    path: '/job',
    name: 'job',
    component: JobView
  },
  {
    path: '/explore',
    name: 'explore',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/ExploreView.vue')
  }
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
