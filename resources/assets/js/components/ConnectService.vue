<template>
    <div :class="['btn', btnclass]" @click='connectShopify'>Connect {{service}}</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['service', 'btnclass'],
    methods: {
        connectShopify(){
            console.log('connect shopify');

            axios.post('/api/connect/shopify')
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
