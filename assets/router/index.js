import Vue from 'vue'
import Router from 'vue-router'
import Example from '../components/Example'
import CategoriesAdmin from '../components/CategoriesAdmin'
import GalleriesAdmin from '../components/GalleriesAdmin'
import GalleryEditAdmin from '../components/GalleryEditAdmin'
import ArticlesAdmin from '../components/ArticlesAdmin'
import PageHeader from '../components/PageHeader'
import AdminHeader from '../components/AdminHeader'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Content',
            components: {
                default: Example,
                header: PageHeader
            }
        },
        {
            path: '/admin',
            name: 'Admin',
            components: {
                default: Example,
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
            path: '/admin/galleries',
            name: 'GalleriesAdmin',
            components: {
                default: GalleriesAdmin,
                header: AdminHeader
            }
        },
        {
            path: '/admin/gallery/:id',
            components: {
                default: GalleryEditAdmin,
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
