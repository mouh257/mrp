
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
                        <label class="form-label">Culture</label>
                        <select v-model="variete.culture_id" class="form-control" @change="getVarietesOf()">
                            <option disabled >Choisir ...</option>
                            <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom Variété</label>
                        <input v-model="variete.name" type="text" class="form-control"  placeholder="Saisir le nom">
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
                <h2>Liste des variétés</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Culture</th>
                            <th scope="col">Variété</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="v in varietes" v-bind:key="v.id" v-if="varietes.length >0">
                            <td>{{ v.id }}</td>
                            <td>{{ v.culture.name }}</td>
                            <td>{{ v.name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(v)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(v)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
            cancel_btn: false,
            varietes:[],
            cultures:[],
            variete:{
                id:'',
                name:'',
                culture_id:''
            },
        };
    },
    mounted(){
        this.LoadCultures();
        this.LoadVarietes();
    },
    methods:{
        resetForm() {
            this.cancel_btn= false;
            this.variete = {
                id: '',
                name: '',
                culture_id: '',
            };
        },

        LoadCultures()
        {
            axios.get("http://127.0.0.1:8000/api/culture")
                .then(({data})=>{
                        this.cultures=data;
                    });
        },

        LoadVarietes()
        {
            axios.get("http://127.0.0.1:8000/api/variete")
                .then(({data})=>{
                        this.varietes=data.varietes;
                    }
                );
        },
        getVarietesOf(){
            var cid = this.variete.culture_id;
            axios.get("http://127.0.0.1:8000/api/varietesOf?culture="+cid)
                .then(({data})=>{
                    this.varietes=data.varietes;
                });
        },
        save()
        {
            if(this.variete.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/variete",this.variete)
                .then(()=>{
                        alert("Variété ajoutée avec success !");
                        this.LoadVarietes();
                        this.resetForm();
                    });
        },
        edit(v){
            this.variete=v;
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/variete/"+this.variete.id,this.variete)
                .then(()=>{
                        alert("Variété modifiée avec success !");
                        this.LoadVarietes();
                        this.resetForm();
                        this.cancel_btn= false;
                    });
        },
        remove(v){
            axios.delete("http://127.0.0.1:8000/api/variete/"+v.id)
                .then(()=>{
                alert("Variété supprimée avec success !");
                this.LoadVarietes();
            });
        },
    }
};
</script>
