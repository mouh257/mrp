import { createApp } from 'vue'
import {createRouter,createWebHistory} from 'vue-router';
import './style.css'

import App from './App.vue'
import navbar from './components/navbar.vue'

import Producteur from './components/parametres/Producteur.vue'
import Ferme from './components/parametres/Ferme.vue'
import Culture from './components/parametres/Culture.vue'
import Variete from './components/parametres/Variete.vue'
import Serre from './components/parametres/Serre.vue'
import Coloration from './components/parametres/Coloration.vue'
import Calibre from './components/parametres/Calibre.vue'
import Groupedarticle from './components/parametres/Groupedarticle.vue'
import Article from './components/parametres/Article.vue'
import Fournisseur from './components/parametres/Fournisseur.vue'
import Produitfini from './components/parametres/Produitfini.vue'

import Reception from './components/reception/Reception.vue'
import Ecart from './components/reception/Ecart.vue'

import Commande from './components/production/Commande.vue';
import Colisage from "./components/production/Colisage.vue";


const router=createRouter(
    {
        history:createWebHistory(),
        routes:[
            {path:'/producteur',component:Producteur},
            {path:'/ferme',component:Ferme},
            {path:'/culture',component:Culture},
            {path:'/variete',component:Variete},
            {path:'/serre',component:Serre},
            {path:'/coloration',component:Coloration},
            {path:'/calibre',component:Calibre},
            {path:'/groupedarticle',component:Groupedarticle},
            {path:'/article',component:Article},
            {path:'/fournisseur',component:Fournisseur},
            {path:'/produitfini',component:Produitfini},

            {path:'/reception',component:Reception},
            {path:'/ecart',component:Ecart},

            {path:'/commande',component:Commande},
            {path:'/colisage',component:Colisage},
        ]
    }
);

const app = createApp(App)
app.use(router);
app.component('nav-bar', navbar)
app.mount('#app')
