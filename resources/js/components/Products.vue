<template>
  <div>
    <button @click="print" class="btn btn-danger mb-3">PRINT MENU</button>
    <div id="products">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="prod in products" :key="prod.id">
            <td>{{ prod.product_name }}</td>
            <td>{{ prod.price }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";
export default {
  data() {
    return {
      output: null,
      products: [],
      columns: [
        {
          label: "Name",
          field: "product_name",
        },
        {
          label: "Price",
          field: "price",
        },
      ],
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
