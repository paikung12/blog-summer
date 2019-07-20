<template>
    <div>
        <table class="table">

        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="d  in dataE">
            <td>{{d.id}}</td>
            <td>{{getdate(d.checkIn)}}</td>
            <td>{{gettime(d.checkIn)}}</td>
            <td>{{gettime(d.checkOut)}}</td>
            <!-- Modal -->
        </tr>
        </tbody>
    </table>

    </div>

</template>
<script>
    export default {
        mounted() {
            console.log("HELLOW");
            this.getUserData();
        },
        methods:{
            getUserData() {
                axios.get('api/time', {params : {uid:this.$route.params.uid}})
                    .then(response => {
                        this.dataE = response.data;
                    });
            },
            gettime (d) {
                return moment(d).format('HH:mm:ss')
            },
            getdate (d) {
                return moment(d).format('YYYY-MM-DD')
            }
        },
        data() {
            return {
                dataE : [],
                user:{
                    id:0,
                    name:'',
                    checkIn:'',
                    checkOut:'',

                }
            }
        }
    }

</script>