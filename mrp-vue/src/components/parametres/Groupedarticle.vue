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
                        <label class="form-label" >Nom</label>
                        <input v-model="groupedarticle.name" type="text" class="form-control"  placeholder="Saisir le nom">
                    </div>

                    <div class="mb-3">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" id="cancel_btn" style="display: none;" class="btn btn-secondary">Annuler</button>
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
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r in result" v-bind:key="r.id">
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
    name:'groupedarticle',
    data(){
        return{
            result:{},
            groupedarticle:{
                id:'',
                name:'',
            },
        }
    },
    created(){
        this.loadGroupedarticle();
    },
    mounted(){
        console.log("mounted ...");
    },
    methods:{
        loadGroupedarticle()
        {
            var page="http://127.0.0.1:8000/api/groupedarticle";
            axios.get(page)
                .then(
                    ({data})=>{
                        this.result=data;
                    }
                );
        },
        save()
        {
            if(this.groupedarticle.id=='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/groupedarticle",this.groupedarticle)
                .then(
                    ({data})=>{
                        alert("groupe d'article ajouté avec success !");
                        this.loadGroupedarticle();
                        this.groupedarticle.name='';
                        this.id='';
                    }
                );

        },
        edit(pro){
            this.groupedarticle=pro;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/groupedarticle/"+this.groupedarticle.id,this.groupedarticle)
                .then(
                    ({data})=>{
                        alert("groupe d'article Modifié avec success !");
                        this.loadGroupedarticle();
                        this.groupedarticle.name='';
                        this.id='';
                    }
                );
        },
        remove(pro){
            axios.delete("http://127.0.0.1:8000/api/groupedarticle/"+pro.id);
            alert("groupe d'article supprimé avec success !");
            this.loadGroupedarticle();
        },
    }
}
</script>
