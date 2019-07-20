<template>
    <div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">E-mail</th>
                <th scope="col">Number</th>
                <th></th>
                <th scope="col">Modify</th>
            </tr>
                <tr v-for="(user,index) in Datausers">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.lname}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.phone}}</td>
                    <td>{{user.password}}</td>
                    <td>
                        <button  @click="gotoviewdata(user.id)"  class="btn btn-info" >View Data </button>
                        <button  @click="gotoEdit(user.id)"  class="btn btn-warning" >Edit Data</button>
                        <button  v-on:click="destroyhahaha(user.id,index)"  type="button" class="btn btn-danger">Delete</button>
                    </td>

                    <!-- Modal -->
                </tr>
            </thead>
        </table>
        <button  @click="gotocreate" class="btn btn-primary">Add Employee</button>
        <button  @click="gotoMap" class="btn btn-primary">Map</button>
    </div>

</template>


<script>
    export default {
        name: "home",
        mounted() {
            console.log("HELLOW");
            this.getUserData();
        },
        methods:{
            gotoviewdata(data){
                this.$router.push({name:"viewData",params : {uid:data}})
            },
            gotoMap(){
                this.$router.push({name:"map"})
            },
            getUserData(){
                axios.get('api/admin').then(response=>{
                    this.Datausers=response.data;
                });
            },gotocreate () {
                this.$router.push({name:"create"})
            },
            gotoEdit(id,index) {
                this.$router.push({name:"edit",params:{id:id}})
            },
            destroyhahaha(userid,index){
                let vm=this
                axios.delete('api/admin/'+ userid).then(response=>{
                    vm.Datausers.splice(index,1);
                    //this.Datausers=response.data;
                });
            }
        },
        data(){
            return{
                Datausers:[],
                user:{
                    id:0,
                    name:'',
                    lname:'',
                    email:'',
                    password:'',
                    phone:'',

                }
            }
        }

    }
</script>

