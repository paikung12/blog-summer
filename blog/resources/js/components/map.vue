<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div>
                            <button @click="myFunction()">sum</button>
                            <button @click="callDateFunction()">Time</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    export default {
        data : () => ({
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
        }),
        methods:{
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
                alert(lat1)
                alert(lon1)
                alert(this.sum);
                this.checkR(this.sum);

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
                console.log(this.currentDate);
            }


        },
    }

</script>