const App = {
    data() {
        return {
            usuario: 'Tu eres',
            contador: 'Tomando el tiempo..',
            acumulado: '',
            existeseson: false,
        }
    },
    mounted() {
        this.takeTime()
        window.addEventListener("beforeunload", this.cerrarSession);
        window.addEventListener("popstate", this.cerrarSession);
    },
    methods: {
        takeTime() {
            setInterval(() => {
                axios.get('timeController.php')
                    .then(response => {
                        console.log("Tomando Tiempo", response.data);

                        if (response.data[0] === true) {
                            this.existeseson = true;
                            this.contador = response.data[1];
                            this.acumulado = response.data[2];
                            this.usuario = response.data[3];
                        } else {
                            this.existeseson = false;
                            window.location.href = "index.html";
                        }

                    })
                    .catch(error => {
                        console.error('Error al obtener el tiempo:', error);
                    });
            }, 1000);
        },
        cerrarSession() {
            //if (!confirm("Va a salir y su contador se sumara...")) return true;
            axios.put('timeController.php', {
            }).then(response => {
                console.log("Respuesta", response.data);
                if (response.data === true) {
                    console.log("alindex");
                    window.location.href = "index.html";
                } else {
                    console.error('Problemas en cerrar Session');
                }
            }).catch(error => {
                console.log("error en axios" + error);
            })


        }
    }
}
var mountedApp = Vue.createApp(App).mount('#vue');
