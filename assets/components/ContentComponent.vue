<template>
    <main id="content">
         <div id="section-a" class="background-image" :style="{ backgroundImage: 'url(' + require('../assets/main-photo.jpeg') + ')' }" title="Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt">
            <h1> Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt</h1>
        </div>
        <trailer-component></trailer-component>
        <div id="line"></div>
        <div class="text-box">
        <p id="text">Oferta</p>
        </div>
        <offer-content-component></offer-content-component>
        <div id="line2"></div>
        <div class="text-box">
        <p id="text">Aktualności</p>
        </div>
        <div id="add">
            <h3 id="training-header">Trening umiejętności społecznych dla dzieci i młodzieży</h3>
            <img id="addphoto" src="../../public/img/Categories/trening.jpg">
            <p>Zapraszamy na trening umięjętności społecznych, które obejmują naukę:</p>
            <div id="treningList">
                <ul>
                    <li>zawierania znajomości</li>
                    <li>słuchania</li>
                    <li>zadawania pytań</li>
                    <li>odmawiania</li>
                    <li>inicjowania rozmowy</li>
                    <li>dyskutowania</li>
                    <li>reagowania na krytykę</li>
                    <li>radzenia sobie z uczuciami</li>
                    <li>wyrażania emocji</li>
                </ul>
            </div>
        </div>
    </main>

</template>

<script>
import TrailerComponent from './TrailerComponent'
import OfferComponent from './OfferComponent'
import OfferContentComponent from './OfferContentComponent'
export default {
  components: {
    TrailerComponent,
    OfferComponent,
    OfferContentComponent
  }
}
</script>

<style scoped>
#content{
    background-color: #ffffff;
    position: relative;
    margin:0;
    padding:0;
}
#section-a {
    min-height: 800px;
    color: #fff;
    text-align: right;
    grid-column: 1/-1;
    filter: contrast(140%);
}
#section-a h1{
    font-weight: 600;
    line-height: 1.5;
    float: left;
    margin-top: 0px;
    padding-top: 80px;
    padding-left: 70px;
    color: #000;
    max-width: 550px;
    font-size: 50px;
    text-align: center
}
.background-image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin:0px;
    padding:0px;
    width: 100%;
    height: 800px;
    opacity: 0.7;
}

    /*@media (min-width: 900px) {*/
        /*#section-a .background-image {*/
            /*background-position-y: -250px;*/
        /*}*/
    /*}*/
    #line {
        margin-top: 50px;
        border-top: 2px dotted #25D9E8;;
        z-index: -1;
    }
    #line2 {
        margin-top: 50px;
        border-top: 2px dotted #25D9E8;;
        z-index: -1;
    }
    #text{

    }
.text-box{
    margin:auto;
    position: relative;
    bottom:15px;
    width: 100px;
    background-color: rgb(255, 251, 210);
    background-color: #ffffff;
}
#add{
    width: 100%;
    margin-bottom: 100px;
}
#treningList {
    width: 100%;
    display: flex;
    justify-content: center;
    text-align: left;
}
#training-header{
    color: #25d9e8;
    margin: 10px 0;
}
#addphoto{
    max-width:320px;
    margin: 10px 0;
}
@media (max-width:820px){
    #section-a h1 {
        float: none;
        margin: auto;
        padding-left: 0px;
    }
    }
@media (max-width:550px){
    #section-a h1 {
        padding-top: 20px;
    }
}
</style>
