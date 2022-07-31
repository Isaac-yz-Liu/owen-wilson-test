<script setup>
defineProps({
  movie: {
    type: String,
    required: true,
  },
  year: {
    type: Number,
    required: true,
  },
  audio: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <th>{{ movie }}</th>
  <th>{{ year }}</th>
  <th>
    <audio controls>
      <source :src="audio" type="audio/mpeg" />
      Your browser does not support the audio tag.
    </audio>
  </th>
</template>

