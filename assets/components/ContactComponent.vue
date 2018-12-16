<template>
    <div>
        <div class="cont">
            <address class="box">
                <font-awesome-icon id="phone" icon="phone"></font-awesome-icon>
                <h3>{{telephone}}</h3>
            </address>
            <address class="box">
                <font-awesome-icon id="addres" icon="map-marker-alt"></font-awesome-icon>
                <h3>{{adres}}</h3>
            </address>
            <address class="box">
                <font-awesome-icon id="at" icon="at"></font-awesome-icon>
                <h3>{{mail}}</h3>
            </address>

            <address class="box">
                <font-awesome-icon id="fb" :icon="['fab', 'facebook-f']"></font-awesome-icon>
                <div class="fb-page"
                     data-href="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/"
                     data-width="250" data-height="70" data-small-header="true" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote
                            cite="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/"
                            class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/REHAWa%C5%82brzych-Centrum-Rehabilitacji-i-Integracji-Sensorycznej-232658286876630/">REHAWałbrzych
                        Centrum Rehabilitacji i Integracji Sensorycznej</a></blockquote>
                </div>
            </address>
        </div>
        <google-map></google-map>

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
        },
        methods: {
            reloadFacebook() {

                FB.XFBML.parse();
                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, "script", "facebook-jssdk"));
            }
        },
        created: function () {

            FB.init({
                appId: 'your-app-id',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v3.1'
            });
            FB.XFBML.parse();

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        }
    }
</script>

<style scoped>
    .cont {
        margin-top: 20px;
        display: grid;
        /*grid-gap: 10px;*/
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    }

    .box {
        display: flex;
        align-items: center;
        /*justify-content: center;   */
    }

    .parent1 {
        width: 100%;
        display: grid;
        grid-template-columns: 1fr;
    }

    #phone, #addres, #at, #fb {
        height: 70px;
        width: 70px;
        color: rgb(37,217,232);
        margin: 5px 0 5px 30px;
    }

    .box {
        border: 1px dotted rgb(37,217,232);
        margin: 10px;
    }

    h3 {
        margin: auto;
    }

    .fb-page {
        margin: auto;
    }

    @media(max-width: 700px){
        .cont {

            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        h3 {
            font-size: 20px;
        }
        .box {
            flex-direction: column;
        }
    }
</style>
