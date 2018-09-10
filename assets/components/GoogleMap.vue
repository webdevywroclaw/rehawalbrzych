<template>
    <div>
        <gmap-map
                :center="center"
                :zoom="16"
                style="width:100%;  height: 600px;"
        >
            <gmap-marker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    @click="center=m.position"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
    export default {
        name: "GoogleMap",
        data() {
            return {
                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: {lat: 50.796096, lng: 16.288382899999988},
                markers: [
                    {"position":{"lat":50.796096,"lng":16.288382899999988}}
                ],
                places: [
                    {
                        "address_components": [{
                            "long_name": "5",
                            "short_name": "5",
                            "types": ["street_number"]
                        }, {
                            "long_name": "Wrocławska",
                            "short_name": "Wrocławska",
                            "types": ["route"]
                        }, {
                            "long_name": "Wałbrzych",
                            "short_name": "Wałbrzych",
                            "types": ["locality", "political"]
                        }, {
                            "long_name": "wałbrzyski",
                            "short_name": "wałbrzyski",
                            "types": ["administrative_area_level_2", "political"]
                        }, {
                            "long_name": "Województwo dolnośląskie",
                            "short_name": "Województwo dolnośląskie",
                            "types": ["administrative_area_level_1", "political"]
                        }, {
                            "long_name": "Polska",
                            "short_name": "PL",
                            "types": ["country", "political"]
                        }, {"long_name": "58-300", "short_name": "58-300", "types": ["postal_code"]}],
                        "adr_address": "<span class=\"street-address\">Wrocławska 5</span>, <span class=\"postal-code\">58-300</span> <span class=\"locality\">Wałbrzych</span>, <span class=\"country-name\">Polska</span>",
                        "formatted_address": "Wrocławska 5, 58-300 Wałbrzych, Polska",
                        "geometry": {
                            "location": {
                                "lat": {
                                    "_custom": {
                                        "type": "function",
                                        "display": "<span>ƒ</span> ()"
                                    }
                                }, "lng": {"_custom": {"type": "function", "display": "<span>ƒ</span> ()"}}
                            },
                            "viewport": {
                                "f": {"b": 50.7947171197085, "f": 50.79741508029149},
                                "b": {"b": 16.287151769708544, "f": 16.289849730291508}
                            }
                        },
                        "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png",
                        "id": "1e0a5154d9078fc0ba24a8db5939983ab165dd18",
                        "name": "Wrocławska 5",
                        "place_id": "ChIJzeQJNgNUDkcRIjXHpgEquX8",
                        "plus_code": {"compound_code": "Q7WQ+C9 Wałbrzych, Polska", "global_code": "9F2RQ7WQ+C9"},
                        "reference": "CmRbAAAAPuzCDxPE_1qoZCYKtJHuTTGqyQeD2Wu-hhuiu20VkUOAk7EGbKqTClkYNLS9pZv7_kXSd7YuCvyLdb6maXKuNvkh7-JM-c-VpG6bXK-6vkzo7BeI72fVOdWZOoSDRY73EhBWPI3nF4kbpUZ9AsoBl2nXGhRVSuY7qgaxY3EZ_IsGYG_wZh2ohA",
                        "scope": "GOOGLE",
                        "types": ["street_address"],
                        "url": "https://maps.google.com/?q=Wroc%C5%82awska+5,+58-300+Wa%C5%82brzych,+Polska&ftid=0x470e54033609e4cd:0x7fb92a01a6c73522",
                        "utc_offset": 120,
                        "vicinity": "Wałbrzych",
                        "html_attributions": []
                    }
                ],
                currentPlace: null
            };
        },

        methods: {
            // receives a place object via the autocomplete component
            setPlace(place) {
                this.currentPlace = place;
            },
            addMarker() {
                if (this.currentPlace) {
                    const marker = {
                        lat: this.currentPlace.geometry.location.lat(),
                        lng: this.currentPlace.geometry.location.lng()
                    };
                    this.markers.push({position: marker});
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                }
            }
        }
    };
</script>

