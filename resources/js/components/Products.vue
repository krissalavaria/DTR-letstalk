<template>
  <div>
    <button @click="print" class="btn btn-danger mb-3">PRINT MENU</button>
    <div id="products">
      <table class="table table-bordered">
        <thead class="text-primary">
          <th scope="col">Name</th>
          <th scope="col">Price</th>
        </thead>
        <tbody>
          <tr v-for="prod in products" :key="prod.id">
            <td scope="row">{{ prod.product_name }}</td>
            <td>{{ prod.price }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      output: null,
      products: [],
    };
  },
  methods: {
    print() {
      // Pass the element id here
      this.$htmlToPaper("products");
    },
  },
  async mounted() {
    axios.get("api/products").then((response) => {
      this.products = Object.freeze(response.data);
    });
  },
};
</script>
