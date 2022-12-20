import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ConsultationView from '../views/ConsultationView.vue'
import DetailHospitalView from '../views/DetailHospitalView.vue'
import HospitalView from '../views/HospitalView.vue'
import LoginView from '../views/LoginView.vue'
import RequestConsultationView from '../views/RequestConsultationView.vue'
import VaccineListView from '../views/VaccineListView.vue'
import ErrorView from '../views/404.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/consultations',
      name: 'consultations',
      component: ConsultationView,
      meta: {
        auth: true
      }
    },
    {
      path: '/request-consultation',
      name: 'request-consultation',
      component: RequestConsultationView,
      meta: {
        auth: true
      }
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginView
    },
    {
      path: '/hospitals',
      name: 'hospitals',
      component: HospitalView,
      meta: {
        auth: true
      }
    },
    {
      path: '/hospitals/:id',
      name: 'detail-hospital',
      component: DetailHospitalView,
      meta: {
        auth: true
      }
    },
    {
      path: '/vaccines',
      name: 'vaccines',
      component: VaccineListView,
      meta: {
        auth: true
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: '404',
      component: ErrorView,
    },
  ]
})

export default router
