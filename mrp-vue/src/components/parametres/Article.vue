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
                        <label class="form-label">Groupe d'article</label>
                        <select v-model="article.group_id" class="form-control" @change="getArticlesOf()">
                            <option disabled selected  >Choisir ...</option>
                            <option v-for="grp in groupes" v-bind:value="grp.id">{{ grp.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom </label>
                        <input v-model="article.name" type="text" class="form-control"  placeholder="Saisir le nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >stock min.</label>
                        <input v-model="article.stockmin" type="number" class="form-control"  placeholder="minimum stock " >
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nbr/pal</label>
                        <input v-model="article.nbrppal" type="text" class="form-control"  placeholder="nbr par palette">
                    </div>
					<div class="mb-3">
                        <label class="form-label">Unité</label>
                        <select v-model="article.unite" class="form-control">
                            <option selected value="unites">Unités</option>
                            <option value="litres">Litres</option>
							<option value="metres">Metres</option>
							<option value="kg">Kg</option>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" v-show="cancel_btn" @click="resetForm()" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-9">
            <div class="col-12">
                <h2>Liste des groupes d'article</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
							<th scope="col">Stock min</th>
							<th scope="col">Nbr/pal</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r in articles" v-bind:key="r.id">
							<td>{{ r.id }}</td>
                            <td>{{ r.name }}</td>
							<td>{{ r.stockmin }}</td>
							<td>{{ r.nbrppal }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(r)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(r)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
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
            articles:[],
            groupes:[],
            article:{
                id:'',
                name:'',
				group_id:'',
				stockmin:'',
				nbrppal:'',
				unite:''
            },
            cancel_btn:false,

        }
    },
    created(){

    },
    mounted(){
        this.loadArticles();
        this.loadGroupedarticle();
    },
    methods:{
        resetForm(){
            this.article={
                    id:'',
                    name:'',
                    group_id:'',
                    stockmin:'',
                    nbrppal:'',
                    unite:''
                };
            this.cancel_btn=false;
        },
        loadGroupedarticle()
        {
            axios.get("http://127.0.0.1:8000/api/groupedarticle")
                .then(({data})=>{
                        this.groupes=data;
                })
                .catch(error => {
                    console.error(error);
                    });
        },
        loadArticles()
        {
            axios.get("http://127.0.0.1:8000/api/article")
                .then(
                    ({data})=>{
                        this.articles=data.articles;
                    })
                .catch(error => {
                    console.error(error);
                    });
        },
        getArticlesOf()
        {
            var gid=this.article.group_id;
            axios.get("http://127.0.0.1:8000/api/articlesOf?groupe="+gid)
                .then(
                    ({data})=>{
                        this.articles=data.articles;
                    })
                .catch(error => {
                    console.error(error);
                });
        },
        save()
        {
            if(this.article.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
                this.cancel_btn=true;
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/article",this.article)
                .then(()=>{
                        alert("Article ajouté avec success !");
                        this.loadArticles();
                        this.resetForm();
                    });

        },
        edit(r){
            this.article=r;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/article/"+this.article.id,this.article)
                .then(()=>{
                        alert("Article modifié avec success !");
                        this.loadArticles();
                        this.resetForm();
                    });
        },
        remove(r){
            axios.delete("http://127.0.0.1:8000/api/article/"+r.id)
                .then(()=>{
                alert("Article supprimé avec success !");
                this.loadArticles();
            });
        },
    }
}
</script>
