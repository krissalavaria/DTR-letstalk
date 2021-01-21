<template>
  <div>
    <input
      type="text"
      name="city_municipality_id"
      list="cities"
      class="form-control"
      placeholder="SELECT CITY"
      required
    />
    <datalist id="cities">
      <option v-for="result in cities" :key="result.ID" :value="result.ID">{{ result.citymun_desc }}</option>
    </datalist>
  </div>
</template>
<script>
export default {
  data() {
    return {
      cities: [],
    };
  },
  async mounted() {
    axios.get("api/cities").then((response) => {
      this.cities = Object.freeze(response.data);
    });
  },
};
</script>
