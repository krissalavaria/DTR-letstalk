<template>
  <div>
    <!-- <button @click="print" class="btn btn-success mb-3">PRINT ORDERS</button> -->
    <download-csv class="btn btn-success mb-3" :data="orders" name="orders.csv">Export</download-csv>
    <div id="orders">
      <label for="filter-orders">FILTER ORDERS</label>
      <input
        type="text"
        name="filter-orders"
        class="form-control"
        placeholder="Input Category Ex: Breakfast, Lunch, etc."
        v-model="category"
        @keyup="getAllOrders()"
      />
      <input
        type="date"
        name="filter-orders"
        class="form-control"
        v-model="date"
        @keyup="getAllOrders()"
      /> <br>
      <vue-good-table
        max-height="300px"
        style="overflow-x: scroll;"
        :fixed-header="true"
        :columns="orders_column"
        :rows="orders"
        :pagination-options="{
          enabled: true,
          perPage: 3,
        }"
      >
      </vue-good-table>
      <!-- <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Order #</th>
            <th scope="col">Employee #</th>
            <th>Name</th>
            <th>Cubicle</th>
            <th>Product</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in orders" :key="item.ID">
            <td>{{ item.order_no }}</td>
            <td>{{ item.employee_no }}</td>
            <td>{{ item.first_name+' '+item.last_name }}</td>
            <td>{{ item.room_cubicle_number }}</td>
            <td>{{ item.product_name }}</td>
            <td>{{ item.qty }}</td>
          </tr>
        </tbody>
      </table> -->
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
      category: "",
      date: "",
      orders: [],
      orders_column: [
        {
          label: "Order #",
          field: "order_no",
        },
        {
          label: "Employee #",
          field: "employee_no",
        },
        {
          label: "First Name",
          field: "first_name",
        },
        {
            label: "Last Name",
            field: "last_name",
        },
        {
          label: "Cubicle #",
          field: "room_cubicle_number",
        },
        {
          label: "Product",
          field: "product_name",
        },
        {
          label: "Quantity",
          field: "qty",
        },
      ],
    };
  },
  methods: {
    print() {
      // Pass the element id here
      this.$htmlToPaper("orders");
    },

    getAllOrders() {
      axios
        .get("api/daily-orders?q=" + this.category + "&" + this.date)
        .then((response) => {
          this.orders = Object.freeze(response.data);
        });
    },
  },
  components: {
    VueGoodTable,
  },
};
</script>
