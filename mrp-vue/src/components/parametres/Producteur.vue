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
                        <label class="form-label" >Référence</label>
                        <input v-model="producteur.ref" type="text" class="form-control"  placeholder="Saisir un code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom</label>
                        <input v-model="producteur.name" type="text" class="form-control"  placeholder="Saisir le nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >GGN</label>
                        <input v-model="producteur.ggn" type="text" class="form-control"  placeholder="Saisir le ggn " >
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" id="cancel_btn" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-9">
            <div class="col-12">
                <h2>Liste des producteurs</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Réf.</th>
                            <th scope="col">Nom</th>
                            <th scope="col">GGN</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="producteur in producteurs" v-bind:key="producteur.id">
                            <td>{{ producteur.id }}</td>
                            <td>{{ producteur.ref }}</td>
                            <td>{{ producteur.name }}</td>
                            <td>{{ producteur.ggn }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(producteur)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(producteur)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
            cancel_btn: false,
            producteurs:[],
            producteur:{
                id:'',
                name:'',
                ref:'',
                ggn:''
            },
        }
    },
    mounted(){
        this.LoadProducteurs();
    },
    methods:{
        resetForm(){
            this.cancel_btn=false;
            this.producteur={
                id:'',
                name:'',
                ref:'',
                ggn:''
            };
        },

        LoadProducteurs()
        {
            axios.get("http://127.0.0.1:8000/api/producteur")
                .then(({data})=>{
                        this.producteurs=data;
                    });
        },
        save()
        {
            if(this.producteur.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/producteur",this.producteur)
                .then(
                    ({data})=>{
                        alert("Producteur ajouté avec success !");
                        this.LoadProducteurs();
                        this.resetForm();
                    });

        },
        edit(pro){
            this.producteur=pro;
            this.cancel_btn=true;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/producteur/"+this.producteur.id,this.producteur)
                .then(
                    ({data})=>{
                        alert("Producteur Modifié avec success !");
                        this.LoadProducteurs();
                        this.resetForm();
                    });
        },
        remove(pro){
            axios.delete("http://127.0.0.1:8000/api/producteur/"+pro.id).then(()=>{
                alert("Producteur supprimé avec success !");
                this.LoadProducteurs();
            });
        },
    }
}
</script>
