import { http } from './config'

export default {
    getUser: () => {
        return http.get('users')
    },

    salvar: (users) => {
        return http.post('users', users)
    },

    update: (users, id) => {
        return http.put(`users/${id}`, users)
    },
    delete: (users, id) => {
        return http.delete(`users/${id}`, { data: users })
    },

    auth: (email, password) => {
        return http.post('auth/login',{ email, password})
    },

    // auth: (token) => {
    //     const headers = {
    //         'Authorization' : 'Bearer ' + token 
    //     }
    //     return http.post('auth/login','', {headers})
    // },

}