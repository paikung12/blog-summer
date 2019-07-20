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
                        <div v-if="readyBoot" > <!--Today-->
                            <p class="text-success">check in : {{dataC.checkIn}} </p>
                        </div>
                        <div v-else >
                            Not checck in Todasy
                        </div>
                        <p>
                            <button  @click="myFunction()"  type="button" class="btn btn-outline-success">Check In</button>
                            <button  @click="saveCheckOut()" type="button" class="btn btn-outline-danger">Check Out</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>




<script>

    export default {
       async  mounted() {
            console.log('Component mounted.')
            this.getuser();
            this.dataC = await this.getDataCheckInOut()
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
            },


            //Map//
            myFunction: function () {
                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(this.showPosition);
                }else{
                    this.error = "Geolocation is not supported.";
                }

            },
            showPosition:function (position) {
                this.lat1 = position.coords.latitude;
                this.lon1 = position.coords.longitude;
                this.distance(this.lat1,this.lon1,this.lat2,this.lon2)
            },
            distance:function (lat1,lon1,lat2,lon2){
                this.rlon1 = (Math.PI*(parseFloat(lon1)/180));
                this.rlon2 = (Math.PI*(parseFloat(lon2)/180));
                this.rlat1 = (Math.PI*(parseFloat(lat1)/180));
                this.rlat2 = (Math.PI*(parseFloat(lat2)/180));
                this.theta = lon1-lon2;
                this.rtheta = Math.PI * this.theta / 180;
                this.dist = Math.sin(this.rlat1) * Math.sin(this.rlat2) + Math.cos(this.rlat1) * Math.cos(this.rlat2) * Math.cos(this.rtheta);
                this.dist = Math.acos(this.dist);
                this.dist = this.dist * 180 / Math.PI;
                this.dist = this.dist * 60 * 1.1515;
                this.dist = this.dist * 1.609344;
                this.sum = this.dist*1000;

                this.saveCheckIn(lat1,lon2)


            },
            checkR:function (sum){
                if(sum > 1000){
                    this.check = "Out of Range";
                    console.log(this.check)
                }else {
                    this.check = "OK";
                    console.log(this.check)

                }
            },
            callDateFunction: function () {
                this.currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'/');
                console.log(this.currentDateWithFormat);
                this.currentDate = Date();
                alert(this.currentDate,this.currentDateWithFormat);

            },
            async saveCheckIn (lat1,lon1) {

                this.checkinData.lat1 = lat1;
                this.checkinData.lon1 = lon1;
                this.checkinData.checkIn = moment.tz('Asia/Bangkok').format('YYYY-MM-DD HH:mm:ss');

                this.checkinData.userid = this.$userId
                let data = await axios.post('api/time',this.checkinData)
                    .then ( (r) => {
                        console.log("success",r.data)
                        alert("save success")
                    })
                    .catch((e)=> {
                        console.log(e.message)
                    })
                return  data
            },
            async getDataCheckInOut () {
                let data = await axios.get('api/time/'+this.$userId)
                    .then ( (r) => {
                        console.log("success",r.data)
                        return r.data
                    })
                    .catch((e)=> {
                        console.log(e.message)
                    })
                return data

            },
            readyBoot (data) {
                let isToday = false
                console.log ("data" ,data.checkIn)
                if (moment().diff(data.checkIn,'days') > 0 )
                {
                    isToday = false
                }else {
                    console.log("Today")
                    isToday = true
                }
                return isToday
            },
            async saveCheckOut (lat1,lon1) {
                this.checkoutData = this.dataC

                this.checkoutData.checkOut = moment.tz('Asia/Bangkok').format('YYYY-MM-DD  HH:mm:ss');


                let data = await axios.put('api/time/'+this.checkoutData.id,this.checkoutData)
                    .then ( (r) => {
                        console.log("success",r.data)
                        alert("save success")
                    })
                    .catch((e)=> {
                        console.log(e.message)
                    })
                return  data
            }
        },




        data(){
            return{
                dataC : {},
                Datausers:[],
                checkinData : {
                    userid : "",
                    checkIn :"",
                    checkOut :"",
                    lat1:"",
                    lon1:""

                },
                checkoutData : {
                    userid : "",
                    checkIn :"",
                    checkOut :"",
                    lat1:"",
                    lon1:""
                },
                user: null,
                lat1 : "",//// User
                lon1 : "",//// User
                sum : "",
                lat2: "16.241502",///// Admin
                lon2: "103.260847",///// Admin
                R : 6371,
                theta : null,
                rtheta : null,
                dist : null,
                check : null,
                currentDate : null,
                currentDateWithFormat : null,
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
