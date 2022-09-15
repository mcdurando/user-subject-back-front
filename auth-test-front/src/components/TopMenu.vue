
  <template>
  <div class="home"  style="text-align : right">
    <nav>
      <span @click="logOut"><a href="#">Log out</a></span>
    </nav>
  </div>
</template>

<script>

import { mapMutations } from 'vuex';

export default {
  name: "TopMenu",
  
  methods: {

    ...mapMutations(['setResponseLogin' , 'updateUserData' , 'setUserSubjects']),

    logOut() {
      // Clear all data
      localStorage.clear();

      // localStorage.removeItem("token");
      // localStorage.removeItem("idUser");
      this.$router.push("/");

      // Reset Response Login
      this.setResponseLogin("");
      this.updateUserData({
        idUser: "",
        email: "",
        name: "",
        token: "",
      });
      this.setUserSubjects([]);
    },
  },
};
</script>