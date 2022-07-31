<script setup>
import TableRow from "./TableRow.vue";

defineProps({
  data: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <table>
    <thead>
      <tr>
        <th>Movie Name</th>
        <th>Year</th>
        <th>Audio</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="wow in data" :key="wow.id">
        <TableRow :movie="wow.movie" :year="wow.year" :audio="wow.audio" />
      </tr>
    </tbody>
  </table>
</template>


<style scoped>
th {
  font-weight: bold;
}
</style>