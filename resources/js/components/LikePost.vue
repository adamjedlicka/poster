<template>
  <a class="like" @click="onClick">
    <i class="like icon" :class="{'red': dLiked}"></i>
    Likes: {{ dCount }}
  </a>
</template>

<script>
import axios from "axios";

export default {
  props: ["id", "liked", "count"],

  data() {
    return {
      dLiked: this.liked,
      dCount: this.count
    };
  },

  methods: {
    async onClick() {
      await axios.post(`/posts/like/${this.id}`);

      if (this.dLiked) {
        this.dCount--;
      } else {
        this.dCount++;
      }

      this.dLiked = !this.dLiked;
    }
  }
};
</script>
