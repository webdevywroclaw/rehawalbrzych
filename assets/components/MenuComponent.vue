<template>
  <nav class="navbar" id="nav-bar">
    <span id="navbar-toggle">
      <button type="button" @click="add()" id="but">&#9776</button>
    </span>
    <span id="navbar-logo">
      <router-link to="/">
        <img src="/img/logo3.png" id="logo" />
      </router-link>
    </span>
    <ul id="main-nav">
      <li @click="close()">
        <router-link to="/">
          <img src="/img/logo3.png" id="image" />
        </router-link>
      </li>
      <li @click="close()">
        <router-link to="/terapeuci" class="nav-links">O nas</router-link>
      </li>
      <li @click="close()">
        <router-link to="/oferta" class="nav-links">Metody</router-link>
      </li>
      <li @click="close()">
        <router-link to="/cennik" class="nav-links">Cennik</router-link>
      </li>
      <!--<li @click="close()"><router-link to="/artykuly" class="nav-links">Artykuły</router-link></li>-->
      <li @click="close()">
        <router-link to="/galeria" class="nav-links">Galeria</router-link>
      </li>
      <li @click="close()">
        <router-link to="/kontakt" class="nav-links">Kontakt</router-link>
      </li>
    </ul>
  </nav>
</template>
<script>
export default {
  methods: {
    add() {
      var mainNav = document.getElementById("main-nav");
      var navBar = document.getElementById("nav-bar");
      var logoNav = document.getElementById("navbar-logo");
      var logo = document.getElementById("logo");
      var list = document.querySelectorAll("li");
      if (mainNav.classList.contains("active")) {
        mainNav.style.display = "none";
        mainNav.classList.remove("active");
      } else {
        mainNav.style.display = "flex";
        mainNav.classList.add("active");
        navBar.style.marginBottom = "500px";
      }
      logoNav.style.minHeight = "80px";
      list[0].style.padding = "0";
    },
    close() {
      var mainNav = document.getElementById("main-nav");
      mainNav.style.display = "none";
      mainNav.classList.remove("active");
    }
  }
};
</script>


<style scoped>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

button {
  width: 40px;
  height: 40px;
  margin-top: 10px;
  background: none;
  border: none;
}
.navbar {
  min-height: 80px;
  width: 100%;
  padding: 0;
  margin: 0 20px 0 0;
  font-size: 18px;
  background: #ffffff;
  z-index: 5;
}
#main-nav {
  list-style-type: none;
  display: none;
  flex-direction: column;
  width: 100%;
}
#main-nav li {
  justify-self: center;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  padding: 10px 0;
  width: 100%;
  border-bottom: 1px dotted #25d9e8;
}
.nav-links {
  text-decoration: none;
  color: #000;
  text-align: center;
}

#navbar-toggle {
  position: absolute;
  top: 10px;
  right: 20px;
  cursor: pointer;
  color: rgba(255, 255, 255, 0.8);
  font-size: 24px;
}
#navbar-logo {
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
}
#image {
  display: none;
}
#logo {
  display: block;
  height: 48px;
  width: 270px;
  z-index: 10;
}
.nav-links:hover {
  color: #25d9e8;
}
@media screen and (min-width: 400px) {
  #logo {
    width: 300px;
  }
  #navbar-logo {
    margin-left: 20px;
  }
}
@media screen and (min-width: 935px) {
  .navbar {
    display: flex;
    justify-content: left;

    height: 70px;
    align-items: center;
  }
  #main-nav {
    display: flex !important;
    margin-left: 30px;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
  }
  #main-nav li {
    text-decoration: none;
    color: black;
    margin: 0 20px 0 20px;
    font-size: 20px;
    align-self: center;
    text-align: center;
    border: none;
    padding: 0;
    width: auto;
  }

  #navbar-toggle {
    display: none;
  }
  #navbar-logo {
    display: none;
  }
  #image {
    display: block;
    height: 62px;
    width: 350px;
    z-index: 10;
  }
}
</style>