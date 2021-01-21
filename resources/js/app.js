/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import VModal from "vue-js-modal";
import Vue from "vue";
import JsonCSV from "vue-json-csv";
import vSelect from "vue-select";

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "qr-component",
    require("./components/VueQrCodeReader.vue").default
);
Vue.component(
    "time-sheet-component",
    require("./components/TimeSheets.vue").default
);
Vue.component(
    "employee-time-sheet",
    require("./components/EmployeeTimeSheet.vue").default
);
Vue.component("orders-total", require("./components/OrdersTotal.vue").default);

Vue.component("search-barangay", require("./components/BarangayInput.vue").default);
Vue.component("search-cities", require("./components/CityInput.vue").default);

Vue.component("downloadCsv", JsonCSV);

Vue.component("v-select", vSelect);

Vue.directive("focus", {
    // When the bound element is inserted into the DOM...
    inserted: function(el) {
        // Focus the element
        el.focus();
    }
});

Vue.use(VModal, { dynamicDefault: { draggable: true, resizable: true } });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
