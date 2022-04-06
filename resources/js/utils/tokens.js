export default {

    clearUserToken() {
        if (localStorage.userToken) {
            localStorage.removeItem("userToken");
        } else if (sessionStorage.userToken) {
            sessionStorage.removeItem("userToken");
        }
    },

    get userToken() {
        return localStorage.userToken || sessionStorage.userToken;
    },

    get isAuthorized() {
        return Boolean(this.userToken);
    }
};
