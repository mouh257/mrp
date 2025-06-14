
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
                        <select v-model="calibre.culture_id" class="form-control" @change="getCalibresOf()">
                            <option disabled >Choisir ...</option>
                            <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom Calibre</label>
                        <input v-model="calibre.name" type="text" class="form-control"  placeholder="Saisir le nom">
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
                <h2>Liste des Calibres</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Culture</th>
                            <th scope="col">Calibre</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="v in calibres" v-bind:key="v.id">
                            <td>{{ v.culture.name }}</td>
                            <td>{{ v.name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(v)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(v)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <tr v-if="calibres?.length<=0"><td colspan="3"> No records found !</td></tr>
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
            cultures:[],
            calibres:[],
            calibre:{
                id:'',
                name:'',
                culture_id:''
            },
            cancel_btn: false,
        }
    },
    created(){

    },
    mounted(){
        this.LoadCultures();
        this.LoadCalibres();
    },
    methods:{
        resetForm(){
            this.calibre={
                    id:'',
                    name:'',
                    culture_id:''
                };
            this.cancel_btn= false;
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

        LoadCalibres()
        {
            axios.get("http://127.0.0.1:8000/api/calibre")
                .then(({data})=>{
                        this.calibres=data.calibres;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getCalibresOf(){
            var cid = this.calibre.culture_id;
            axios.get("http://127.0.0.1:8000/api/calibresOf?culture="+cid)
                .then(({data})=>{
                    this.calibres=data.calibres;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        save()
        {
            if(this.calibre.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
                this.cancel_btn=true;
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/calibre",this.calibre)
                .then(()=>{
                        alert("Calibre ajoutée avec success !");
                        this.LoadCalibres();
                        this.resetForm();
                    });

        },
        edit(v){
            this.calibre=v;
            this.cancel_btn= true;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/calibre/"+this.calibre.id,this.calibre)
                .then(()=>{
                        alert("Calibre modifiée avec success !");
                        this.LoadCalibres();
                        this.resetForm();
                    }
                );
        },
        remove(v){
            axios.delete("http://127.0.0.1:8000/api/calibre/"+v.id)
                .then(()=>{
                    alert("Calibre supprimée avec success !");
                    this.LoadCalibres();
                });
        },
    }
};
</script>
