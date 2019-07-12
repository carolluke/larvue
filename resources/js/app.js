
    import Vue from 'vue';
    import VueRouter from 'vue-router';

    Vue.use(VueRouter);

    import VueAxios from 'vue-axios';
    import axios from 'axios';

    Vue.use(VueAxios, axios);

    import App          from './components/App'
    import Dashboard    from './components/Board'
    import Login        from './components/Login'
    import Register     from './components/Register'
    import Home         from './components/Welcome'
    import Board        from './components/Dashboard.vue'
    import AddCompany   from './components/AddCompany.vue'
    import Companylist  from './components/CompanyList.vue'
    import EditCompany  from './components/EditCompany.vue'

    const routes = [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/login',
                name: 'login',
                component: Login,
            },
            {
                path: '/signup',
                name: 'signup',
                component: Register,
            },
            {
                path: '/board',
                name: 'board',
                component: Dashboard,
            },
            {
                path: '/dashboard',
                name: 'dashboard',
                component: Board
            },
            {
                path: '/company',
                name: 'company',
                component: AddCompany
            },
            {
                path: '/companies',
                name: 'companies',
                component: Companylist
            },
            {
                path: '/edit/:id',
                name: 'editcompany',
                component: EditCompany
            }
        ];


    const router = new VueRouter({
        mode: 'history',
        routes: routes,
    });

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
    });