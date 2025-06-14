
<template>
    <div class="container " >
        <br>

        <div class="row justify-content-around">
            <div class="col-3">
                <div class="col-12">
                    <h2>Ajouter / Modifier</h2>
                    <br>
                    <form class="form-horizontal" @submit.prevent="save" >
                        <div class="mb-3">
                            <label>Date fabrication
                                <input type="date" v-model="commande.datefab"  @change="getCommandesOf()" class="form-control">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label>N° commande
                                <input type="number" v-model="commande.numcmd" class="form-control"  placeholder="N° commande">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label>Client
                                <input type="text" v-model="commande.client" class="form-control" placeholder="Client">
                            </label>
                        </div>

                        <div class="mb-3">
                            <label>Nbr de colis total
                                <input type="number" v-model="commande.nbrcolis" class="form-control"  placeholder="Nbr Colis total">
                            </label>
                        </div>

                        <div class="mb-3">
                            <label>Culture
                            <select  @change="getproduitfiniOf()" v-model="commande.culture_id" class="form-control">
                                <option disabled >Choisir ...</option>
                                <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                            </select>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label>Produit fini
                                <select v-model="commande.produitfini_id" class="form-control" >
                                    <option disabled  >Choisir ...</option>
                                    <option v-for="pf in produitsfinis" v-bind:value="pf.id">{{ pf.name }}</option>
                                </select>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label>Nbr palette
                                <input type="number" v-model="commande.nbrpal" class="form-control" placeholder="Nbr palette">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label>Observation
                                <input type="text" v-model="commande.observation" class="form-control" placeholder="Observation">
                            </label>
                        </div>

                        <div class="mb-3 d-flex justify-content-around">
                            <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                            <button type="button" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-9">
                <div class="col-12">
                    <h2>Liste des commandes</h2>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">N° cmd</th>
                            <th scope="col">Client</th>
                            <th scope="col">Produit fini</th>
                            <th scope="col">Colis /pal</th>
                            <th scope="col">Nbr pal</th>
                            <th scope="col">total Colis</th>

                            <th scope="col">Observation</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="s in commandes" v-bind:key="s.id" v-if="commandes?.length >0">

                            <td>{{ s.numcmd }}</td>
                            <td>{{ s.client }}</td>
                            <td>{{ s.produitfini?.name}}</td>
                            <td>{{ s.nbrcolis / s.nbrpal }}</td>
                            <td>{{ s.nbrpal }}</td>
                            <td>{{ s.nbrcolis }}</td>
                            <td>{{ s.observation }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(s)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(s)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr v-else> <td colspan="7">No records found </td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios';
import moment from 'moment';
export default{
    data(){
        return{
            cancel_btn: false,
            commandes:[],
            cultures:[],
            produitsfinis:[],
            commande:{
                id:'',
                numcmd:'',
                client:'',
                datefab:'',
                produitfini_id:'',
                nbrcolis:'',
                pdstotal:'',
                nbrpal:'',
                observation:'',
                annulee:'',
            },

        }
    },
    created() {
        this.setInitialDate();
        this.LoadCultures();
        this.LoadCommandes();
    },
    methods: {
        setInitialDate() {
            this.commande.datefab = moment().format('YYYY-MM-DD');
        },

        resetForm()
        {
            this.commande ={
                id:'',
                numcmd:'',
                client:'',
                datefab:'',
                produitfini_id:'',
                nbrcolis:'',
                pdstotal:'',
                nbrpal:'',
                observation:'',
                annulee:'',
            };
            this.cancel_btn= false;
        },

        LoadCommandes()
        {
            axios.get("http://127.0.0.1:8000/api/commande")
                .then(({data})=>{
                    this.commandes=data.commandes;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        LoadCultures()
        {
            axios.get("http://127.0.0.1:8000/api/culture")
                .then(({data})=> {
                    this.cultures = data;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getCommandesOf()
        {
            var dfab = this.commande.datefab;
            axios.get("http://127.0.0.1:8000/api/commandesOf?datefab="+dfab)
                .then(({data})=> {
                    this.commandes = data.commandes;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getproduitfiniOf()
        {
            var cid = this.commande.culture_id; //v-model="commande.culture_id"
            axios.get('http://127.0.0.1:8000/api/produitfiniOf?culture='+cid)
                .then(({data})=>{
                    this.produitsfinis=data.produitsfinis;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        save()
        {
            if(this.commande.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/commande",this.commande)
                .then(()=>{
                    alert("commande ajoutée avec success !");
                    this.LoadCommandes();
                    this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                });

        },
        edit(r){
            this.commande=r;
            this.commande.culture_id=r.produitfini.culture_id;
            this.getproduitfiniOf();
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/commande/"+this.commande.id,this.commande)
                .then(()=>{
                    alert("commande modifiée avec success !");
                    this.LoadCommandes();
                    this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        remove(r){
            axios.delete("http://127.0.0.1:8000/api/commande/"+r.id)
                .then(()=>{
                    alert("commande supprimée avec success !");
                    this.LoadCommandes();
                })
                .catch(error => {
                    console.error(error);
                });
        },
    }
};
</script>
