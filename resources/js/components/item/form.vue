<template>
    <div class="card-body">
        <form >
           
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Food name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" v-model="item.name" required autocomplete="name">
                    <span class="invalid-feedback" v-if="errors.name" role="alert">
                        <strong>{{ errors.name }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">Price (N)</label>
                <div class="col-md-6">
                    <input id="price" type="number" class="form-control" :class="{ 'is-invalid': errors.price }" v-model="item.price" required autocomplete="price">
                    <span class="invalid-feedback" v-if="errors.price" role="alert">
                        <strong>{{ errors.price }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                <div class="col-md-6">
                    <input id="quantity" type="number" class="form-control" :class="{ 'is-invalid': errors.quantity }" v-model="item.quantity" required autocomplete="quantity">
                    <span class="invalid-feedback" v-if="errors.quantity" role="alert">
                        <strong>{{ errors.quantity }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control" :class="{ 'is-invalid': errors.image }" >
                    <span class="invalid-feedback" v-if="errors.image" role="alert">
                        <strong>{{ errors.image }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <textarea id="description" class="form-control" :class="{ 'is-invalid': errors.description }" v-model="item.description" autocomplete="description"></textarea>
                    <span class="invalid-feedback" v-if="errors.description" role="alert">
                        <strong>{{ errors.description }}</strong>
                    </span>
                </div>
            </div>

            
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="button" @click="submit()" :disabled="loading" class="btn btn-primary">
                        Create Food Item <i class="fa fa-spinner fa-spin"></i>
                    </button>
                </div>
            </div>
            <br/>
            <div v-if="message" class="alert" :class="{ 'alert-success': Object.values(errors).length === 0, 'alert-danger': Object.values(errors).length > 0 }">
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
                item: {
                    name: '',
                    price: '',
                    quantity: '',
                    description: ''
                },
                errors: {
                    name: '',
                    price: '',
                    quantity: '',
                    image: '',
                    description: ''
                },
                guard: "item",
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
                for(let k in this.item) {
                    if(!this.item[k]) {
                        this.errors[k] = k + ' feild is required';
                    }
                }
                if(!document.getElementById('image').value) {
                    this.errors.image = 'Food item is required'
                }
                return Object.values(this.errors).length === 0
            },

            submit(){
                if(!this.validate()) {
                    return;
                }

                let form = new FormData();
                const {
                    name,
                    price,
                    quantity,
                    description
                } = this.item;

                form.append('image', document.getElementById('image').files[0])
                form.append('name', name)
                form.append('price', price)
                form.append('quantity', quantity)
                form.append('description', description)
                
                this.loading = true
                
                axios.post('/items', form)
                .then(res => {
                    console.log(res)
                    let item = res.data.item
                    this.message = res.data.message;
                    this.$store.dispatch('addItem', item);
                    this.item = {}
                }).catch(err => {
                    console.dir(err)
                    this.errors = err.response.data || {message: err.response.statusText};
                    this.message = err.response.data.message || err.response.data.error
                }).finally(() => {
                    this.loading = false
                });
            }
        }
    }
</script>
