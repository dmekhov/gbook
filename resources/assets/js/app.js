import './bootstrap';
import router from './routes';

new Vue({
    el: '#app',
    router: router,

    data() {
        return {
            user: {
                name: 'Guest',
                authenticated: false
            },
        }
    },

    methods: {
        checkUser() {
            axios.get('/api/user/get-username')
                .then(response => {
                    this.user.name = response.data;
                    if(this.user.name != 'Guest') this.user.authenticated = true;
                });
        }
    },

    created() {
        this.checkUser();
    },


});
