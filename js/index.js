const App = {
    data() {
        return {
            user: '',
            password: '',
            bandera: true,
        }
    },
    mounted() {
        this.verySession();
    },
    methods: {
        verySession() {
            axios.get("verifyController.php", {
            }).then(response => {
                console.log(response.data)
            }).catch(error => {
                console.log(error.message)
            })
        },
        verifyUser() {
            console.log(this.user + " / " + this.password)
            axios.post("verifyController.php", {
                user: this.user,
                password: this.password
            }).then(response => {
                console.log(response.data);
                if (response.data === true) {
                    window.location.href = 'panel.html';
                } else if (response.data == false) {
                    this.bandera = false;
                    setTimeout(() => {
                        this.bandera = true;
                    }, 3000)
                } else {
                    console.log(response.data);
                }
            }).catch(error => {
                console.log("Erro en Axios " + error);
            });
        }
    }
}
var mountedApp = Vue.createApp(App).mount('#vue');
