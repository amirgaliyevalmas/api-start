import './bootstrap';
import { createApp } from 'vue';
import router from './router';

import Toaster from "@meforma/vue-toaster";

const app = createApp({});

app.use(router);

app.mount('#app');

app.use(Toaster, {
    position: "bottom-right",
});
