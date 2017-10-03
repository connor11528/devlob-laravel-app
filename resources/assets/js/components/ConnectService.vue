<template>
    <div :class="['btn', btnclass]" @click='(service == "Shopify") ? connectShopify() : connectVend()'>Connect {{service}}</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['service', 'btnclass'],
    methods: {
        connectShopify(){
            console.log('fire shop')
            axios.post('/api/connect/shopify')
                .then((res) => {
                    window.location.reload();
                })
                .catch(err => {
                    console.error(err)
                })
        },
        connectVend(){
            console.log('fire vend')
            // https://docs.vendhq.com/v0.9/reference
            
            // https://secure.vendhq.com/connect?response_type=code&client_id={client_id}&redirect_uri={redirect_uri}&state={state}

        }
    }
}
</script>
