let mutations = {
    DELETE_ITEM(state, item) {
        let index = state.items.findIndex(item => item.id === item.id)
        state.items.splice(index, 1)
    },
    CREATE_USER(state, user) {
        state.user = user;
    },
    FILL_ERROR(state, err) {
        state.errors = err;
    },
    LOGIN_USER(state) {
        state.is_authenticate = true;
    },
    CREATE_ITEM(state, item) {
        state.items.unshift(item)
    },
    FETCH_ITEM(state, items) {
        return state.items = items
    },

}
export default mutations