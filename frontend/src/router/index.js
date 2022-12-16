import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ConsultationView from '../views/ConsultationView.vue'
import DetailHospitalView from '../views/DetailHospitalView.vue'
import HospitalView from '../views/HospitalView.vue'
import LoginView from '../views/LoginView.vue'
import RequestConsultationView from '../views/RequestConsultationView.vue'
import VaccineListView from '../views/VaccineListView.vue'

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
      component: ConsultationView
    },
    {
      path: '/request-consultation',
      name: 'request-consultation',
      component: RequestConsultationView
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginView
    },
    {
      path: '/hospitals',
      name: 'hospitals',
      component: HospitalView
    },
    {
      path: '/hospitals/:id',
      name: 'detail-hospital',
      component: DetailHospitalView
    },
    {
      path: '/vaccines',
      name: 'vaccines',
      component: VaccineListView
    },
  ]
})

export default router
