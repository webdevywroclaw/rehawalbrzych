<template>
    <div id="content">
         <div id="section-a">
            <div class="background-image" :style="{ backgroundImage: 'url(' + require('../assets/baby-baby-feet-barefoot-1172922.jpg') + ')' }">
            </div>
            <p> Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt</p>
        </div>
        <trailer-component></trailer-component>
        <div id="line"></div>
        <div class="text-box">
        <p id="text">Oferta</p>
        </div>
        <offer-content-component></offer-content-component>
    </div>

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
    background-color: rgb(255, 251, 210);
    position: relative;
    margin:0;
    padding:0;

}
#section-a {
    min-height: 500px;
    color: #fff;
    text-align: right;
    grid-column: 1/-1;
}
#section-a p{
    float: right;
    margin-top:0px;
    padding-top: 10px;
    padding-right: 10px;
    color: #000;
    opacity: 0.9;
    text-align: center;
}
#section-a .background-image {
    position: absolute;
    background-color: none;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin:0px;
    padding:0px;
    width: 100%;
    height: 500px;
    opacity: 0.7;
}

    /*@media (min-width: 900px) {*/
        /*#section-a .background-image {*/
            /*background-position-y: -250px;*/
        /*}*/
    /*}*/
    #line {
        margin-top: 50px;
        border-top: 2px dotted orange;
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
}
</style>
