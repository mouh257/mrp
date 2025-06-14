
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
                        <label class="form-label">Producteur
                        <select name="producteur_id" v-model="ferme.producteur_id" class="form-control" @change="getFermesOf()" >
                            <option v-for="pro in producteurs" v-bind:value="pro.id">{{ pro.ref }} - {{ pro.name }}</option>
                        </select>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom ferme
                        <input name="name" v-model="ferme.name" type="text" class="form-control"  placeholder="Saisir le nom">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Adresse
                        <input name="adresse" v-model="ferme.adresse" type="text" class="form-control"  placeholder="Saisir l'adresse " >
                        </label>
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" v-show="cancel_btn"  @click="resetForm()"  class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-9">
            <div class="col-12">
                <h2>Liste des fermes</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Producteur</th>
                            <th scope="col">Ferme</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ferme in fermes" v-bind:key="ferme.id" >
                            <td>{{ ferme.producteur.name }}</td>
                            <td>{{ ferme.name }}</td>
                            <td>{{ ferme.adresse }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <button @click="edit(ferme)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                <button @click="remove(ferme)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
import {onMounted,ref} from "vue";
export default{
    data(){
        return {
            ferme: {
                id: '',
                name: '',
                producteur_id: '',
                adresse: ''
            },
            producteurs: [],
            fermes: [],
            cancel_btn: false,
        };
    },
    mounted(){
        this.LoadProducteurs();
        this.LoadFermes();
    },

    methods:{
        LoadProducteurs()
        {
            axios.get("http://127.0.0.1:8000/api/producteur")
                .then(({data})=>{
                        this.producteurs=data;
                    });
        },

        LoadFermes()
        {
            axios.get("http://127.0.0.1:8000/api/ferme")
                .then(({data})=>{
                        this.fermes=data.fermes;
                    });
        },

        getFermesOf(){

            var pid = this.ferme.producteur_id;
            axios.get("http://127.0.0.1:8000/api/fermesOf?producteur="+pid)
                .then(({data})=>{
                        this.fermes=data.fermes;
                    });
        },
        save()
        {
            if(this.ferme.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/ferme",this.ferme)
                .then(()=>{
                        alert("Ferme ajoutée avec success !");
                        this.LoadFermes();
                        this.resetForm();
                    });

        },
        edit(f){
            this.ferme=f; // {...f}
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/ferme/"+this.ferme.id,this.ferme)
                .then(()=>{
                        alert("Ferme modifiée avec success !");
                        this.LoadFermes();
                        this.resetForm();
                        this.cancel_btn= false;
                    });
        },
        remove(f){
            axios.delete("http://127.0.0.1:8000/api/ferme/"+f.id)
                .then(()=>{
                    alert("Ferme supprimée avec success !");
                    this.LoadFermes();
                });
        },

        resetForm() {
            this.ferme = {
                id: '',
                name: '',
                producteur_id: '',
                adresse: ''
            };
            this.cancel_btn= false;
        },
    }
};
</script>
