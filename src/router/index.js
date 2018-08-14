import Vue from 'vue'
import Router from 'vue-router'
import Content from '@/components/Content'
import CategoriesAdmin from '@/components/CategoriesAdmin'
import ArticlesAdmin from '@/components/ArticlesAdmin'
import PageHeader from '@/components/PageHeader'
import AdminHeader from '@/components/AdminHeader'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Content',
            components: {
                default: Content,
                header: PageHeader
            }
    },
        {
            path: '/admin',
            name: 'Admin',
            components: {
                default: Content,
                header: AdminHeader
            }
        },
        {
            path: '/admin/categories',
            name: 'CategoriesAdmin',
            components: {
                default: CategoriesAdmin,
                header: AdminHeader
            }
        },
        {
            path: '/admin/articles',
            name: 'ArticlesAdmin',
            components: {
                default: ArticlesAdmin,
                header: AdminHeader
            }
        }
  ]
})
