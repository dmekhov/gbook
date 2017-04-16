import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Index')
    },
    {
        path: '/user/:id',
        component: require('./views/User')
    },
    {
        path: '/personal',
        component: require('./views/User')
    },
    {
        path: '/login',
        component: require('./views/Login')
    }
];

export default new VueRouter({
    routes: routes,
    linkActiveClass: 'active',
    mode: 'history'
});