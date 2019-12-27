let actions = {
    deletePost({commit}, item) {
        commit('DELETE_POST', item)
    },
    createUser({commit}, user) {
        commit('CREATE_USER', user)
    },
    loginUser({commit}, token) {
        localStorage.setItem("foodie_token", token)
        commit('LOGIN_USER', token)
    },
    addItem({commit}, item) {
        commit('CREATE_ITEM', item)
    },
    fetchItems({commit}, items) {
        commit('FETCH_ITEM', items)
    }
}

export default actions