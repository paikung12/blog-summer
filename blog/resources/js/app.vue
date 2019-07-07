<template>
    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "app",
            created() {
                this.showuser()
            },
        methods: {
           async showuser() {
                console.log('userId',this.$userId)
                let User = await axios.get('api/admin/' + this.$userId).then(response => {
                    this.user = response.data;
                    console.log(response.data)
                    return response.data
                });
               this.gotoUser(User.role)
            },
            gotoUser(role){
               console.log("role",role)
               if(role == "admin"){
                   this.$router.push({name :"home"})

               }else {
                   this.$router.push({name :"user"})
               }
            }
        }

    }
</script>

<style scoped>

</style>