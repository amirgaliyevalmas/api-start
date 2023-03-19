import  {createRouter, createWebHashHistory} from 'vue-router';

import IndexComponent from './components/IndexComponent.vue';

import DepartmentComponent from './components/department/IndexDepartment.vue';
import CabinetComponent from './components/cabinet/CabinetComponent.vue';
import AreaComponent from './components/area/AreaComponent.vue';
import LoginComponent from './components/auth/LoginComponent.vue';
import IndexSpeciality from './components/speciality/IndexSpeciality.vue'







export default createRouter({
    history: createWebHashHistory(),
    routes: [
        {path: '/', component: IndexComponent},
        {path: '/login', component: LoginComponent},

        {path: '/department/:page?', component: DepartmentComponent},
        {path: `/speciality/:page?`, component: IndexSpeciality},

        {path: '/cabinet', component: CabinetComponent},
        {path: '/area', component: AreaComponent},
        {path: '/employers', component: AreaComponent},
    ]
})