<template>
<!--
  <div id="menu">
    <ul>
      <li>
        <a href="http://localhost:8080"><img src="../assets/logo.png"></a>
      </li>
      <li>
        <a href="http://localhost:8080/#/terapeuci">O nas</a>
      </li>
      <li>
        <a href="http://localhost:8080/#/oferta">Metody</a>
      </li>
      <li>
        <a href="http://localhost:8080/#/cennik">Cennik</a>
      </li>
      <li>
        <a href="http://localhost:8080/#/galeria">Galeria</a>
      </li>
      <li>
        <a href="http://localhost:8080/#/kontakt">Kontakt</a>
      </li>
    </ul>
  </div>
  -->
  <div class="nav">
    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle"/>
    <div id="menu">
      <router-link to="/">REHA WAŁBRZYCH</router-link>
      <router-link to="/terapeuci">O nas</router-link>
      <router-link to="/oferta">Metody</router-link>
      <router-link to="/cennik">Cennik</router-link>
      <router-link to="/artykuly">Artykuły</router-link>
      <router-link to="/galeria">Galeria</router-link>
      <router-link to="/kontakt">Kontakt</router-link>
    </div>
  </div>
</template>

<script>

</script>

<style scoped>
/* menu ul{
    margin: 0px;
    padding: 0px;
    list-style: none;
  }
  #menu ul li img{
    height: 60px;
    width:100%;
  }
  #menu ul li{
    float: left;
    width: 200px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    font-size: 20px;
    border-right: 1px dotted #FDE36B;

  }
  #menu ul li a{
    text-decoration: none;
    color: black;
    display:block;
  }
  #menu ul li a:hover{
    background-color:#FDE36B
  }
  #menu ul li ul li{
    display:none;
  }
  #menu ul li:hover ul li{
    display:block;
    min-width: 200px;
    text-align: center;
  }
  */
.nav{
  border-bottom: 1px dotted #FDE36B;
  text-align: left;
  background-color: #fbc13c;
}
#menu{
  margin-left: 30px;
  min-height: 70px;
  
}
#menu a {
  clear: left;
  text-decoration: none;
  color: black;
  margin: 0 10px;
  font-size:20px;
  line-height: 70px;
}
#menu a img{
    height: 68px;
    width:150px;
  }

label{
  margin-left: 40px;
  font-size: 24px;
  line-height: 70px;
  display: none;
  width: 26px;
  float: left;

}
#toggle{
  display: none;
}

@media only screen and (max-width:800px){
  label{
    display: block;
    cursor: pointer;
  }
  #menu{
    text-align: center;
    width: 100%;
    display: none;
    position: fixed;
    top: 102px;
    z-index: 5;
    background-color: #fff;
  }
  #menu a{
    display: block;
    border-bottom: 1px solid #FDE36B;
    margin: 0;
  }
  #toggle:checked + #menu {
    display: block;
  }
}
  </style>
