<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 mt-4">
          <h2>Sign Up</h2>
         <p class="text-danger" v-if="error">
             {{ error }}
         </p>
        <form @submit.prevent="register">
              <div class="form-group">
            <label for="name">Name: </label>
            <input ype="text" class="form-control" id="name" v-model="form.name"/>
          </div>
          <div class="form-group">
            <label for="email">Email Address: </label>
            <input type="email" class="form-control" id="email" v-model="form.email"/>
          </div>
          <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" class="form-control" id="password" v-model="form.password"/>
          </div>
             <div class="form-group">
            <label for="c_password">Confirm Password: </label>
            <input type="password" class="form-control" id="c_password" v-model="form.c_password"/>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
          <br><br>
          <span>Have already an account , please <router-link href="" :to="{ name : 'login'}">Sign In</router-link></span>
        </form>
      </div>
    </div>
  </div>
</template>


<script>
// @ is an alias to /src

import { reactive , ref } from "vue" ;
import http from "../http-common";
import { useRouter } from "vue-router";



export default {
  name: "LoginView",
  components: {
  },
  setup(){
      const router = useRouter();

      let form = reactive({
          name  : '' ,
          email : '' ,
          password: '' ,
          c_password : ''
      });

        let error = ref('');
        const register = async() => {
            await http.post('register', form)
            .then(res => {
                console.log("----------- AHOANAAAAAAAAA ---------------");
                console.log(res.data);
                if(res.data.success){
                    console.log("SUCCESS");

                    // Set data
                    localStorage.setItem('token' , res.data.data.token)
                    localStorage.setItem('idUser' , res.data.data.idUser)
                    
                    // Go to task page 
                    router.push({name: "dashboard"});
                }else{
                    error.value = res.data.message;
                }
            })
        }
      return {
          form ,
          register ,
          error
      }
  }
};
</script>

<style scoped>
form{
    text-align: left;
    border: 1px solid white;
    border-radius: 5px;
    padding: 18px;
}
</style>