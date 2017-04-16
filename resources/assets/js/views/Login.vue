<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" @submit.prevent="onSubmit" @keyup="form.errors.clear()">
                            <input type="hidden" name="_token" :value="csrf">

                            <div class="form-group" v-bind:class="{'has-error': form.errors.has('email')}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="form.email" required autofocus>
                                    <span class="help-block" v-if="form.errors.has('email')"><strong v-text="form.errors.get('email')"></strong></span>
                                </div>
                            </div>

                            <div class="form-group" v-bind:class="{'has-error': form.errors.has('password')}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" v-model="form.password" required>
                                    <span class="help-block" v-if="form.errors.has('password')"><strong v-text="form.errors.get('password')"></strong></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" v-model="form.remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="/">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                form: new Form({email: '', password: '', remember: ''}),
                csrf: '',

            };
        },

        props: ['user'],

        methods: {
            onSubmit() {
                this.form.post('/login')
                    .then(response => {
                        this.$parent.checkUser();
                        this.$router.push('/');
                    });
            }
        },

        created() {
            this.csrf = window.Laravel.csrfToken
        }


    }
</script>
