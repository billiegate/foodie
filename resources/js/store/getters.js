import state from "./state"

let getters = {
    posts: state => {
        return state.posts
    },
    errors: state => {
        return state.errors
    },
    authenticated: state => {
        return localStorage.getItem("foodie_token") !== null
    }
}

export default  getters