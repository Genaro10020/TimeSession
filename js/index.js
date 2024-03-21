const Index = {
    data(){
        return{
            user:'',
            password:'',
        }
    },
    mounted(){
     
    },
    methods:{
        verifyUser(){
            axios.post("../verifyController.php",{
                user:this.user,
                pass:this.pass
            }).then(response =>{
                console.log(response.data);
            }).catch(error =>{
                console.log("Error en Axios "+response.error);
            });
        }
    }
}
var mountedApp = Vue.createApp(Index).mount('#vue');
