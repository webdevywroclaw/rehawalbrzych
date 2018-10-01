<template>
    <main id="content">
         <div id="section-a" title="Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt">
            <div class="background-image" :style="{ backgroundImage: 'url(' + require('../assets/image-from-rawpixel-id.jpg') + ')' }">
            </div>
            <h1> Centrum rehabilitacji i integracji sensorycznej dla dzieci i niemowląt</h1>
        </div>
        <trailer-component></trailer-component>
        <div id="line"></div>
        <div class="text-box">
        <p id="text">Oferta</p>
        </div>
        <offer-content-component></offer-content-component>
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
    background-color: rgb(255, 251, 210);
    background-color: #ffffff;
    position: relative;
    margin:0;
    padding:0;

}
#section-a {
    background-color: rgb(255, 251, 210);
    min-height: 500px;
    color: #fff;
    text-align: right;
    grid-column: 1/-1;
}
#section-a h1{
    font-weight: 400;
    line-height: 1.5;
    float: right;
    margin-top:0px;
    padding-top: 10px;
    padding-right: 10px;
    color: #000;
    opacity: 0.9;
    max-width: 500px;
    font-size: 46px;
    text-align: center;
}
#section-a .background-image {
    position: absolute;
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
    background-color: #ffffff;
}
</style>
