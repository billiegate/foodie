<template>
    <div class="card">
        <div class="card-body">
            <img :src="item.image" width="100%" />
        </div>
        <div class="card-header">
            {{ item.name }} - N {{ item.price }}
            <hr/>
            <span v-if="item.quantity > 0">
                {{ item.quantity }} in stock
                <button>Add to cart</button>
            </span>
            <span v-else>Out of stock</span>
        </div>
    </div>
    
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        props: ['item'],
        data() {
            return {
                //item: {},
            }
        },
        mounted() {
            console.log(this.item)
        }
    }
</script>
