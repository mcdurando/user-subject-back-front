<template>
  <div class="loading" id="loader">
    <MyLoading/>
  </div>
  <router-view />
</template>
<script>
import MyLoading from '@/components/MyLoading.vue'

export default {
  name: 'App',
  components: {
    MyLoading
  }
}
</script>


<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background: linear-gradient(45deg, #297ee3, #edff00);
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  top: 0;
  overflow-y: auto;
  overflow-x: hidden;
}

.loading{
  position: fixed ;
  top: 0;
  left: 0;
  right: 0 ;
  bottom: 0;
  z-index: 1 ;
  display: none;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}

// ---- My popup ---//
.myPopup {
  input,
  select,
  textarea {
    margin: 15px 0px;
  }
}
.btn-close {
  position: absolute;
  top: -2px;
  right: -2px;
  border: none;
  color: rgb(236, 95, 95);
  width: 40px;
  height: 40px;
  cursor: pointer;
  font-size: 26px;
  background: transparent;

  &:hover {
    color: white;
    background: red;
  }
}
.add-task {
  margin-left: auto;
  margin-right: auto;
  width: 50px;
  height: 50px;
  border: 1px solid;
  font-size: 30px;
  font-weight: bold;
  cursor: pointer;
  border-radius: 50%;
  &:hover {
    color: white;
    background: rgb(19, 188, 255);
  }
}
</style>
