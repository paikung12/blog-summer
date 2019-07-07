<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Modify Employee
            </div>
            <div class="row justify-content-center">
                <div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="name" class="form-control"  v-model="user.name"   id="inputEmail4" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Lastname</label>
                            <input type="lname" class="form-control"  v-model="user.lname"  id="inputPassword4" placeholder="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" v-model="user.email" class="form-control" id="exampleFormControlInput1" placeholder="@email.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Phone</label>
                        <input type="phone"  v-model="user.phone" class="form-control" id="exampleFormControlInput2" placeholder="Phone number">
                    </div>
                    <div class="form-group " >
                        <label for="inputPassword3">Password</label>
                        <input type="password" v-model="user.password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                    <div class="form-group " >
                        <label for="inputPassword5">Confirm Password</label>
                        <input type="password"  class="form-confirm" id="inputPassword5" placeholder="Password">
                    </div>
                    <button  @click="getUserData" class="btn btn-primary btn-lg" >Update Employee</button>
                </div>
            </div>
        </div>
    </div>


</template>
<script>
    export default {
        name: "home",

        mounted() {
            console.log("HELLOW");
            this.userid = this.$route.params.id
            this.getuser()
        },
        methods: {
            getUserData() {
                axios.put('api/admin/'+this.userid,this.user).then(response => {
                    this.Datausers = response.data;
                });
                this.gotocreate()
            }, gotocreate() {
                this.$router.push({name: "home"})
            },
            getuser(){
                axios.get('api/admin/'+ this.userid).then(response => {
                    this.user = response.data;
                });
            }

        },
        data(){
            return {
                Datausers: [],
                userid:'',
                user: {
                    name: '',
                    lname: '',
                    email: '',
                    phone: '',
                    password: ''

                }
            }
        }
    }

</script>
<style>

</style>
