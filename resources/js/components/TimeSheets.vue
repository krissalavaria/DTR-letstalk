<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="users"
      :search-options="{
        enabled: true,
      }"
    >
      <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field == 'action'">
          <a
            class="btn btn-primary"
            @click="getUserTimeSheet(props.row.id)"
            style="color: white"
            >View all Entries</a
          >
        </span>
        <span v-else>
          {{ props.formattedRow[props.column.field] }}
        </span>
      </template>
    </vue-good-table>

    <modal name="time-sheet-modal"> This is my first modal </modal>
  </div>
</template>

<script>
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";

export default {
  data() {
    return {
      users: [],
      time_sheet: [],
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
      rows: [],
    };
  },

  created() {
    axios.get("api/get_users").then((response) => {
      this.users = response.data;
    });
  },

  components: {
    VueGoodTable,
  },

  methods: {
    getUserTimeSheet(id) {
      axios
        .get("api/get_temperature?q=" + id)
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.log(err);
        });
      this.show();
    },

    show() {
      this.$modal.show("time-sheet-modal");
    },
    hide() {
      this.$modal.hide("time-sheet-modal");
    },
  },

  mount() {
    this.show();
  },
};
</script>