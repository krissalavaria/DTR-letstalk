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
    <!-- <input
      type="text"
      placeholder="Input for Barangay"
      v-model="query"
      @input="autoComplete"
      class="form-control"
      name="barangay_id"
      list="results"
      required
    />

    <div class="panel-footer" v-if="results.length">
      <datalist id="results">
        <option v-for="result in results" :key="result.ID" :value="result.ID" class="form-control">
          {{ result.desc }}
        </option>
      </datalist>
    </div> -->
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
