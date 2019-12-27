<template>
    <div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <item v-for="(item,i) in items" :item="item" :key="i"></item>
            </div>
            <div class="well col-sm-12" v-if="Object.values(items).length === 0">
                No food available yet
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Add New Food Item</h4>
            <item-form></item-form>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        data() {
            return {
                items: {},
                message: "",
                loading: false
            }
        },

        mounted() {
            this.loading = true;
            axios.get('/items')
            .then(res => {
                console.log(res)
                this.items = res.data
            }).catch(err => {
                console.dir(err)
            }).finally(() => {
                this.loading = false
            });
        },
    }
</script>
