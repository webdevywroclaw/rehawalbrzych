<template>

<ul>
<div class="methods" v-if="$route.name === 'MethodsComponent'">
    <li v-for="methodApi in methodsApi" :key="methodApi" v-bind:methodApi="methodApi" >
        <div class="met" v-if="methodApi.categoryCat.catId === $route.params.idcat">
            <h1>{{methodApi.metName}}</h1>
            <router-link :to="{ name: 'MethodSingleComponent',params:{id: methodApi.metId}}"><button>More</button></router-link>
        </div>

    </li>
</div>
    <!--
<li v-for="method in methods">
    <div class="met" v-if="$route.params.idcat === '1' && method.cat_id === '1'">
      <h1>{{method.title}}</h1>
      <img v-bind:src="method.photo">
      <router-link :to="{ name: 'MethodSingleComponent',params:{id: method.title}}"><button>More</button></router-link>
    </div>

    <div class="met" v-if="$route.params.idcat === '2' && method.cat_id === '2'">
      <h1>{{method.title}}</h1>
       <img v-bind:src="method.photo">
      <router-link :to="{ name: 'MethodSingleComponent',params:{id: method.title}}"><button>More</button></router-link>
    </div>

    <div class="met" v-if="$route.params.idcat === '3' && method.cat_id === '3'">
      <h1>{{method.title}}</h1>
       <img v-bind:src="method.photo">
      <router-link :to="{ name: 'MethodSingleComponent',params:{id: method.title}}"><button>More</button></router-link>
    </div>
 
    <div class="met" v-if="$route.params.idcat === '4' && method.cat_id === '4'">
      <h1>{{method.title}}</h1>
       <img v-bind:src="method.photo">
      <router-link :to="{ name: 'MethodSingleComponent',params:{id: method.title}}"><button>More</button></router-link>
    </div>
</li>
</div>
<div v-else-if="$route.name === 'PriceListComponent'">
<table class="table">
  <tbody>
    <tr>
      <td><strong>Nazwa metody</strong></td>
      <td><strong>Cena(zł)</strong></td>
    </tr>
    <li v-for="method in methods">
      <tr>
       <td>{{method.title}}</td>
       <td>{{method.price}}</td>
      </tr>
    </li>
  </tbody>
</table>
</div>

-->
 <div v-else>
      <method-single-component></method-single-component>
 </div>
</ul>
</template>

<script>
import MethodSingleComponent from './MethodSingleComponent'
export default{
  data() {
    return {
        methodsApi:[],
      methods: [
        {met_id: '1', title: 'metoda1',photo: require('../assets/messi.jpg'), body:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sapien ex, porttitor vel egestas vitae, tincidunt ut massa. Sed ornare ultricies magna, ut accumsan enim fermentum sed.', cat_id: '1',gal_id: '1',price: '200' },
        {met_id: '2', title: 'metoda2',photo: require('../assets/terstegen.jpg'),body:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sapien ex, porttitor vel egestas vitae, tincidunt ut massa. Sed ornare ultricies magna, ut accumsan enim fermentum sed.', cat_id: '1',gal_id: '2', price: '300' },
        {met_id: '3', title: 'metoda3',photo: require('../assets/pique.jpg'),body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sapien ex, porttitor vel egestas vitae, tincidunt ut massa. Sed ornare ultricies magna, ut accumsan enim fermentum sed.', cat_id: '3',gal_id: '3', price: '400' },
        {met_id: '4', title: 'metoda4',photo: require('../assets/rakitic.jpg'),body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sapien ex, porttitor vel egestas vitae, tincidunt ut massa. Sed ornare ultricies magna, ut accumsan enim fermentum sed.', cat_id: '4',gal_id: '4', price: '500' }
      ]
    }
  },
    components: {
      MethodSingleComponent
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
.methods{
  display:grid;
  grid-template-columns: repeat(2,1fr);
}
.met{
  border: 1px solid black;
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
