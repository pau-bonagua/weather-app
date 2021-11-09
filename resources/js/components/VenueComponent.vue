<template>
  <div id="venue">
    <h1>Our Popular Venues Near You</h1>
    <p>Memorable events don't just happen. They happen to be our business.</p>

    <div class="venue-inputs">
      <input class="input-city" type="text" v-model="city" />
      <input class="input-limit" type="text" v-model="limit" />
      <button class="venue-search" @click="fetchVenue()"><i class="fa fa-search" ></i></button>
    </div>

    <div class="venue-box" v-if="venues.length > 0">
      <div class="venues" v-for="venue in venues" :key="venue.id">
        <img :src="'img/venue.jpg'" />
        <div class="details">
          <h6>{{ venue.type }}</h6>
          <span>{{ venue.name }}</span>
          <h6>{{ venue.address }}</h6>
          <div style="display: flex; justify-content: space-between">
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <span>(239)</span>
            </div>
            <div class="pro-links">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-google"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div v-else>
      <h1>Sorry, It's not a valid city name</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "",
      limit: 5,
      city: "Osaka",
      venues: {},
    };
  },
  created() {
    this.checkURL();
    this.fetchVenue();
  },
  methods: {
    checkURL() {
      let url = window.location.href;
      if (url != "http://127.0.0.1:8000/") {
        var split = url.split("/");
        url = split.slice(0, split.length - 1).join("/") + "/";
      }
      this.url = url + 'api/';
    },
    limitChecker() {
      if (this.limit < 5 || this.limit > 20) {
        this.limit = 5;
      }
    },
    venueChecker() {
      return this.weather.code;
    },
    fetchVenue() {
      this.limitChecker();
      fetch(`${this.url}load-venues/${this.city}/${this.limit}`)
        .then((res) => {
          return res.json();
        })
        .then(this.setResults);
    },
    setResults(results) {
      this.venues = results;
    },
  },
};
</script>