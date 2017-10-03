<template>
    <div class="btn btn-default" @click='getProducts'>Get Products</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['service', 'btnclass'],
    methods: {
        getProducts(){
            console.log('connect shopify');

            // get products from shopify
            axios.get('/oauth/authorize')
                .then(res => {
                    console.log(res.data)
                })
                .catch(err => {
                    console.error(err);
                })
        }
    }
}
</script>
