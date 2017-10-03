<template>
    <div :class="['btn', btnclass]" @click='connectShopify'>Connect {{service}}</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['service', 'btnclass'],
    methods: {
        connectShopify(){

            axios.post('/api/connect/shopify')
                .then((res) => {
                    console.log(res.data);
                })
                .catch(err => {
                    console.error(err)
                })
        },
        connectVend(){
            // https://docs.vendhq.com/v0.9/reference
            
            // https://secure.vendhq.com/connect?response_type=code&client_id={client_id}&redirect_uri={redirect_uri}&state={state}

        }
    }
}
</script>
