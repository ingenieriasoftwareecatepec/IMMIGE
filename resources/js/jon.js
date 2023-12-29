import { createApp } from 'vue/dist/vue.esm-bundler';

import eventosCreate from './components/eventos/create.vue';

const app= createApp({});


app.component('eventos-create', eventosCreate)


app.mount('#app')
