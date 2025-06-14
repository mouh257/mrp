
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
                        <label class="form-label">Ferme</label>
                        <select v-model="serre.ferme_id" class="form-control" @change="getSerresOf()">
                            <option disabled  >Choisir ...</option>
                            <option v-for="f in fermes" v-bind:value="f.id">{{ f.producteur.ref }} - {{ f.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Nom Serre</label>
                        <input v-model="serre.name" type="text" class="form-control"  placeholder="Saisir le nom">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" >Superficie</label>
                        <input v-model="serre.superficie" type="number" min="0.3" max="99" step="0.01"  class="form-control"  placeholder="Superficie en ha">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Culture</label>
                        <select v-model="serre.culture_id" class="form-control" @change="getVarietesOf()">
                            <option disabled >Choisir ...</option>
                            <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Variété</label>
                        <select v-model="serre.variete_id" class="form-control" >
                            <option disabled >Choisir ...</option>
                            <option v-for="vart in varietes" v-bind:value="vart.id" >{{ vart.name }}</option>
                        </select>
                    </div>

                    <div class="mb-3d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-9">
            <div class="col-12">
                <h2>Liste des serres</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>

                            <th scope="col">Ferme</th>
                            <th scope="col">Serre</th>
                            <th scope="col">superficie</th>
                            <th scope="col">Culture</th>
                            <th scope="col">Variété</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="s in serres" v-bind:key="s.id" v-if="serres.length >0">

                            <td>{{ s.ferme.name }}</td>
                            <td>{{ s.name }}</td>
                            <td>{{ s.superficie }} ha</td>
                            <td>{{ s.culture.name }}</td>
                            <td>{{ s.variete.name }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button @click="edit(s)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                    <button @click="remove(s)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr v-else> <td colspan="7">No records found </td></tr>
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
            serres:[],
            fermes:[],
            cultures:[],
            varietes:[],
            serre:{
                id:'',
                name:'',
                superficie:'',
                ferme_id:'',
                culture_id:'',
                variete_id:''
            },

        }
    },
    computed: {
        singleVariete() {
            return this.varietes.length === 1 ? this.varietes[0].id : null;
        }
    },
    watch: {
        singleVariete(newVal) {
            if (newVal) {
                this.serre.variete_id = newVal;
            }
        }
    },
    created() {
        if (this.singleVariete) {
            this.serre.variete_id = this.singleVariete;
        }
    },
    mounted(){
        this.LoadFermes();
        this.LoadSerres();
        this.LoadCultures();
    },
    methods:{
        resetForm(){
           this.serre={
                id:'',
                    name:'',
                    superficie:'',
                    ferme_id:'',
                    culture_id:'',
                    variete_id:''
            };
            this.cancel_btn= false;
        },
        LoadSerres()
        {
            axios.get("http://127.0.0.1:8000/api/serre")
                .then(({data})=>{
                    this.serres=data.serres;
                });
        },
        LoadFermes()
        {
            axios.get("http://127.0.0.1:8000/api/ferme")
                .then(({data})=>{
                        this.fermes=data.fermes;
                    });
        },
        LoadCultures()
        {
            axios.get("http://127.0.0.1:8000/api/culture")
                .then(({data})=>{
                        this.cultures=data;
                    });
        },

        getVarietesOf(){
            var cid = this.serre.culture_id;
            axios.get("http://127.0.0.1:8000/api/varietesOf?culture="+cid)
                .then(({data})=>{
                    this.varietes=data.varietes;
                });
        },
        getSerresOf(){
            var fid = this.serre.ferme_id;
            axios.get("http://127.0.0.1:8000/api/serresOf?ferme="+fid)
                .then(({data})=>{
                    this.serres=data.serres;
                });
        },
        save()
        {
            if(this.serre.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/serre",this.serre)
                .then(()=>{
                        alert("Serre ajoutée avec success !");
                        this.LoadSerres();
                        this.resetForm();
                    });

        },
        edit(s){
            this.serre=s;
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/serre/"+this.serre.id,this.serre)
                .then(()=>{
                        alert("Serre modifiée avec success !");
                        this.LoadSerres();
                        this.resetForm();
                    }
                );
        },
        remove(s){
            axios.delete("http://127.0.0.1:8000/api/serre/"+s.id)
                .then(()=>{
                    alert("Serre supprimée avec success !");
                    this.LoadSerres();
                });
        },
    }
};
</script>
