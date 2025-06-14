
<template>
    <div class="container " >
        <br>

        <div class="row justify-content-around">
            <div class="col-3">
                <div class="col-12">
                    <h2>Ajouter / Modifier</h2>
                    <br>

                    <form class="form-horizontal" @submit.prevent="save" >

                        <div class="mb-3 d-flex flex-column">
                            <label>N° versement
                                <input @change="getCultureOf();getVarieteOf();getRestOf()" type="number" v-model="colisage.versement" min="1" max="99999" step="1" class="form-control" placeholder="N° versement">
                            </label>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label>Nbr de colis
                                <input type="number" @change="testPds()" v-model="colisage.nbrcolis" min="1" max="660" step="1" class="form-control"  placeholder="Nbr Colis">
                            </label>
                        </div>
                        <div class="mb-3  d-flex flex-column ">
                            <label >Produit fini
                                <select @change="testPds()" v-model="colisage.produitfini_id" class="form-control" >
                                    <option disabled  >Choisir un produit fini</option>
                                    <option v-for="pf in produitsfinis" v-bind:value="pf.id">{{ pf.name }}</option>
                                </select>
                            </label>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label>Calibre
                                <select v-model="colisage.calibre_id" class="form-control" >
                                    <option disabled  >Choisir ...</option>
                                    <option v-for="cal in calibres" v-bind:value="cal.id">{{ cal.name }}</option>
                                </select>
                            </label>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label>Variété
                                <select v-model="colisage.variete_id" class="form-control" >
                                    <option disabled  >Choisir ...</option>
                                    <option v-for="vart in varietes" v-bind:value="vart.id">{{ vart.name }}</option>
                                </select>
                            </label>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label>Colorations
                                <select v-model="colisage.coloration_id" class="form-control" >
                                    <option disabled  >Choisir ...</option>
                                    <option v-for="col in colorations" v-bind:value="col.id">{{ col.name }}</option>
                                </select>
                            </label>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label>Observation
                                <input type="text" v-model="colisage.observation" class="form-control" placeholder="Observation">
                            </label>
                        </div>

                        <div class="mb-3 d-flex justify-content-around">
                            <button type="submit" v-show="submit_btn"  class="btn btn-primary">Enregistrer</button>
                            <button type="button" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-9">
                <div class="col-12">
                    <h2>Liste des instances</h2>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Versement</th>
                            <th scope="col">Nbr Colis</th>
                            <th scope="col">Produit fini</th>
                            <th scope="col">Variété</th>
                            <th scope="col">Calibre</th>
                            <th scope="col">Coloration</th>
                            <th scope="col">Observation</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="s in colisages" v-bind:key="s.id" v-if="colisages?.length >0">

                            <td>{{ s.versement }}</td>
                            <td>{{ s.nbrcolis }}</td>
                            <td>{{ s.produitfini?.name}}</td>
                            <td>{{ s.variete?.name}}</td>
                            <td>{{ s.calibre?.name}}</td>
                            <td>{{ s.coloration?.name}}</td>
                            <td>{{ s.observation }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(s)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(s)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr v-else> <td colspan="8">No records found </td></tr>
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
            submit_btn:true,
            culture_id:0,
            restOfVers:0,
            colisages:[],
            calibres:[],
            colorations:[],
            varietes:[],
            produitsfinis:[],
            colisage:{
                id:'',
                palette_id:'',
                produitfini_id:'',
                nbrcolis:'',
                versement:'',
                calibre_id:'',
                variete_id:'',
                coloration_id:'',
                pdstotal:'',
                observation:'',
            },

        }
    },
    created() {
        this.LoadColisages();
    },
    watch: {
        culture_id(newVal, oldVal) {
            this.onCultureIdChange(newVal, oldVal);
        }
    },
    methods: {
        onCultureIdChange(newVal, oldVal) {
            this.getColorationsOf();
            this.getCalibresOf();
            this.getProduitFiniOf()
        },

        testPds(){
            var n = this.colisage.nbrcolis;
            var p = this.produitsfinis.pdscolis;

            this.submit_btn = n * p < this.restOfVers;
        },

        resetForm()
        {
            this.colisage={
                id:'',
                palette_id:'',
                produitfini_id:'',
                nbrcolis:'',
                versement:'',
                calibre_id:'',
                variete_id:'',
                coloration_id:'',
                pdstotal:'',
                observation:'',
            };
            this.cancel_btn= false;
        },

        LoadColisages()
        {
            axios.get("http://127.0.0.1:8000/api/colisage")
                .then(({data})=>{
                    this.colisages=data.colisages;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getCultureOf(){
            var vers = this.colisage.versement;
            axios.get("http://127.0.0.1:8000/api/cultureOfVersement?versement="+vers)
                .then(({data})=> {
                    this.culture_id = data.culture.culture_id;
                    //console.log(data.culture_id);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getVarieteOf(){
            var vers = this.colisage.versement;
            axios.get("http://127.0.0.1:8000/api/varietesOfVersement?versement="+vers)
                .then(({data})=> {
                    this.varietes = data.varietes;
                    //console.log(data.varietes);
                })
                .catch(error => {
                    console.error(error);
                });

        },

        getRestOf(){
            // Rest= Reception - fabrication - Ecart
            var vers = this.colisage.versement;
            axios.get("http://127.0.0.1:8000/api/restOfVersement?versement="+vers)
                .then(({data})=> {
                    this.restOfVers = data.restOfVers;
                    //console.log(data.restOfVers);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getColorationsOf()
        {
            var cid = this.culture_id;

            axios.get("http://127.0.0.1:8000/api/colorationsOf?culture="+cid)
                .then(({data})=>{
                    this.colorations=data.colorations;
                    //console.log(data.colorations);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getCalibresOf()
        {
            var cid = this.culture_id;
            axios.get("http://127.0.0.1:8000/api/calibresOf?culture="+cid)
                .then(({data})=>{
                    this.calibres=data.calibres;
                    //console.log(data.calibres);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getProduitFiniOf()
        {
            var cid = this.culture_id;
            axios.get('http://127.0.0.1:8000/api/produitfiniOf?culture='+cid)
                .then(({data})=>{
                    this.produitsfinis=data.produitsfinis;
                    //console.log(data.produitsfinis);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        save()
        {
            if(this.colisage.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/colisage",this.colisage)
                .then(()=>{
                    alert("colis ajoutés avec success !");
                    this.LoadColisages();
                    this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                });

        },
        edit(r){
            this.colisage=r;
            //this.colisage.culture_id=r.produitfini.culture_id;
            this.getProduitFiniOf();
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/colisage/"+this.colisage.id,this.colisage)
                .then(()=>{
                    alert("colis modifiés avec success !");
                    this.LoadColisages();
                    this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        remove(r){
            axios.delete("http://127.0.0.1:8000/api/colisage/"+r.id)
                .then(()=>{
                    alert("colis supprimés avec success !");
                    this.LoadColisages();
                })
                .catch(error => {
                    console.error(error);
                });
        },
    }
};
</script>
