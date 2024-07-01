import { defineStore } from 'pinia'

export const useTokenStore = defineStore('token', {
    state: () => {
        return {
            token: null,
            isLogin: false,
            authUser: null,
           
        }
    },

    actions: {
        setToken(data) {
            this.token = data.token
            this.isLogin = true;
        },
        setAuthUser(data) {
            this.authUser = data
        },
        setAuthErrors(data) {
            this.authUser = data
        },
        removeToken() {
            this.token = null
            this.isLogin = false
            this.authUser = null
        }
        

    },
    getters: {
        getToken() {
            return this.token
        },
        getIsLogin() {
            return this.isLogin
        },
        getAuthUser() {
            return this.authUser
        },
       

    },

    persist: true,
})