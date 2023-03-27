import './bootstrap';
import { createApp } from 'vue';
import router from './router';

import { abilitiesPlugin } from '@casl/vue';
import ability from './services/ability';

const app = createApp({});

app.use(router);

app.use(abilitiesPlugin, ability, {
    useGlobalProperties: true
});


app.mount('#app');
