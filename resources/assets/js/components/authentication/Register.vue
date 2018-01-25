<template>
    <div id="register-component">
        <input type="text" v-model="email" placeholder="Email">

        <input type="password" v-model="password" placeholder="Password">

        <button @click="login">Submit</button>
    </div>
</template>
<script>
    import axios from 'axios'

	export default {
		data(){
            return {
            	email: '',
                password: ''
            }
		},
        methods: {
			login(){
				axios.post(BASE_URL + '/login')
            }
        }
	}
</script>