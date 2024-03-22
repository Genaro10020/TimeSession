const App = {
    data() {
        return {
            user: '',
            password: '',
        }
    },
    mounted() {

    },
    methods: {
        verifyUser() {
            console.log(this.user + " / " + this.password)
            axios.post("verifyController.php", {
                user: this.user,
                password: this.password
            }).then(response => {
                console.log(response.data);
                if (response.data === true) {
                    window.location.href = 'panel.php';
                }
            }).catch(error => {
                console.log("Erro en Axios " + error);
            });
        }
    }
}
var mountedApp = Vue.createApp(App).mount('#vue');
