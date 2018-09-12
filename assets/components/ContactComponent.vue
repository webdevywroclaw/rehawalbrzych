<template>
    <div>
        <div class="cont">
            <div class="box">
                <font-awesome-icon id="phone" icon="phone"></font-awesome-icon>
                <h3>{{telephone}}</h3>
            </div>
            <div class="box">
                <font-awesome-icon id="addres" icon="map-marker-alt"></font-awesome-icon>
                <h3>{{adres}}</h3>
            </div>
            <div class="box">
                <font-awesome-icon id="at" icon="at"></font-awesome-icon>
                <h3>{{mail}}</h3>
            </div>
        </div>
        <google-map></google-map>
        <div class="parent1">
            <div class="parent2">
                <div class="fb-page"
                     data-href="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/"
                     data-tabs="timeline" data-height="350"  data-small-header="false" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote
                            cite="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/"
                            class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/">REHAWałbrzych
                        Centrum Rehabilitacji i Integracji Sensorycznej</a></blockquote>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import GoogleMap from "./GoogleMap"

    export default {
        data() {
            return {
                adres: 'ul. Wrocławska 5, 58-332 Wałbrzych',
                telephone: '+48 784 891 919',
                mail: 'rehawałbrzych@gmail.com'
            }
        },
        components: {
            GoogleMap
        }
    }
</script>

<style scoped>
    .cont{
        display:grid;
        grid-template-columns: repeat(3,1fr);
    }
    .parent1{
        width:100%;
        display: grid;
        grid-template-columns: 1fr;
    }
    parent2{
        width: 320px;
    }
    #phone,#addres,#at{
        height:70px;
        width: 70px;
        color: #fb933c;
        margin:5px;
    }
    #at{
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
    }
    .box{
        border: 1px dotted #fb933c;
        margin: 10px;
    }
</style>
