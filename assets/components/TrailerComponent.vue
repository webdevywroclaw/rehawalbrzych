
<template>
<ul>
  <li  v-for="item in items" v-bind:key="item">
      <div class="box1" :id="item.cl">
      <h3 class="box-title">{{item.boxTitle}}</h3>
          <p v-if="item.cl === 'number1'" >Poniedziałek 8.00-16.00<br> Wtorek 8.00-16.00 <br Środa 8.00-16.00<br> Czwartek 8.00-16.00 <br> Piątek 8.00-16.00 <br> Sobota nieczynne <br> Niedziela nieczynne</p>
          <p v-else>loremlorem</p>
          <button type="button" class="icon">
        <img v-bind:src="item.src" class="button-image">
      </button>
      </div>
  </li>
</ul>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          boxTitle: 'Godziny Przyjęć',
          src: require('../assets/photo-camera.png'),
          cl: 'number1'
        },
        { boxTitle: 'Poznaj nas',
          src: require('../assets/user-silhouette.png'),
          cl: 'number2'
        },
        {
          boxTitle: 'Najnowszy sprzęt',
          src: require('../assets/nut-icon.png'),
          cl: 'number3'
        },
        { boxTitle: 'Galeria',
          src: require('../assets/photo-camera.png'),
          cl: 'number4'
        }
      ]
    };
  }
};
</script>

<style scoped>
ul{
  margin: 0;
  padding: 0;
  list-style: none;
}

.box1 {
  height: minmax(300px, auto);
}
.box-title {
  margin: 0;
  padding: 0;
}
#number1 {
  background: #fbfc9a;
}
#number2 {
  background: #fde36b;
}
#number3 {
  background: #fbc13c;
}
#number4 {
  background: #fb933c;
}
.icon{
    padding: 0;
    margin-bottom: 10px;
    width: 40px;
    height: 40px;
    border: 1px solid #FBC13C;
    border-radius: 100%;
    background: #FDE36B;
    text-align: center;
}
.button-image{
    width: 50%;
}
@media (min-width: 700px){
    ul li {
        width: 25%;
    }
    ul {
        display: flex;
        justify-content: space-around;

    }

}
</style>
