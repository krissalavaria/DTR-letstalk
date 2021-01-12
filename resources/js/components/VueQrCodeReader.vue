<template>
  <div>
    <p class="error">{{ error }}</p>

    <p class="decode-result">
      <b>Entry Scanned:</b>
      <input
        type="text"
        class="form-control"
        v-model="result"
        ref="result"
        v-focus
        disabled
      />
    </p>

    <qrcode-stream @decode="onDecode" @init="onInit" />

    <br />
  </div>
</template>

<script>
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from "vue-qrcode-reader";
import _ from "lodash";

export default {
  components: { QrcodeStream },

  data() {
    return {
      result: "",
      error: "",
      time_sheet: {},
      user_id: 0,

      // Searching for User
      temperature: 0,
    };
  },

  methods: {
    searchUser: _.debounce(function () {
      axios
        .get("api/search_user?q=" + this.result)
        .then((response) => {
          this.temperature = prompt("Input Temperature");
          this.user_id = response.data.user[0].id;

          console.log("User:", response.data.user[0].first_name);
          console.log("Temperature: ", this.temperature);
          console.log("User ID:", response.data.user[0].id);

          this.time_sheet = {
            user_account_id: this.user_id,
            temperature: this.temperature,
          };

          console.log("Time Sheet: ", this.time_sheet);

          // Insert to Time Sheet Table
          axios.post("api/insert_entry", this.time_sheet);
        })
        .catch((err) => {
          console.log(err);
        });
    }),

    onDecode(result) {
      this.result = result;
      this.searchUser();
    },

    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    },
  },
};
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
</style>