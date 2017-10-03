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

            const data = {
                name: 'Shopify',
                redirect: 'https://employbl.myshopify.com/admin/oauth/authorize'
            };

            axios.post('/oauth/clients', data)
                .then(response => {
                    console.log(response.data);
                })
                .catch (response => {
                    // List errors on response...
                });
        },
        connectVend(){
            // https://docs.vendhq.com/v0.9/reference
            
            // https://secure.vendhq.com/connect?response_type=code&client_id={client_id}&redirect_uri={redirect_uri}&state={state}

        }
    }
}
</script>
