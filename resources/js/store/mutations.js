let mutations = {
    CREATE_POST(state, post) {
        state.posts.unshift(post)
    },
    FETCH_POSTS(state, posts) {
        return state.posts = posts
    },
    DELETE_POST(state, post) {
        let index = state.posts.findIndex(item => item.id === post.id)
        state.posts.splice(index, 1)
    },
    CREATE_USER(state, user) {
        state.user = user;
    },
    FILL_ERROR(state, err) {
        state.errors = err;
    },
    LOGIN_USER(state) {
        state.is_authenticate = true;
    }

}
export default mutations