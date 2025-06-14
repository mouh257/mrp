
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
                            <label class="form-label" >Versement</label>
                            <input v-model="ecart.versement" type="number" disabled class="form-control" placeholder="Versement">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >Poids écart</label>
                            <input v-model="ecart.pdsecart" type="number" min="1" max="999" step="0.05" class="form-control"  placeholder="Poids écart">
                        </div>

                        <div class="mb-3d-flex justify-content-around">
                            <button type="submit" v-show="submit_btn"  class="btn btn-primary">Enregistrer</button>
                            <button type="button" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-9">
                <div class="col-12">
                    <h2>Liste des écarts</h2>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Versement</th>
                            <th scope="col">Poids réception</th>
                            <th scope="col">Poids écart</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="s in ecarts" v-bind:key="s.id" v-if="ecarts.length >0">

                            <td>{{ s.versement }}</td>
                            <td>{{ parseFloat(s.pdsnet) }}  Kg</td>
                            <td>{{ isNaN(parseFloat(s.pdsecart)) ? '0' : parseFloat(s.pdsecart) + 'Kg' }}</td>

                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(s)" v-if="s.id" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="add(s)" v-else type="button" class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                    <button @click="remove(s)" v-if="s.id" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr v-else> <td colspan="4">No records found </td></tr>
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
            submit_btn: false,
            cancel_btn: false,
            isEditing:false,
            ecarts:[],

            ecart:{
                id:'',
                versement:'',
                pdsecart:'',
            },

        }
    },
    mounted(){
        this.LoadEcarts();
    },
    methods:{
        resetForm(){
            this.ecart ={
                id:'',
                versement:'',
                pdsecart:'',

            };
            this.cancel_btn= false;
            this.submit_btn= false;
            this.isEditing=false;
        },

        LoadEcarts()
        {
            axios.get("http://127.0.0.1:8000/api/ecart")
                .then(({data})=>{
                    this.ecarts=data.ecarts;

                }).catch(error => {
                    console.error(error);
                });
        },

        save()
        {
            if(this.ecart.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },

        saveNew()
        {
            if (!this.ecart.versement) {
                alert("Please provide a versement value.");
                return;
            }

            axios.post("http://127.0.0.1:8000/api/ecart",this.ecart)
                .then(()=>{
                    alert("écart ajouté avec success !");
                    this.LoadEcarts();
                    this.resetForm();
                }).catch(error => {
                    console.error("Error saving new ecart:", error);
                });

        },

        add(s){
            this.ecart.versement=s.versement;
            this.cancel_btn= true;
            this.submit_btn= true;
        },

        edit(s){
            this.ecart=s;
            this.cancel_btn= true;
            this.submit_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/ecart/"+this.ecart.id,this.ecart)
                .then(()=>{
                        alert("écart modifié avec success !");
                        this.LoadEcarts();
                        this.resetForm();
                }).catch(error => {
                    console.error("Error updating ecart:", error);
                });
        },
        remove(s){
            axios.delete("http://127.0.0.1:8000/api/ecart/"+s.id)
                .then(()=>{
                    alert("écart supprimé avec success !");
                    this.LoadEcarts();
                }).catch(error => {
                    console.error("Error deleting ecart:", error);
                });
        },
    }
};
</script>
