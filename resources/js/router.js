import  {createRouter, createWebHashHistory} from 'vue-router';

import IndexComponent from './components/IndexComponent.vue';

import DepartmentComponent from './components/department/DepartmentComponent.vue';
import SpecialityComponent from './components/speciality/SpecialityComponent.vue';
import CabinetComponent from './components/cabinet/CabinetComponent.vue';
import AreaComponent from './components/area/AreaComponent.vue';
import LoginComponent from './components/auth/LoginComponent.vue';






export default createRouter({
    history: createWebHashHistory(),
    routes: [
        {path: '/', component: IndexComponent},
        {path: '/login', component: LoginComponent},

        {path: '/department', component: DepartmentComponent},
        {path: '/speciality', component: SpecialityComponent},
        {path: '/cabinet', component: CabinetComponent},
        {path: '/area', component: AreaComponent},
    ]
})