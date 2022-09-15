<template>
  <TopMenu />
  <div class="home">
    <h1>Welcome {{ name }}</h1>
    <br>

    <h4 v-if="userSubjects.length>0">These are your subjects : </h4>
    <h4 v-if="userSubjects.length==0">You don't have any subject , please create </h4>
  <div>
    <ul>
      <li v-for="item in userSubjects" v-bind:key="item.id">
        - {{ item.name }}
        </li>
    </ul>
  </div>
  </div>
</template>

<script>
// @ is an alias to /src
import TopMenu from "../components/TopMenu.vue";
import { mapState } from "vuex";

export default {
  name: "HomeView",
  components: {
    TopMenu,
  },
  computed: {
    ...mapState({
      idUser : "id",
      name: "name",
      userSubjects : "userSubjects"
    }),
  },
  created(){
    this.$store.dispatch("fetchUserSubjects");
  }
};
</script>