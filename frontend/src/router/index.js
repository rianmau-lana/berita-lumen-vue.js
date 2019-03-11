import Vue from 'vue'
import Router from 'vue-router'
import Berita from '@/components/Berita'
import BeritaForm from '@/components/BeritaForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Berita',
      component: Berita
    },
    {
      path: '/berita/create',
      name: 'BeritaForm',
      component: BeritaForm
    },
    {
      path: '/berita/:id',
      name: 'BeritaEdit',
      component: BeritaForm
    }
  ]
})
