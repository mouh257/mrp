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
                        <label>Culture
                            <input v-model="culture.name" type="text" class="form-control"  placeholder="Saisir le nom " >
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Debut Versement
                            <input v-model="culture.verstart" type="number" class="form-control"  placeholder="Commence de" >
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Fin Versement
                            <input v-model="culture.versend" type="number" class="form-control"  placeholder="Finis à">
                        </label>
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="submit" id="submit_btn"  class="btn btn-primary">Enregistrer</button>
                        <button type="button" name="cancel_btn" v-show="cancel_btn"  @click="resetForm()" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

         <div class="col-9">
            <div class="col-12">
                <h2>Liste des cultures</h2>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Culture</th>
                            <th scope="col">Debut Versement.</th>
                            <th scope="col">Fin Versement.</th>
                            <th scope="col">Actions</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr v-for="culture in cultures" v-bind:key="culture.id">
                            <td>{{ culture.id }}</td>
                            <td>{{ culture.name }}</td>
                            <td>{{ culture.verstart }}</td>
                            <td>{{ culture.versend }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <button @click="edit(culture)" type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                                <button @click="remove(culture)" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
            cultures: [],
            cancel_btn: false,
            culture:{
                id:'',
                name:'',
                verstart:'',
                versend:''
            },
        };
    },

    mounted(){
        this.LoadCultures();
    },
    methods:{
        resetForm(){
            this.culture = {
                id: '',
                name: '',
                verstart: '',
                versend: ''
            };
            this.cancel_btn= false;
        },
        LoadCultures()
        {
            axios.get("http://127.0.0.1:8000/api/culture")
                .then(({data})=>{
                        this.cultures=data;
                    }
                );
        },
        save()
        {
            if(this.culture.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },
        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/culture",this.culture)
                .then(({data})=>{
                        alert("Culture ajoutée avec success !");
                        this.LoadCultures();
                        this.resetForm();
                    }
                );

        },
        edit(cult){
            this.culture=cult;
            this.cancel_btn= true;
        },
        updateData(){
            axios.put("http://127.0.0.1:8000/api/culture/"+this.culture.id,this.culture)
                .then(({data})=>{
                        alert("Culture modifiée avec success !");
                        this.LoadCultures();
                        this.resetForm();
                    }
                );
        },
        remove(cult){
            axios.delete("http://127.0.0.1:8000/api/culture/"+cult.id)
                .then(()=>{
                    alert("Culture supprimée avec success !");
                    this.LoadCultures();
                });
        },
    }
}
</script>
