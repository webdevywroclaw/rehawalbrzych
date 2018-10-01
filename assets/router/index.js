import Vue from 'vue'
import Router from 'vue-router'

import CategoriesAdmin from '../components/admin/CategoriesAdmin'
import GalleriesAdmin from '../components/admin/GalleriesAdmin'
import GalleryEditAdmin from '../components/admin/GalleryEditAdmin'
import ArticlesAdmin from '../components/admin/ArticlesAdmin'
import ArticleEditAdmin from '../components/admin/ArticleEditAdmin'
import MethodsAdmin from '../components/admin/MethodsAdmin'
import MethodEditAdmin from '../components/admin/MethodEditAdmin'
import TherapeutistsAdmin from '../components/admin/TherapeutistsAdmin'
import TherapistEditAdmin from '../components/admin/TherapistEditAdmin'
import AdminHeader from '../components/admin/AdminHeader'
import AdminMain from '../components/admin/AdminMain'

import ContentComponent from '../components/ContentComponent'
import CampComponent from '../components/CampComponent'
import ContactComponent from '../components/ContactComponent'
import GalleriesComponent from '../components/GalleriesComponent'
import OfferContentComponent from '../components/OfferContentComponent'
import MenuComponent from '../components/MenuComponent'
import TherapistSingleComponent from '../components/TherapistSingleComponent'
import FooterComponent from '../components/FooterComponent'
import ArticleComponent from '../components/ArticleComponent'
import ArticleSingleComponent from '../components/ArticleSingleComponent'
import MethodSingleComponent from '../components/MethodSingleComponent'
import TherapistSiteComponent from '../components/TherapistSiteComponent'
import PriceListComponent from '../components/PriceListComponent'
import MethodsInCatComponent from '../components/MethodsInCatComponent'
import PrivacyComponent from '../components/PrivacyComponent'

import NotFoundComponent from '../components/NotFoundComponent'

Vue.use(Router)


const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'ContentComponent',
            components: {
                default: ContentComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt.', // set a title
                htmlAttrs: {
                    lang: 'pl',
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Centrum rehabilitacji w Wałbrzychu. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Centrum rehabilitacji w Wałbrzychu. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/turnusy',
            name: 'CampComponent',
            components: {
                default: CampComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'Rehabilitacja dzieci i niemowląt w Wałbrzychu - turnusy rehabilitacyjne',
                metaTags: [
                    {
                        name: 'description',
                        content: 'RehaWalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        property: 'og:description',
                        content: 'RehaWalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu.'
                    }
                ]
            }
        },
        {
            path: '/kontakt',
            name: 'ContactComponent',
            components: {
                default: ContactComponent,
                menu: MenuComponent,

            },
            meta: {
                title: 'RehaWałbrzych - adres, kontakt i media społecznościowe.', // set a title
                htmlAttrs: {
                    lang: 'pl',
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Kontakt. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'telefon,email,adres,facebook,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Kontakt. RehaWalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/galeria',
            name: 'GalleriesComponent',
            components: {
                default: GalleriesComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - galeria zdjęć z terapii.', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Galeria zdjęć z terapii. Rehawalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'galeria,zdjec,terapia,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Galeria zdjęć z terapii. Rehawalbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/metody/:id',
            name: 'MethodsInCatComponent',
            components: {
                default: MethodsInCatComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych', // set a title
                titleTemplate: '%s - metody terapii', // title is now "My Example App - Yay!"
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Metody terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,metody,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Metody terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/oferta',
            name: 'OfferContentComponent',
            components: {
                default: OfferContentComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - nasza oferta. Kategorie metod terapii.', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Kategorie metod terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'oferta,kategorie,metody,terapii,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Kategorie metod terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/szczegoly:art_id',
            name: 'ArticleComponent',
            components: {
                default: ArticleComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'Rehawalbrzych - artykul'
            }
        },
        {
            path: '/terapeuci',
            name: 'TherapistSiteComponent',
            components: {
                default: TherapistSiteComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - nasi terapeuci', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Nasi terapeuci. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'terapeuci,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Nasi terapeuci. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/terapeuta/:id',
            name: 'TherapistSingleComponent',
            components: {
                default: TherapistSiteComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - terapeuta', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Terapeuta. RehaWałbrzych - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'terapeuta,rehawalbrzych,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Terapeuta. RehaWałbrzych - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/cennik',
            name: 'PriceListComponent',
            components: {
                default: PriceListComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - cennik', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Cennik terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'cennik,terapii,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Cennik terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/metoda/:id',
            name: 'MethodSingleComponent',
            components: {
                default: MethodSingleComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'Rehawalbrzych', // set a title
                titleTemplate: '%s - metoda terapii', // title is now "My Example App - Yay!"
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Metoda terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'metoda,terapii,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Metoda terapii. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/artykuly',
            name: 'ArticleComponent',
            components: {
                default: ArticleComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - artykuły terapeutów', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Artykuły terapeutów. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'atykuły,terapeuci,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Artykuły terapeutów. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/artykul/:id',
            name: 'ArticleSingleComponent',
            components: {
                default: ArticleSingleComponent,
                menu: MenuComponent,
                footer: FooterComponent
            },
            meta: {
                title: 'RehaWałbrzych - artykuł', // set a title
                htmlAttrs: {
                    lang: 'pl',
                    amp: undefined // "amp" has no value
                },
                metaTags: [
                    {
                        name: 'description',
                        content: 'Artykuł terapeuty. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    },
                    {
                        name: 'keywords',
                        content: 'atykuł,terapeuta,rehabilitacja,walbrzych,integracja,sensoryczna,dzieci,niemowlat,terapie'
                    },
                    {
                        property: 'og:description',
                        content: 'Artykuł terapeuty. RehaWałbrzych Kamila Juś - rehabilitacja i integracja sensoryczna dzieci i niemowląt w Wałbrzychu. '
                    }
                ]
            }
        },
        {
            path: '/politykaprywatnosci',
            name: 'PrivacyComponent',
            components: {
                default: PrivacyComponent,
                menu: MenuComponent,
                footer: FooterComponent
            }
        },
        {
            path: '*',
            components: {
                default: NotFoundComponent
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
            path: '/admin/article/:id',
            components: {
                default: ArticleEditAdmin,
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
    ],
    scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 0}
    }
})

// This callback runs before every route change, including on page load.
router.beforeEach((to, from, next) => {
    // This goes through the matched routes from last to first, finding the closest route with a title.
    // eg. if we have /some/deep/nested/route and /some, /deep, and /nested have titles, nested's will be chosen.
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title);

    // Find the nearest route element with meta tags.
    const nearestWithMeta = to.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);
    const previousNearestWithMeta = from.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);

    // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) document.title = nearestWithTitle.meta.title;

    // Remove any stale meta tags from the document using the key attribute we set below.
    Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(el => el.parentNode.removeChild(el));

    // Skip rendering meta tags if there are none.
    if (!nearestWithMeta) return next();

    // Turn the meta tag definitions into actual elements in the head.
    nearestWithMeta.meta.metaTags.map(tagDef => {
        const tag = document.createElement('meta');

        Object.keys(tagDef).forEach(key => {
            tag.setAttribute(key, tagDef[key]);
        });

        // We use this to track which meta tags we create, so we don't interfere with other ones.
        tag.setAttribute('data-vue-router-controlled', '');

        return tag;
    })
    // Add the meta tags to the document head.
        .forEach(tag => document.head.appendChild(tag));

    next();
});

export default router;

