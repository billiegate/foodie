<template>
    <div class="card-body">
        <form >
           
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Guard</label>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="guard" v-model="guard" value="user" checked/> user
                    </label>
                    <label>
                        <input type="radio" name="guard" v-model="guard" value="admin"/> admin
                    </label>
                    <label>
                        <input type="radio" name="guard" v-model="guard" value="courier"/> courier
                    </label>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" v-model="user.name" required autocomplete="name" autofocus>
                    <span class="invalid-feedback" v-if="errors.name" role="alert">
                        <strong>{{ errors.name }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }" v-model="user.email" required autocomplete="email">
                    <span class="invalid-feedback" v-if="errors.email" role="alert">
                        <strong>{{ errors.email }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" :class="{ 'is-invalid': errors.password }" v-model="user.password" required autocomplete="new-password">
                    <span class="invalid-feedback" v-if="errors.password" role="alert">
                        <strong>{{ errors.password }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" :class="{ 'is-invalid': errors.password_confirmation }" v-model="user.password_confirmation" required autocomplete="new-password">
                    <span class="invalid-feedback" v-if="errors.password_confirmation" role="alert">
                        <strong>{{ errors.password_confirmation }}</strong>
                    </span>
                </div>
            </div>
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="button" @click="submit()" :disabled="loading" class="btn btn-primary">
                        Register <i class="fa fa-spinner fa-spin"></i>
                    </button>
                </div>
            </div>
            <br/>
            <div v-if="message" class="alert" :class="{ 'alert-success': Object.values(errors).length === 0, 'alert-danger': message }">
                {{ message }}
            </div>
        </form>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        data() {
            return {
                user: {},
                errors: {
                    name: '',
                    email: '',
                    password: ''
                },
                guard: "user",
                message: "",
                loading: false
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            validate() {
                this.errors = {};
                for(let k in this.user) {
                    if(!this.user[k]) {
                        this.errors[k] = k + ' feild is required';
                    }
                }
                if(this.user.password !== this.user.password_confirmation) {
                    this.errors.password_confirmation = 'password do not match';
                }
                return Object.values(this.errors).length === 0
            },

            submit(){
                if(!this.validate()) {
                    return;
                }

                this.loading = true
                
                axios.post('/auth/register/' + this.guard, this.user)
                .then(res => {
                    let user = res.data.user, message = res.data.message;
                    this.message = message;
                    this.$store.dispatch('createUser', user);
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 2000)
                }).catch(err => {
                    this.errors = err.response.data;
                    this.message = "please fix the issue"
                }).finally(() => {
                    this.loading = false
                });
            }
        },
        watch: {
            ...mapGetters([
                'user',
                'errors'
            ]),
            // error: function() {
            //     console.log(this.$store.state)
            //     return this.$store.getters.errors.response
            // }
        }
    }
</script>
