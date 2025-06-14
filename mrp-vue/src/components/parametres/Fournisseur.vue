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
                        <label class="form-label" >Nom fournisseur</label>
                        <input v-model="fournisseur.name" type="text" class="form-control"  placeholder="Saisir le nom">
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
                <h2>Liste des fournisseurs</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r in fournisseurs" v-bind:key="r.id">
                            <td>{{ r.id }}</td>
                            <td>{{ r.name }}</td>
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
    name:'Fournisseur',
    data(){
        return{
            fournisseurs:[],
            fournisseur:{
                id:'',
                name:''
            },
            cancel_btn:false,
        }
    },
    created(){

    },
    mounted(){
        this.LoadFournisseurs();
    },
    methods:{
        resetForm(){
            this.fournisseur={id:'', name:''};
            this.cancel_btn=false;
        },
        LoadFournisseurs()
        {
            axios.get("http://127.0.0.1:8000/api/fournisseur")
                .then(({data})=>{
                        this.fournisseurs=data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        save()
        {
            if(this.fournisseur.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();

            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/fournisseur",this.fournisseur)
                .then(()=>{
                        alert("Fournisseur ajouté avec success !");
                        this.LoadFournisseurs();
                        this.resetForm();
                    });

        },
        edit(f){
            this.fournisseur=f;
            this.cancel_btn=true;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/fournisseur/"+this.fournisseur.id,this.fournisseur)
                .then(()=>{
                        alert("fournisseur modifié avec success !");
                        this.LoadFournisseurs();
                        this.resetForm();
                    });
        },
        remove(f){
            axios.delete("http://127.0.0.1:8000/api/fournisseur/"+f.id)
                .then(()=>{
                    alert("fournisseur supprimé avec success !");
                    this.LoadFournisseurs();
                });
        },
    }
}
</script>
