<template>
  <div id="footer">

    <div class="footer-col" v-for="item in items" :key="item.title">
    
    <h3>{{ item.title }}</h3>
        <li v-for="item2 in item.content" :key="item2"> {{item2}}</li>
  </div>

    <div class="footer-col">
      <h3>News Letter</h3>
      <p></p>
      <div class="subscribe">
        <input type="text" placeholder="Your Email Address" />
        <a href="#" class="yellow">SUBSCRIBE</a>
      </div>
    </div>

    <div class="copyright">
      <p>
        Copyright @2021 All rights reserved | this template is made my PAUUU
      </p>
      <div class="pro-links">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-linkedin-in"></i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
      { title: 'Top Products', content:['Manage Reputation', 'Power Tools', 'Managed Website', 'Marketing Service'] },
      { title: 'Quick Links', content:['Jobs','Brand Assets', 'Investor Relations', 'Term of Service']},
      { title: 'Features', content:['Manage Reputation', 'Power Tools', 'Managed Website', 'Marketing Service']},
      { title: 'Resources', content:['Guides', 'Research', 'Experts', 'Marketing Service']}
    ]
    };
  },
  mounted() {
    console.log("Navigation mounted.");
  },
};
</script>
