import state from "./state"

let getters = {
    posts: state => {
        return state.posts
    },
    items: state => {
        return state.items
    },
    errors: state => {
        return state.errors
    },
    authenticated: state => {
        return localStorage.getItem("foodie_token") !== null
    }
}

export default  getters