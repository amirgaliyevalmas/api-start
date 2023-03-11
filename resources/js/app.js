import './bootstrap';
import { createApp } from 'vue';

import router from './router';
import ExampleComponent from './components/department/DepartmentComponent.vue';

const app = createApp({});
app.component('example-component', ExampleComponent);
app.use(router);

app.mount('#app');
