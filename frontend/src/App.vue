<template class="alert">
  <div>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Title!</strong> Alert body ...
    <img src="./assets/logo.png">

    <router-view />
  </div>
</template>

<script>
  export default {
    name: 'App',
    src: '../../public/bootstrap/js/bootstrap.min.js'
  }
</script>
<!-- <script src="../../public/bootstrap/js/bootstrap.min.js"></script> -->

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>
<link rel="stylesheet" href="../../public/bootstrap/css/bootstrap-theme.min.css">