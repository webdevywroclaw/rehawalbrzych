<template>
  <div class="admin-header">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <router-link to="/admin" class="navbar-brand">Panel administracyjny</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/admin/categories" class="nav-link">Kategorie</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/galleries" class="nav-link">Galerie</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/articles" class="nav-link">Artykuły</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/methods" class="nav-link">Metody</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/therapeutists" class="nav-link">Terapeuci</router-link>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link last">Wyloguj</a>
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

    a.nav-link.last {
      color: #bb0000;
    }

    a.nav-link.last:hover {
      color: #ff0000;
    }
</style>
