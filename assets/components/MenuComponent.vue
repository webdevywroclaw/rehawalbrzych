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
    <!--
        <div class="nav">
            <label for="toggle">&#9776;</label>
        <input type="checkbox" id="toggle"/>
            <div id="menu">
            <router-link to="/"><img src="../assets/newlogo2.png"></router-link>
            <router-link to="/terapeuci">O nas</router-link>
            <router-link to="/oferta">Metody</router-link>
            <router-link to="/cennik">Cennik</router-link>
            <router-link to="/artykuly">Artykuły</router-link>
            <router-link to="/galeria">Galeria</router-link>
            <router-link to="/kontakt">Kontakt</er-link>
            </div>
            </div>
      -->

        <nav class="navbar" id="nav-bar">
            <span id="navbar-toggle">
                <button type="button" @click="add()" id="but">&#9776</button>
            </span>
            <span id="navbar-logo">
                <router-link to="/"><img src="https://rehawalbrzych.vot.pl/build/images/newlogo2.png" id="logo"></router-link>
            </span>
            <ul id="main-nav">
                <li @click="close()"><router-link to="/"><img src="https://rehawalbrzych.vot.pl/build/images/newlogo2.png" id="image"></router-link></li>
        <li @click="close()"><router-link to="/terapeuci" class="nav-links">O nas</router-link></li>
        <li @click="close()"><router-link to="/oferta" class="nav-links" >Metody</router-link></li>
        <li @click="close()"><router-link to="/cennik" class="nav-links">Cennik</router-link></li>
        <li @click="close()"><router-link to="/artykuly" class="nav-links">Artykuły</router-link></li>
        <li @click="close()"><router-link to="/galeria" class="nav-links">Galeria</router-link></li>
        <li @click="close()"><router-link to="/kontakt" class="nav-links">Kontakt</router-link></li>
        </ul>
        </nav>



</template>
<script>

    export default {
        methods: {

            add() {
                var mainNav = document.getElementById('main-nav')
                var navBar = document.getElementById('nav-bar')
                if (mainNav.classList.contains('active')) {
                    mainNav.style.display = "none";
                    mainNav.classList.remove('active');
                }
                else {
                    mainNav.style.display = "flex";
                    mainNav.classList.add('active');
                    navBar.style.marginBottom = "500px";
                }
            },
            close(){
                var mainNav = document.getElementById('main-nav')
                mainNav.style.display = "none";
                mainNav.classList.remove('active');
            }

        }
    }

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
/*
    .nav{
      border-bottom: 1px dotted #E5E2C8;
      text-align: left;
      background-color: #F6F2D5;
      background-color: #ffeac1;
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
      margin: 0px;
      margin-left: 40px;
      font-size: 24px;
      line-height: 70px;
      display: none;
      width: 26px;
      float: left;

    }
    #toggle{
      display: none;
      margin:0px;
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
        background-color: #fff;
        margin: 0;
      }
      #menu a{
        display: block;
          width: 100%;
        border-bottom: 1px solid #FDE36B;
        margin: 0;
      }
      #toggle:checked + #menu {
        display: block;
        z-index: 1;
      }
    }

*/

    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    button{
      width: 40px;
      height: 40px;
      background: none;
      border: none;
    }
    .navbar {
        min-height: 70px;
        padding: 0;
        margin: 0;
      font-size: 18px;
      background: #ffeac1;
      padding-bottom: 10px;
      z-index: 5;
        border-bottom: 1px dotted #E5E2C8;
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
      padding: 10px 0;
        width: 100%;
        border-bottom: 1px dotted orange;

    }
    .nav-links
    {
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
        margin-left: 20px;
        cursor: pointer;
    }
    #image{
        display: none;
    }
    #logo{
        display: block;
        height: 68px;
        width:150px;
        z-index: 10;
    }
    .nav-links:hover {
        color: #FECB6E;
    }
    @media screen and (min-width: 810px) {

      .navbar {
        display: flex;
        justify-content: left;
        padding-bottom: 0;
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
          margin: 20px;
          font-size:20px;
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
        #image{
            display: block;
            height: 68px;
            width:150px;
            z-index: 10;
        }
}

</style>