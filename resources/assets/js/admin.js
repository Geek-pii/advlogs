
require('./bootstrap');
import { createApp } from "vue";
import AdminCompanyListRoute from './components/admin/company/listRoute.vue'
import AdminCompanyEditRoute from './components/admin/company/editRoute.vue'

const app = createApp({})

app.component('AdminCompanyListRoute', AdminCompanyListRoute)
app.component('AdminCompanyEditRoute', AdminCompanyEditRoute)

app.mount('#app')