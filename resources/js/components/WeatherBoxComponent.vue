<template>
  <div>
    <div class="search-box">
      <input
        type="text"
        class="search-bar"
        placeholder="Search a city in Japan"
        v-model="city"
      />
      <button class="search" @click="fetchWeather()">
        <i class="fa fa-search fa-2x"></i>
      </button>
    </div>
  <!-- if -->
    <div class="weather-wrap" v-if="weatherChecker() == '200'">
      <div class="location-box">
        <div class="location">{{ weather.city }}</div>
        <div class="date">{{ dateBuilder() }}</div>
      </div>

      <div class="weather-box">
        <div class="temp">{{ roundOffTemp() }}°c</div>
        <div class="weather">{{ weather.description }}</div>
      </div>
    </div>

    <!-- else if-->
    <div v-else-if="weatherChecker() == '404'" class="weather-msg">
      <h1>Sorry,Its not a city in Japan</h1>
    </div>

    <!-- else -->
    <div v-else class="weather-msg">
      <h1>Start checking the weather !!!</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url:'',
      city: "",
      weather: {},
    };
  },
  created() {
    this.checkURL();
  },
  methods: {
    checkURL() {
      let url = window.location.href;
      if (url != "http://127.0.0.1:8000/") {
        var split = url.split("/");
         url = split.slice(0, split.length - 1).join("/") + "/";
      }
      this.url = url+'api/';
    },
    weatherChecker() {
      // return typeof this.weather.main;
      return this.weather.code;
    },
    fetchWeather() {
      // fetch(`${this.url_base}weather?q=${this.query}&units=metric&APPID=${this.api_key}`)
      fetch(`${this.url}load-weather/${this.city}`)
        .then((res) => {
          return res.json();
        })
        .then(this.setResults);
    },
    setResults(results) {
      this.weather = results;
    },
    roundOffTemp() {
      let temp = isNaN(this.weather.temp) ? "0" : Math.round(this.weather.temp);
      return temp;
    },
    dateBuilder() {
      let d = new Date();
      let months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];
      let days = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ];
      let day = days[d.getDay()];
      let date = d.getDate();
      let month = months[d.getMonth()];
      let year = d.getFullYear();
      return `${month} ${date}, ${year} | ${day}`;
    },
  },
};
</script>