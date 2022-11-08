import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueTableLite from 'vue3-table-lite'




import ExcelViewPage from './Vue/excel_view.vue'
import JSONViewPage from './Vue/jsonplaceholder_view.vue'
import SQLiteViewPage from './Vue/sqlite_view.vue'

const routes = [
    { path: '/', component: ExcelViewPage },
    { path: '/json', component: JSONViewPage },
    { path: '/sqlite', component: SQLiteViewPage },
]

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

const app = createApp({})

app.use(router)
app.use(VueAxios, axios)

app.component('VueTableLite', VueTableLite)

app.mount('#app')
