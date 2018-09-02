
<template>
<ul>
  <li  v-for="item in items" v-bind:key="item">
      <div class="box1" :id="item.class">
      <h3 class="box-title">{{item.boxTitle}}</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil placeat recusandae rem suscipit amet
        mollitia magni corporis natus, ipsam aliquid.</p>
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
          class: 'number1'
        },
        { boxTitle: 'Poznaj nas',
          src: require('../assets/user-silhouette.png'),
          class: 'number2'
        },
        {
          boxTitle: 'Najnowszy sprzęt',
          src: require('../assets/nut-icon.png'),
          class: 'number3'
        },
        { boxTitle: 'Galeria',
          src: require('../assets/photo-camera.png'),
          class: 'number4'
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
