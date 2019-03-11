import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import BeritaForm from '@/component/BeritaForm'
import Berita from '@/component/Berita'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/berita/create',
      name: 'BeritaForm',
      component: BeritaForm
    },
    {
      path: '/berita',
      name: 'Berita',
      component: Berita
    }
  ]
})
