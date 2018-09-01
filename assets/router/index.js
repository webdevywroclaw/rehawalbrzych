import Vue from 'vue'
import Router from 'vue-router'
import Example from '../components/Example'
import CategoriesAdmin from '../components/CategoriesAdmin'
import GalleriesAdmin from '../components/GalleriesAdmin'
import GalleryEditAdmin from '../components/GalleryEditAdmin'
import ArticlesAdmin from '../components/ArticlesAdmin'
import MethodsAdmin from '../components/MethodsAdmin'
import MethodEditAdmin from '../components/MethodEditAdmin'
import TherapeutistsAdmin from '../components/TherapeutistsAdmin'
import TherapistEditAdmin from '../components/TherapistEditAdmin'
import PageHeader from '../components/PageHeader'
import AdminHeader from '../components/AdminHeader'
import AdminMain from '../components/AdminMain'

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
                default: AdminMain,
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
        },
        {
            path: '/admin/methods',
            name: 'MethodsAdmin',
            components: {
                default: MethodsAdmin,
                header: AdminHeader
            }
        },
        {
            path: '/admin/method/:id',
            components: {
                default: MethodEditAdmin,
                header: AdminHeader
            }
        },
        {
            path: '/admin/therapeutists',
            name: 'TherapeutistsAdmin',
            components: {
                default: TherapeutistsAdmin,
                header: AdminHeader
            }
        },
        {
            path: '/admin/therapeutist/:id',
            components: {
                default: TherapistEditAdmin,
                header: AdminHeader
            }
        }
    ]
})
