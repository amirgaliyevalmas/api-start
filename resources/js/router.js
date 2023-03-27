import  {createRouter, createWebHistory} from 'vue-router';

import IndexComponent from './components/IndexComponent.vue';
import authenticate from './middleware/authenticate';
import DepartmentComponent from './components/department/IndexDepartment.vue';
import IndexSpeciality from './components/speciality/IndexSpeciality.vue'
import IndexCabinet from './components/cabinet/IndexCabinet.vue';

import IndexArea from './components/area/IndexArea.vue';
import IndexUser from './components/user/IndexUser.vue';

import LoginComponent from './components/auth/LoginComponent.vue';









const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', component: IndexComponent, name: 'home'},
        {path: `/login`, component: LoginComponent, name: 'login'},
        {path: `/department/:page?`, component: DepartmentComponent, name: 'department'},
        {path: `/speciality/:page?`, component: IndexSpeciality},
        {path: `/cabinet/:page?`, component: IndexCabinet},
        {path: `/area/:page?`, component: IndexArea},
        {path: `/user/:page?`, component: IndexUser},
        {path: `/employers/:page?`, component: IndexArea},
        {path: `/reset`, component: IndexArea},

    ],
});

router.beforeEach((to, from, next) => {
    authenticate(to, from, next)
});


export default router;

