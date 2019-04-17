<template>
  <a @click="onClick" class="item">{{ text }}</a>
</template>

<script>
import axios from "axios";

export default {
  props: ["url", "follows"],

  computed: {
    text() {
      return this.follows ? "Unfollow" : "Follow";
    }
  },

  methods: {
    async onClick() {
      await axios.post(this.url);

      window.location.reload();
    }
  }
};
</script>
