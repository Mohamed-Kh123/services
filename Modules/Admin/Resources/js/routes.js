import {generateRoutes} from "nawadash/modules";

const buildRoutes = function (resource) {
    let fileName$ = resource.includes('-') ? _.camelCase(resource) : resource;
    return {
        path: `/${resource}`,
        component: () => import(`./pages/${fileName$}/Index.vue`),
        children: [
            {
                path: "create",
                name: `${resource}.create`,
                component: () => import(`./pages/${fileName$}/Create.vue`),
            },
            {
                path: "all",
                name: `${resource}.all`,
                component: () => import(`./pages/${fileName$}/List.vue`),
            },
            {
                path: ":id/edit",
                name: `${resource}.edit`,
                component: () => import(`./pages/${fileName$}/Create.vue`),
            },
            {
                path: ":id/show",
                name: `${resource}.show`,
                component: () => import(`./pages/${fileName$}/Show.vue`),
            },
        ],
    };
};
export default [
    buildRoutes('category'),
    buildRoutes('service'),
    buildRoutes('company'),
    buildRoutes('employee'),
    buildRoutes('customer'),

];
