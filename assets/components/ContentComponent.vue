<template>
    <div id="content">
         <div id="section-a">
            <div class="background-image" :style="{ backgroundImage: 'url(' + require('../assets/image-from-rawpixel-id-383840-jpeg.jpg') + ')' }">
                ></div>
            <h1> Kompleksowa Fizjoterapia dzieci i dorosłych</h1>
        </div>
        <trailer-component></trailer-component>
        <article-component></article-component>
    </div>

</template>

<script>
import TrailerComponent from './TrailerComponent'
import OfferComponent from './OfferComponent'
import ArticleComponent from './ArticleComponent'
export default {
  components: {
    TrailerComponent,
    OfferComponent,
    ArticleComponent
  }
}
</script>

<style scoped>
#content{
    margin:0;
    padding:0;
    margin-top:30px;
}
#section-a {
    min-height: 400px;
    color: #fff;
    text-align: right;
}
#section-a h1{
    margin-top:0px;
    color: #000;
    padding-top: 15px;
}
#section-a .background-image {
    position: absolute;
    background-color: none;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 424px;
    opacity: 0.4;
}
</style>
