<template>
  <a class="delete" @click="onClick">
    <i class="trash icon"></i>
    Delete
  </a>
</template>

<script>
import axios from "axios";

export default {
  props: ["id"],

  methods: {
    async onClick() {
      await axios.delete(`/posts/${this.id}`);

      window.location.reload();
    }
  }
};
</script>
