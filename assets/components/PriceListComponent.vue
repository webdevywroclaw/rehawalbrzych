<template>
<!--
        <table class="table">
            <tbody>
            <tr>
                <td><strong>Nazwa metody</strong></td>
                <td><strong>Cena(zł)</strong></td>
            </tr>
            <li v-for="methodApi in methodsApi" :key="methodApi" v-bind:methodApi="methodApi">
                <tr>
                    <td>{{methodApi.metName}}</td>
                    <td>{{methodApi.metPrice}}</td>
                </tr>
            </li>
            </tbody>
        </table>
-->
<div id="pricecontener">
    <div class="price-list-title">
        <span id="name">Nazwa metody</span>
        <span id="price">Cena(zł)</span>
    </div>
    <div class="price-list" v-for="methodApi in methodsApi" :key="methodApi" v-bind:methodApi="methodApi">
        <span class="singlename" >
            <router-link v-if="methodApi.metBody != ''" class="methodlink" :to="'/metoda/'+methodApi.metId">{{methodApi.metName}}
            <font-awesome-icon id="external-link-alt" icon="external-link-alt"></font-awesome-icon>
            </router-link>
            <v-else>{{methodApi.metName}}</v-else>
        </span>
        <span class="singleprice">{{methodApi.metPrice}}</span>
    </div>
</div>
</template>

<script>
    export default{
        data() {
            return {
                methodsApi:[],

            }
        },

        methods: {
            fetchMethods() {
                this.$http.get('/api/methods',
                    {
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json'
                        }
                    }
                )
                    .then(response => response.json())
                    .then(result => {
                        this.methodsApi = result
                        this.loaded = true
                    })
            }
        },
        created: function () {
            this.fetchMethods();
        }

    }
</script>

<style scoped>

    li{
        list-style: none;
        padding: 0px;
        margin: 0px;
    }
    img{

    }
    #pricecontener{
        margin-top: 20px;
    }
    .table{
        width:60%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 1%;
    }
    .table td,tr {
        font-size: 16px;
        border-top: 1px solid #FDE36B;
        padding: 5px 12px;
        text-align: center;
        vertical-align: top;
    }
    .table tbody tr:nth-child(even) td{
        background-color: #FD996B;
    }
    .price-list{
        display:grid;
        grid-template-columns: 1fr 1fr;
        padding:10px;
    }
    .price-list-title{
        padding:10px;
        display:grid;
        grid-template-columns: 1fr 1fr;
    }
    #name{
         background-color: #FECB6E;
        padding:10px;
     }
    #price{
        background-color: #ffb796;
        padding:10px;
    }
    .singlename{
        background-color: #ffd68c;
        padding:10px;
    }
    .singleprice{
        background-color: #FFF1CD;
        padding:10px;
    }
    .singlename:hover{
        background-color: #FECB6E;
    }

    .methodlink:active, .methodlink:link, .methodlink:visited, .methodlink:hover {
        color: black;
        text-decoration: none;
    }
</style>



