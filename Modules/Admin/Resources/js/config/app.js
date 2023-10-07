export default {
    name: "Admin",
    meta: {},
    logo: {
        light: "/assets/images/logo-2.png",
        dark: "/assets/images/logo-2.png",
        style: {
            width: "55px",
        },
        // classes : "",
    },
    map: {
        load: {
            key: 'AIzaSyDnC5b2ol_gcV_maHOzchHTqItqYYLV6TI',
            libraries: "places"
        }
    },
    hideHeaderNotification: true,
    language: {
        default: "ar",
        data: () => {
            return [
                {
                    symbol: "AR",
                    locale: "ar",
                    label: 'العربية',
                    dir: 'rtl',
                    flag: "/images/icons/flags/germany.svg"
                },
                {
                    symbol: "EN",
                    locale: "en",
                    label: 'English',
                    dir: 'ltr',
                    flag: "/panel/images/icons/flags/united-states-of-america.svg"
                },
            ]
        },

    },
 countries: {},
    //
    notifications: {
        display: false,
        route: "/notification/all",
        displayLatest: 6,
    },
    theme: "theam1",
    header: {
        show: true
    },
    sidebar: {
        show: true,
        class: "theme1"
    },
    permissions: {
        enabled: false,
    },
    determinants: {
        endpoint: {method: "GET", url: "/api/admin/home/determinant"},
    },
    // loginIllustrations: {
    //     src: '/panel/images/illustrations/login/admin.svg'
    // },

}
