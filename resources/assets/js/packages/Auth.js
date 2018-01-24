
export default function (Vue){
	Vue.auth = {
		setToken(token, expiration){
			localStorage.setItem('stitchlite_token', token);
			localStorage.setItem('stitchlite_expiration', expiration);
		},

		getToken(){
			let token = localStorage.getItem('stitchlite_token');
			let expiration = localStorage.getItem('stitchlite_expiration');

			if(!token || !expiration) return null;

			if(Date.now() > parseInt(expiration)){
				this.destroyToken();
				return null;
			} else {
				return token;
			}
		},

		destroyToken(){
			localStorage.removeItem('stitchlite_token');
			localStorage.removeItem('stitchlite_expiration')
		},

		isAuthenticated(){
			return !!(this.getToken());
		}
	};

	// make available as Vue.$auth
	Object.defineProperties(Vue.prototype, {
		$auth: {
			get(){
				return Vue.auth;
			}
		}
	});
}