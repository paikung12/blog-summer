<template>
    <div class="container portfolio">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <img src="https://image.ibb.co/cbCMvA/logo.png" />
                </div>
            </div>
        </div>
        <div class="bio-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bio-image">
                                <img src="https://image.ibb.co/f5Kehq/bio-image.jpg" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" v-if ="user">
                    <div class="bio-content">
                        <h2>Name: {{user.name}}</h2>
                        <h2>Lastname: {{user.lname}}</h2>
                        <h2>Email: {{user.email}}</h2>
                        <h2>Phone: {{user.phone}}</h2>
                        <p>
                            <button  @click="gotoMap" type="button" class="btn btn-outline-success">เข้างาน</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>




<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.getuser();
        },
        methods : {
            gotoMap(){
                this.$router.push({name:"map"})
            },
            async getuser()
            {
                this.user = await axios.get('api/admin/' + this.$userId)
                    .then(response => {
                    return response.data;

                });
                console.log('user ',this.userid)
            }
        },
        data(){
            return{
                Datausers:[],
                user: null
            }
        }
    }
</script>

<style>
    body{
        background: linear-gradient(90deg, #e8e8e8 50%, #0B99F8 50%);
    }
    .portfolio{
        padding:6%;
        text-align:center;
    }
    .heading{
        background: #fff;
        padding: 1%;
        text-align: left;
        box-shadow: 0px 0px 4px 0px #545b62;
    }
    .heading img{
        width: 10%;
    }
    .bio-info{
        padding: 5%;
        background:#fff;
        box-shadow: 0px 0px 4px 0px #b0b3b7;
    }
    .name{
        font-family: 'Charmonman', cursive;
        font-weight:600;
    }
    .bio-image{
        text-align:center;
    }
    .bio-image img{
        border-radius:50%;
    }
    .bio-content{
        text-align:left;
    }
    .bio-content p{
        font-weight:600;
        font-size:30px;
    }
</style>
