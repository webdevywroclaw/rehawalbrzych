<template>
  <div class="admin-header">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Panel administracyjny</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin/categories">Kategorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/galleries">Galerie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/articles">Artykuły</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/methods">Metody</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/therapetists">Terapeuci</a>
          </li>
        </ul>
      </div>
    </nav>
    <br>
  </div>
</template>

<script>
    export default {
        name: 'AdminHeader',
        data() {
            return {
                msg: 'Welcome to Your Vue.js App'
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>


    h1,
    h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }

</style>
