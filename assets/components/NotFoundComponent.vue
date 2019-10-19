<template>
  <div>
    <h1>Błąd 404 - Przepraszamy, nie znaleziono strony</h1>

    <p>
      Szukana strona nie została znaleziona. Sprawdź, czy adres URL jest poprawny, lub
      <a
        href="/"
      >wróć do strony głównej</a>.
    </p>
  </div>
</template>

<script>
export default {
  created: function() {
    // Redirect outside the app using plain old javascript
    window.location.href = "/_error/404";
  }
};
</script>

<style scoped>
#content {
  background-color: rgb(255, 251, 210);
  position: relative;
  margin: 0;
  padding: 0;
}
#section-a {
  min-height: 500px;
  color: #fff;
  text-align: right;
  grid-column: 1/-1;
}
#section-a p {
  float: right;
  margin-top: 0px;
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
  background-color: none;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin: 0px;
  padding: 0px;
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
#text {
}
.text-box {
  margin: auto;
  position: relative;
  bottom: 15px;
  width: 100px;
  background-color: rgb(255, 251, 210);
}
</style>
