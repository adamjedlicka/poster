<template>
  <a @click="onClick" class="item">
      <slot></slot>
  </a>
</template>

<script>
import axios from "axios";

export default {
  props: ["url"],

  methods: {
    async onClick() {
      await axios.post(this.url);

      window.location.reload();
    }
  }
};
</script>
