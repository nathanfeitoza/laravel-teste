require('./bootstrap');

import teste_component from "./vue/components/teste_component";

window.Vue = require('vue');

const testeComponent = Vue.component('teste_component', teste_component);

const app = new Vue({
    el: '#app',
    components: {
        testeComponent
    }
})
