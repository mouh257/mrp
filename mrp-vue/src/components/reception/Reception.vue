
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
                            <select v-model="reception.ferme_id" class="form-control" @change="getCulturesOf()">
                                <option disabled  >Choisir ...</option>
                                <option v-for="f in fermes" v-bind:value="f.id">{{ f.producteur.ref }} - {{ f.name }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Culture</label>
                            <select v-model="reception.culture_id" class="form-control" @change="getVarietesIn();getVersementOf()">
                                <option disabled >Choisir ...</option>
                                <option v-for="cult in cultures" v-bind:value="cult.id">{{ cult.name }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >Versement</label>
                            <input v-model="reception.versement" type="number" class="form-control" disabled placeholder="N° du versement">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Variété</label>
                            <select v-model="reception.variete_id" class="form-control">
                                <option disabled >Choisir ...</option>
                                <option v-for="vart in varietes" v-bind:value="vart.id">{{ vart.name }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >N°BL</label>
                            <input v-model="reception.nbl" type="number"  class="form-control"  placeholder="Bon de livraison">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >N°BR</label>
                            <input v-model="reception.nbr" type="number"  class="form-control"  placeholder="Bon de réception">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Nbr de caisse</label>
                            <input v-model="reception.nbrcaisse" type="number" class="form-control" placeholder="Nbr de caisse">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >Poids brut</label>
                            <input v-model="reception.pdsbrut" type="number" min="10" max="20000" step="0.5"  class="form-control"  placeholder="Poids brut">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" >Poids Net</label>
                            <input v-model="reception.pdsnet" type="number" min="1" max="15000" step="0.01" class="form-control"  placeholder="Poids Net">
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
                    <h2>Liste des réceptions</h2>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Ferme</th>
                            <th scope="col">Culture</th>
                            <th scope="col">Variété</th>
                            <th scope="col">Versement</th>
                            <th scope="col">Poids Net</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="s in receptions" v-bind:key="s.id" v-if="receptions.length >0">

                            <td>{{ s.ferme.name }}</td>
                            <td>{{ s.culture.name }}</td>
                            <td>{{ s.variete.name }}</td>
                            <td>{{ s.versement }}</td>
                            <td>{{ parseFloat(s.pdsnet) }} kg</td>
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
            receptions:[],
            fermes:[],
            cultures:[],
            varietes:[],

            reception:{
                id:'',
                ferme_id:'',
                culture_id:'',
                variete_id:'',
                versement:'',
                nbrcaisse:'',
                nbl:'',
                nbr:'',
                pdsbrut:'',
                pdsnet:'',
            },

        }
    },
    computed: {
        singleVariete() {
            return this.varietes.length === 1 ? this.varietes[0].id : null;
        },

    },
    watch: {
        singleVariete(newVal) {
            if (newVal) {
                this.reception.variete_id = newVal;
            }
        }
    },
    created() {
        if (this.singleVariete) {
            this.reception.variete_id = this.singleVariete;
        }
    },
    mounted(){
        this.LoadFermes();
        this.LoadReceptions();
    },
    methods:{
        resetForm()
        {
            this.reception ={
                id:'',
                ferme_id:'',
                culture_id:'',
                variete_id:'',
                versement:'',
                nbrcaisse:'',
                nbl:'',
                nbr:'',
                pdsbrut:'',
                pdsnet:'',
            };
            this.cancel_btn= false;
        },

        LoadReceptions()
        {
            axios.get("http://127.0.0.1:8000/api/reception")
                .then(({data})=>{
                    this.receptions=data.receptions;
                });
        },

        LoadFermes()
        {
            axios.get("http://127.0.0.1:8000/api/ferme")
                .then(({data})=>{
                    this.fermes=data.fermes;
                });
        },

        getCulturesOf(){
            var fid = this.reception.ferme_id;
            axios.get("http://127.0.0.1:8000/api/culturesOf?ferme="+fid)
                .then(({data})=> {
                    this.cultures = data.cultures;
                })
                .catch(error => {
                            console.error(error);
                });
        },

        getVersementOf(){
            var fid = this.reception.ferme_id;
            var cid = this.reception.culture_id;

            const selectedItem = this.cultures.find(item => item.id === cid);

            axios.get("http://127.0.0.1:8000/api/versementOf?ferme="+fid+"&culture="+cid)
                .then(({data})=>{
                    if(data.versement==null)
                        this.reception.versement=selectedItem?.verstart;
                    else
                        this.reception.versement=data.versement;
                    //console.log(data);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        getVarietesIn(){
            var fid = this.reception.ferme_id;
            axios.get("http://127.0.0.1:8000/api/varietesIn?ferme="+fid)
                .then(({data})=>{
                    this.varietes=data.varietes;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        save()
        {
            if(this.reception.id==='')
            {
                this.saveNew();
            }else{
                this.updateData();
            }

        },

        saveNew()
        {
            axios.post("http://127.0.0.1:8000/api/reception",this.reception)
                .then(()=>{
                    alert("Réception ajoutée avec success !");
                    this.LoadReceptions();
                    this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                });

        },

        edit(r){
            this.reception=r;
            this.cancel_btn= true;
        },

        updateData(){
            axios.put("http://127.0.0.1:8000/api/reception/"+this.reception.id,this.reception)
                .then(()=>{
                        alert("Réception modifiée avec success !");
                        this.LoadReceptions();
                        this.resetForm();
                })
                .catch(error => {
                    console.error(error);
                    });
        },

        remove(r){
            axios.delete("http://127.0.0.1:8000/api/reception/"+r.id)
                .then(()=>{
                    alert("Réception supprimée avec success !");
                    this.LoadReceptions();
                })
                .catch(error => {
                    console.error(error);
                });
        },
    }
};
</script>
