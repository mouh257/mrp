<template>

<div class="container " >
    <br>

    <div class="row justify-content-around">
        <div class="col-2">
            <div class="col-12">
                <h2>Ajouter / Modifier</h2>
                <br>
                <form class="form-horizontal" @submit.prevent="save" >

					<div class="mb-3">
                        <label class="form-label">Culture</label>
                        <select v-model="produitfini.culture_id" class="form-control" @change="getProduitfiniOf()">
                            <option disabled>Choisir la Culture ...</option>
                            <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label" >Nom du produit-fini</label>
                        <input v-model="produitfini.name" type="text" class="form-control"  placeholder="Saisir le nom">
                    </div>

					<div class="mb-3">
                        <label class="form-label">Type Colis</label>
                        <select v-model="produitfini.colis_id" class="form-control" >
                            <option disabled >Choisir Type Colis...</option>
                            <option v-for="colis in les_colis" v-bind:value="colis.id">{{ colis.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label" >Poids Colis (Kg)</label>
                        <input v-model="produitfini.pdscolis" type="number" min="1" max="7.5" step="0.25" class="form-control"  placeholder="Poids net en Kg">
                    </div>

					<div class="mb-3">
                        <label class="form-label">Type Barquette</label>
                        <select v-model="produitfini.brqtt_id" class="form-control" >
                            <option disabled >Choisir Type Barquette...</option>
                            <option v-for="brqtt in les_barquettes" v-bind:value="brqtt.id">{{ brqtt.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label" >Poids barquette (gr)</label>
                        <input v-model="produitfini.pdsbrqtt" type="number" class="form-control"  placeholder="Poids net en gr">
                    </div>
					<div class="mb-3">
                        <label class="form-label" >Nombre barquette </label>
                        <input v-model="produitfini.nbrbrqtt" type="number" class="form-control"  placeholder="Nbr barquette par colis">
                    </div>

					<div class="mb-3">
                        <label class="form-label">Type Couvercle</label>
                        <select v-model="produitfini.couv_id" class="form-control" >
                            <option disabled >Choisir Type Couvercle...</option>
                            <option v-for="couv in les_couvercles" v-bind:value="couv.id">{{ couv.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label">Type Stabilisateur</label>
                        <select v-model="produitfini.stab_id" class="form-control" >
                            <option disabled >Choisir Stabilisateur...</option>
                            <option v-for="stab in les_stabilisateur" v-bind:value="stab.id">{{ stab.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label">Etiquette barquette</label>
                        <select v-model="produitfini.etiq_id" class="form-control" >
                            <option disabled >Choisir Etiquette barquette...</option>
                            <option v-for="etiq in les_etiquettes" v-bind:value="etiq.id">{{ etiq.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label" >Nbr étiquette barquette</label>
                        <input v-model="produitfini.nbretiq" type="number" class="form-control"  placeholder="Nbr étiquette barquette">
                    </div>

					<div class="mb-3">
                        <label class="form-label">Etiquette colis</label>
                        <select v-model="produitfini.etiq2_id" class="form-control" >
                            <option disabled >Choisir Etiquette colis...</option>
                            <option v-for="etiq2 in les_etiquettes" v-bind:value="etiq2.id">{{ etiq2.name }}</option>
                        </select>
                    </div>

					<div class="mb-3">
                        <label class="form-label" >Nbr étiquette colis</label>
                        <input v-model="produitfini.nbretiq2" type="number" class="form-control"  placeholder="Nbr étiquette colis">
                    </div>

                    <div class="mb-3 d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" name="cancel_btn" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-10">
            <div class="col-12">
                <h2>Liste des groupes d'article</h2>
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
							<th scope="col">Culture</th>
							<th scope="col">Colis</th>
                            <th scope="col">Pds Col</th>
							<th scope="col">Barq.</th>
                            <th scope="col">Couv.</th>
							<th scope="col">Pds brq</th>
							<th scope="col">Nbr brq</th>

							<th scope="col">Etiq. B</th>
							<th scope="col">Nbr Etiq. B</th>
							<th scope="col">Etiq. C</th>
							<th scope="col">Nbr Etiq. C</th>
                            <th scope="col">Stab.</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r in produitsfinis" v-bind:key="r.id" v-if="produitsfinis.length>0">
							<td>{{ r.id }}</td>
                            <td>{{ r.name }}</td>
							<td>{{ r.culture?.name }}</td>
							<td>{{ r.colis?.name }}</td>
							<td>{{ r.pdscolis }} Kg</td>
                            <td>{{ r.barquette?.name}}</td>
                            <td>{{ r.couvercle?.name}}</td>
							<td>{{ r.pdsbrqtt }}</td>
							<td>{{ r.nbrbrqtt }}</td>

							<td>{{ r.etiquette?.name }}</td>
							<td>{{ r.nbretiq }}</td>
							<td>{{ r.etiquette2?.name }}</td>
							<td>{{ r.nbretiq2 }}</td>
                            <td>{{ r.stabilisateur?.name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <button @click="edit(r)" type="button" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button @click="remove(r)" type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-else> <td colspan="15">No records found </td></tr>
                    </tbody>
                </table>

            </div>
        </div>
	</div>
</div>

</template>

<script>
import axios from 'axios';

export default{
    data(){
        return{
            cancel_btn:false,
            produitsfinis:[],
            cultures:[],
            articles:[],
            produitfini:{
                id:'',
                name:'',
				culture_id:'',
				colis_id:'',
				pdscolis:'',
				brqtt_id:'',
				nbrbrqtt:'',
				pdsbrqtt:'',
				couv_id:'',
				stab_id:'',
				divstab:'',
				etiq_id:'',
				nbretiq:'',
				etiq2_id:'',
				nbretiq2:'',
            },
            group_colis:[1,2,3,18,21,22,23],
            group_barquettes:[5,12,13],
            group_etiquettes:[10,11],
        }
    },
    computed: {
        les_colis() {
            return this.articles.filter(article => this.group_colis.includes(article.group_id));
        },
        les_barquettes() {
            return this.articles.filter(article => this.group_barquettes.includes(article.group_id));
        },
        les_couvercles() {
            return this.articles.filter(article => article.group_id === 6);
        },
        les_etiquettes() {
            return this.articles.filter(article => this.group_etiquettes.includes(article.group_id));
        },
        les_stabilisateur() {
            return this.articles.filter(article => article.group_id === 14);
        },
    },

    created(){
        this.loadArticles();
        this.LoadCultures();
        this.loadProduitfini();
    },

    mounted(){


    },

    methods:{
        resetForm(){
            this.produitfini={
                id:'',
                    name:'',
                    culture_id:'',
                    colis_id:'',
                    pdscolis:'',
                    brqtt_id:'',
                    nbrbrqtt:'',
                    pdsbrqtt:'',
                    couv_id:'',
                    stab_id:'',
                    divstab:'',
                    etiq_id:'',
                    nbretiq:'',
                    etiq2_id:'',
                    nbretiq2:'',
            };
            this.cancel_btn=false;
        },

		LoadCultures()
        {
            axios.get("http://127.0.0.1:8000/api/culture")
                .then(({data})=>{
                        this.cultures=data;
                    })
                .catch(error => {
                    console.error(error);
                });
        },

        loadProduitfini()
        {
            axios.get("http://127.0.0.1:8000/api/produitfini")
                .then(({data})=>{
                        this.produitsfinis=data.produitsfinis;
                })
                .catch(error => {
                    console.error(error);
                    });
        },
		getProduitfiniOf(){
            var cid = this.produitfini.culture_id;
            axios.get("http://127.0.0.1:8000/api/produitfiniOf?culture="+cid)
                .then(({data})=>{
                        this.produitsfinis=data.produitsfinis;
                })
                .catch(error => {
                    console.error(error);
                    });
        },

        loadArticles()
        {
            axios.get("http://127.0.0.1:8000/api/article")
                .then(({data})=>{
                    this.articles=data.articles;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        save()
        {
            if(this.produitfini.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },

        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/produitfini",this.produitfini)
                .then(()=>{
                        alert("produit fini ajouté avec success !");
                        this.loadProduitfini();
                        this.resetForm();
                    });

        },

        edit(r){
            this.produitfini=r;
            this.cancel_btn=true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/produitfini/"+this.produitfini.id,this.produitfini)
                .then(()=>{
                        alert("produit fini modifié avec success !");
                        this.loadProduitfini();
                        this.resetForm();
                    });
        },

        remove(r){
            axios.delete("http://127.0.0.1:8000/api/produitfini/"+r.id)
                .then(()=>{
                    alert("produit fini supprimé avec success !");
                    this.loadProduitfini();
                });
        },

    }
}
</script>
