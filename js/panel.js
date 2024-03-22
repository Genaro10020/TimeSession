const App = {
    data() {
        return {
            usuario: 'Tu eres',
            contador: 'Tomando el tiempo..',
            acumulado: '',
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
                        this.contador = response.data[0];
                        this.acumulado = response.data[1];
                        this.usuario = response.data[2];
                    })
                    .catch(error => {
                        console.error('Error al obtener el tiempo:', error);
                    });
            }, 1000);
        },
        async cerrarSession() {
            //if (!confirm("Va a salir y su contador se sumara...")) return true;
            console.log("Cerrando sesión...");
            try {
                const response = await axios.put('timeController.php');
                console.log(response.data);
                if (response.data[0] === true) {
                    window.location.href = "index.php";
                }
            } catch (error) {
                console.error('Problemas en cerrar Session:', error);
            }
        }
    }
}
var mountedApp = Vue.createApp(App).mount('#vue');
