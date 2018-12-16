<template>
    <div>
        <div id="copyrights">
            <font-awesome-icon id="icc" icon="copyright"></font-awesome-icon>
            <p id="authors">Piotr Wanio & Jędrzej Zygadło</p>
        </div>
        <div id="cookiesinfo">
            <p id="cookiesright">Informujemy, iż w celu optymalizacji treści dostępnych w naszym serwisie, dostosowania ich do Państwa indywidualnych potrzeb korzystamy z informacji zapisanych za pomocą plików cookies na urządzeniach końcowych użytkowników. Pliki cookies użytkownik może kontrolować za pomocą ustawień swojej przeglądarki internetowej. Dalsze korzystanie z naszego serwisu internetowego, bez zmiany ustawień przeglądarki internetowej oznacza, iż użytkownik akceptuje stosowanie plików cookies. Czytaj więcej <router-link :to="'/politykaprywatnosci'" id="clink">Polityka prywatności</router-link></p>
            <font-awesome-icon @click="closerights()" id="ict" icon="times"></font-awesome-icon>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            closerights() {
                var cook= document.getElementById('cookiesright')
                var buttoncook= document.getElementById('ict')
                cook.style.display = "none";
                buttoncook.style.display = "none";
            }
        }
    }
</script>

<style scoped>
    #icc{
        width: 20px;
        height: 20px;
        color: #25D9E8;
    }
    #copyrights{
        margin-top:40px;
        display: flex;
        justify-content: center;
    }
    p{
        font-size: 12px;
    }
    #authors{
        margin: 0;
        margin-left: 20px;
        font-size: 16px;
    }

    #cookiesinfo{
        margin-top: 20px;
        display: flex;
        justify-content: flex-start;
    }
    #ict{
        width: 15px;
        height: 15px;
        color: #25D9E8;
        margin-left: 20px;
    }
    button{
        border:none;
        background: none;
        width: 15px;
        height: 15px;
    }
    #cookiesright{
        margin-left: 15px;
        text-align: justify;
    }
    #clink{
        color: #25D9E8;
    }
</style>
