import { createRouter, createWebHistory } from 'vue-router'
import BatteryStatus from '../pages/battery-status.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "BatteryStatus",
      component: BatteryStatus
    }
  ],
})

export default router
