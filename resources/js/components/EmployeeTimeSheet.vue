<template>
  <div>
    <vue-good-table
      :columns="time_records_column"
      :rows="time_records_row"
      :search-options="{
        enabled: true,
      }"
      :pagination-options="{
        enabled: true,
        perPage: 5,
      }"
    />
  </div>
</template>
<script>
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";

export default {
  data() {
    return {
      time_records_column: [
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
          label: "Temperature",
          field: "temperature",
        },
        {
          label: "Date Entry (Y-M-D : Time)",
          field: "created_at",
        },
      ],
      time_records_row: [],
    };
  },

  created() {
    axios.get("api/employee_time?q=" + this.auth_user.id).then((response) => {
      this.time_records_row = response.data;
    });
  },

  props: {
    auth_user: {
      required: true,
    },
  },

  components: {
    VueGoodTable,
  },

  methods: {},

  mount() {},
};
</script>