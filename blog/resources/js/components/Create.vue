<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register Employee
            </div>
            <div class="row justify-content-center">
                <form action="/home">
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
                    <div class="form-group" >
                        <label for="inputPassword5">Confirm Password</label>
                            <input type="password"  class="form-confirm" id="inputPassword5" placeholder="Password">
                    </div>
                    <select class="custom-select" v-model="user.role">
                        <option selected >User or Admin</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <br>
                    <br>

                    <button  @click="getUserData" class="btn btn-primary btn-lg" >Add Employee</button>
                </form>
        </div>
        </div>
    </div>


</template>
<script>
    export default {
        name: "home",

        mounted() {
            console.log("HELLOW");
            //this.getUserData();
        },
        methods: {
            getUserData() {
                axios.post('api/admin',this.user).then(response => {
                    this.Datausers = response.data;
                });
            }, gotocreate() {
                this.$router.push({name: "create"})
            }
        },
        data(){
            return {
                Datausers: [],
                user: {
                    name: '',
                    lname: '',
                    email: '',
                    phone: '',
                    password: '',
                    role:''

                }
            }
        }
    }

</script>
<style>

</style>
