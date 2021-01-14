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

    <modal :width="1000" :height="600" :adaptive="true" name="time-sheet-modal" style="z-index: 10;">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">List of Employees In and Out</h4>
          <p class="card-category">Manage Employees Entries</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-sm-12 d-flex">
              <div class="table-responsive">
                <download-csv class="btn btn-primary" :data="time_sheet" name="time_sheet.csv">Export Data</download-csv>
                <vue-good-table
                  max-height="300px"
                  :fixed-header="true"
                  :columns="time_sheet_column"
                  :rows="time_sheet"
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
import "vue-good-table/dist/vue-good-table.css";
import { VueGoodTable } from "vue-good-table";

export default {
  data() {
    return {
      time_date: "",
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
      time_sheet_column: [
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
          filterOptions: {
            enabled: true,
          },
        },
      ],
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
          this.time_sheet = response.data;
        })
        .catch((err) => {
          console.log(err);
        });

      this.time_date = event.target.value;

      this.show();
    },

    filterbyDate(event) {
      this.time_sheet = event.target.value;
      axios
        .get("api/get_by_date?q=" + this.time_sheet)
        .then((response) => {
          this.time_sheet = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
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