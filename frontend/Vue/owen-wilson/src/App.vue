<script setup>
import axios from "axios";
import Title from "./components/Title.vue";
import Table from "./components/Table.vue";
import { BACKEND_HOST } from "./Constants";
import API from "./services/API";
</script>

<template>
  <header>
    <img
      alt="Vue logo"
      class="logo"
      src="./assets/logo.svg"
      width="125"
      height="125"
    />

    <div class="wrapper">
      <Title title="Owen Wilson Wows" />
    </div>
  </header>

  <main>
    <Table v-if="show" :data="wows" />
    <p v-else>{{ message }}</p>
  </main>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      wows: [],
      show: false,
      message: "Please wait for a sec",
    };
  },
  methods: {
    fetchData: async function () {
      const response = await API.getExternalData();

      if (response.status === 200) {
        const newData = await API.getInternalData();
        this.wows = newData.data;
        this.show = true;
      } else {
        this.message = "failed to get wow data, please try again later";
      }
    },
  },
  beforeMount() {
    this.fetchData();
  },
};
</script>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
