import { createStore } from 'vuex';
import http from "../http-common";

export default createStore({
  state: {
    id: '',
    email: '',
    name: '',
    token: '',
    responseLogin: '',
    userSubjects: []
  },
  getters: {
  },
  mutations: {
    updateUserData(state) {
      state.token = localStorage.getItem("token");
      state.id = localStorage.getItem("idUser");
      state.name = localStorage.getItem("name");
      state.email = localStorage.getItem("email");
    },

    setResponseLogin(state, payload) {
      state.responseLogin = payload
    },

    setUserSubjects(state, payload) {
      state.userSubjects = payload
    }
  },
  actions: {
    runAuthentication(context, payload) {
      http.post("login", payload).then((res) => {

        //////////////////////////////////
        console.log("ATO EEEE ----------------->", res);

        if (res.data.success) {

          // Reset Error Login
          context.commit("setResponseLogin", "Success");

          // Set data
          localStorage.setItem("token", res.data.data.token);
          localStorage.setItem("idUser", res.data.data.idUser);
          localStorage.setItem("name", res.data.data.name);
          localStorage.setItem("email", res.data.data.email);

          // updateUserData
          context.commit("updateUserData");

        }
        else {
          // Set Error Login
          context.commit("setResponseLogin", res.data.message)
        }

      });
    },

    fetchUserSubjects(context) {

      // updateUserData
      context.commit("updateUserData");

      if (this.state.id != '') {
        http.get('/userSubjects/' + this.state.id).then((res) => {
          console.log("this.state.id =   ", this.state.id)
          console.log("res.data = ", res.data);
          context.commit("setUserSubjects", res.data.data);
        });
      }

    }
  },
  modules: {
  }
})
