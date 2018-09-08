<template>

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

<style>
    ul{
        list-style: none;
        padding: 0px;
        margin: 0px;
    }
    img{

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
        background-color: #FDE36B;
    }
</style>



