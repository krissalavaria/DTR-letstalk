<template>
  <div>
    <input
      type="text"
      name="barangay_id"
      list="barangays"
      class="form-control"
      placeholder="SELECT BARANGAY"
      required
    />
    <datalist id="barangays">
      <option v-for="result in barangays" :key="result.ID" :value="result.ID">{{ result.desc }}</option>
    </datalist>
  </div>
</template>
<script>
export default {
  data() {
    return {
      query: "",
      results: [],
      barangays: [],
      selected: "",
    };
  },
  created() {
    axios.get("api/barangays").then((response) => {
      this.barangays = Object.freeze(response.data);
    });
  },
  methods: {
    autoComplete() {
      this.results = [];
      if (this.query.length > 2) {
        axios
          .get("api/search-barangay", { params: { query: this.query } })
          .then((response) => {
            this.results = response.data;
          });
      }
    },
  },
};
</script>
