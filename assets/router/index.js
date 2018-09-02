import Vue from 'vue'
import Router from 'vue-router'
import Example from '../components/Example'
import CategoriesAdmin from '../components/admin/CategoriesAdmin'
import GalleriesAdmin from '../components/admin/GalleriesAdmin'
import GalleryEditAdmin from '../components/admin/GalleryEditAdmin'
import ArticlesAdmin from '../components/admin/ArticlesAdmin'
import MethodsAdmin from '../components/admin/MethodsAdmin'
import MethodEditAdmin from '../components/admin/MethodEditAdmin'
import TherapeutistsAdmin from '../components/admin/TherapeutistsAdmin'
import TherapistEditAdmin from '../components/admin/TherapistEditAdmin'
import PageHeader from '../components/PageHeader'
import AdminHeader from '../components/admin/AdminHeader'
import AdminMain from '../components/admin/AdminMain'

import ContentComponent from '../components/ContentComponent'
import AboutUsComponent from '../components/AboutUsComponent'
import CampComponent from '../components/CampComponent'
import ContactComponent from '../components/ContactComponent'
import GalleryComponent from '../components/GalleryComponent'
import MethodsComponent from '../components/MethodsComponent'
import OfferContentComponent from '../components/OfferContentComponent'
import MenuComponent from '../components/MenuComponent'
import TherapistSingleComponent from '../components/TherapistSingleComponent'
import FooterComponent from '../components/FooterComponent'
import ArticleComponent from '../components/ArticleComponent'

import TherapistSiteComponent from '../components/TherapistSiteComponent'

import PriceListComponent from '../components/PriceListComponent'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'ContentComponent',
            components: {
                default: ContentComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/onas',
            name: 'AboutUsComponent',
            components: {
                default: AboutUsComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/turnusy',
            name: 'CampComponent',
            components: {
                default: CampComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/kontakt',
            name: 'ContactComponent',
            components: {
                default: ContactComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/galeria',
            name: 'GalleryComponent',
            components: {
                default: GalleryComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/metody/:idcat',
            name: 'MethodsComponent',
            components: {
                default: MethodsComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/oferta',
            name: 'OfferContentComponent',
            components: {
                default: OfferContentComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/szczegoly:art_id',
            name: 'ArticleComponent',
            components: {
                default: ArticleComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/terapeuci',
            name: 'TherapistSiteComponent',
            components: {
                default: TherapistSiteComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/terapeuta/:id',
            name: 'TherapistSingleComponent',
            components: {
                default: TherapistSiteComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/cennik',
            name: 'PriceListComponent',
            components: {
                default: MethodsComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/metoda/:id',
            name: 'MethodSingleComponent',
            components: {
                default: MethodsComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '/admin',
            name: 'Admin',
            components: {
                default: AdminMain,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/categories',
            name: 'CategoriesAdmin',
            components: {
                default: CategoriesAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/galleries',
            name: 'GalleriesAdmin',
            components: {
                default: GalleriesAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/gallery/:id',
            components: {
                default: GalleryEditAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/articles',
            name: 'ArticlesAdmin',
            components: {
                default: ArticlesAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/methods',
            name: 'MethodsAdmin',
            components: {
                default: MethodsAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/method/:id',
            components: {
                default: MethodEditAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/therapeutists',
            name: 'TherapeutistsAdmin',
            components: {
                default: TherapeutistsAdmin,
                menu: AdminHeader
            }
        },
        {
            path: '/admin/therapeutist/:id',
            components: {
                default: TherapistEditAdmin,
                menu: AdminHeader
            }
        }
    ]
})
