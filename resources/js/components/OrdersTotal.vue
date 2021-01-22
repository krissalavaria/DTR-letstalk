<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="users"
      :search-options="{
        enabled: true,
      }"
      :pagination-options="{
        enabled: true,
        perPage: 3,
      }"
    >
      <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field == 'action'">
          <a
            class="btn btn-primary btn-sm"
            @click="getUserOrders(props.row.id)"
            style="color: white"
            >View</a
          >
        </span>
        <span v-else>
          {{ props.formattedRow[props.column.field] }}
        </span>
      </template>
    </vue-good-table>

    <modal
      :width="1000"
      :height="600"
      :adaptive="true"
      name="orders-modal"
      style="z-index: 10"
    >
      <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title">List of Orders</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-sm-12 d-flex">
              <div class="table-responsive">
                <vue-good-table
                  max-height="300px"
                  :fixed-header="true"
                  :columns="orders_column"
                  :rows="orders"
                  :search-options="{ enabled: true }"
                  :pagination-options="{
                    enabled: true,
                  }"
                >
                </vue-good-table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  name: "my-component",
  data() {
    return {
      users: [],
      users_order: "",
      orders: [],
      order: "",
      columns: [
        {
          label: "Employee #",
          field: "employee_no",
        },
        {
          label: "Firstname",
          field: "first_name",
        },
        {
          label: "Lastname",
          field: "last_name",
        },
        {
          label: "View In/Out",
          field: "action",
        },
      ],

      orders_column: [
        {
          label: "Employee #",
          field: "employee_no",
        },
        {
          label: "Firstname",
          field: "first_name",
        },
        {
          label: "Total Credit",
          field: "sum",
        },
      ],
    };
  },

  methods: {
    getUserOrders(id) {
      axios
        .get("api/get_order_total?q=" + id)
        .then((response) => {
          this.orders = response.data;
        })
        .catch((err) => {
          console.log(err);
        });

      this.order = event.target.value;
      this.show();
    },

    show() {
      this.$modal.show("orders-modal");
    },

    hide() {
      this.$modal.hide("orders-modal");
    },
  },

  created() {
    axios.get("api/get_users").then((response) => {
      this.users = response.data;
    });
  },
};
</script>