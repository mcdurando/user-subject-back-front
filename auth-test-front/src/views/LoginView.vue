<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 mt-4">
        <h2>Sign In</h2>
        <p class="text-danger" v-if="response">
          {{ response }}
        </p>
        <form @submit.prevent="login">
          <div class="form-group">
            <label for="email">Email Address: </label>
            <input
              type="email"
              class="form-control"
              id="email"
              v-model="form.email"
            />
          </div>
          <div class="form-group">
            <label for="password">Password: </label>
            <input
              type="password"
              class="form-control"
              id="password"
              v-model="form.password"
            />
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
          <br /><br />
          <span
            >Don't have any account , please
            <router-link href="" :to="{ name: 'register' }"
              >Sign Up</router-link
            ></span
          >
        </form>
      </div>
    </div>
  </div>
</template>


<script>

import { reactive } from "vue";
import { useRouter } from "vue-router";

import GeneralService from "../services/GeneralService";

import { mapState } from "vuex";

export default {
  name: "LoginView",
  components: {},
  data() {
    return{
       router : useRouter()
    }
  },
 
  created() {
    // Router
    // this.router = useRouter();
  },
  computed: {
    ...mapState({
      response: "responseLogin",
    }),
  },
  watch : {
    response(val){
      if(val == "Success"){
          // Go to task page
        this.router.push({ name: "dashboard" });
      }
    }
  },
  methods: {

    login() {
      // Show loader
      GeneralService.showLoader();

      this.$store.dispatch("runAuthentication", this.form);

      setTimeout(() => {
        // hide loader
        GeneralService.hideLoader();
      }, 1000);
    },
  },

  setup() {
    let form = reactive({
      email: "",
      password: "",
    });
    return {
      form,
    };
  },
};
</script>
<style scoped>
form {
  text-align: left;
  border: 1px solid white;
  border-radius: 5px;
  padding: 18px;
}
</style>
