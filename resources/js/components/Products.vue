<template>
  <div>
    <button @click="print" class="btn btn-danger mb-3">PRINT MENU</button>
    <div id="products">
      <label for="filter-orders">FILTER ORDERS BY DATE</label>
      <input type="date" name="filter-orders" class="form-control" v-model="date" @keyup="getAllOrders()">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Total Orders</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="prod in products" :key="prod.id">
            <td>{{ prod.product_name }}</td>
            <td>{{ prod.total }}</td>
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
      date: "",
      products: [],
    };
  },
  methods: {
    print() {
      // Pass the element id here
      this.$htmlToPaper("products");
    },

    getAllOrders() {
      axios.get("api/all-orders?q=" + this.date).then((response) => {
      this.products = Object.freeze(response.data);
    });
    },
  },
};
</script>
