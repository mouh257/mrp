
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
                        <select v-model="coloration.culture_id" class="form-control" @change="getColorationsOf()">
                            <option disabled >Choisir ...</option>
                            <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Coloration</label>
                        <input v-model="coloration.name" type="text" class="form-control"  placeholder="Saisir la coloration">
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
                <h2>Liste des Colorations</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Culture</th>
                            <th scope="col">Coloration</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="v in colorations" v-bind:key="v.id">
                            <td>{{ v.culture.name }}</td>
                            <td>{{ v.name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(v)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(v)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
            colorations:[],
            cultures:[],
            coloration:{
                id:'',
                name:'',
                culture_id:''
            }
        }
    },
    created(){

    },
    mounted(){
        this.LoadCultures();
        this.LoadColorations();
    },
    methods:{
        resetForm(){
            this.coloration={
                        id:'',
                        name:'',
                        culture_id:''
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

        LoadColorations()
        {
            axios.get("http://127.0.0.1:8000/api/coloration")
                .then(({data})=>{
                        this.colorations=data.colorations;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getColorationsOf(){
            var cid = this.coloration.culture_id;
            axios.get("http://127.0.0.1:8000/api/colorationsOf?culture="+cid)
                .then(({data})=>{
                    this.colorations=data.colorations;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        save()
        {
            if(this.coloration.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
                this.cancel_btn=true;
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/coloration",this.coloration)
                .then(()=>{
                        alert("Coloration ajoutée avec success !");
                        this.LoadColorations();
                        this.resetForm();
                    });

        },
        edit(v){
            this.coloration=v;
            this.cancel_btn= true;
        },
        cancelEditing(){
            this.coloration='';
            this.id='';
            this.cancel_btn= false;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/coloration/"+this.coloration.id,this.coloration)
                .then(
                    ({data})=>{
                        alert("Coloration modifiée avec success !");
                        this.LoadColorations();
                        this.resetForm();
                    }
                );
        },
        remove(v){
            axios.delete("http://127.0.0.1:8000/api/coloration/"+v.id)
                .then(()=>{
                    alert("Coloration supprimée avec success !");
                    this.LoadColorations();
            });

        },
    }
};
</script>
