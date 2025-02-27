<template>
  <!-- Modal -->
  <div
      class="modal fade"
      id="registerModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="registerModalLabel"
      aria-hidden="true"
  >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="registerModalLabel">
                      Sign Up
                  </h1>
                  <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                  ></button>
              </div>
              <div class="modal-body">
                <div class="form-group mb-2">
                  <label>Name</label>
                  <input type="text" v-model="formData.name" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.name }" placeholder="Enter your name">
                  <div class="invalid-feedback">
                    {{ errors?.name ? errors.name[0] : '' }}
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label>Type</label>
                  <select :class="{ 'form-control mt-2': true, 'is-invalid': errors?.role }" v-model="formData.role">
                  <option value="" selected disabled>Select Type</option>
                    <option value="customer">Customer</option>
                    <option value="service-provider">Service Provider</option>
                  </select>
                  <div class="invalid-feedback">
                    {{ errors?.role ? errors.role[0] : '' }}
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label>Email</label>
                  <input type="email" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.email }" v-model="formData.email" placeholder="Enter your email">
                  <div class="invalid-feedback">
                    {{ errors?.email ? errors.email[0] : '' }}
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label>Password</label>
                  <input type="password" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.password }" v-model="formData.password" placeholder="Enter your password">
                  <div class="invalid-feedback">
                    {{ errors?.password ? errors.password[0] : '' }}
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label>Confirm Password</label>
                  <input type="password" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.password_confirmation }" v-model="formData.password_confirmation" placeholder="Re enter your password">
                  <div class="invalid-feedback">
                    {{ errors?.password_confirmation ? errors.password_confirmation[0] : '' }}
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                  >
                      Close
                  </button>
                  <button @click="register" type="button" class="btn btn-primary">
                      Register
                  </button>
              </div>
          </div>
      </div>
  </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";
import { useRouter } from 'vue-router';
const router = useRouter();

const errors = ref({});
let formData = ref({
    name: "",
    role: "",
    email: "",
    password: "",
    password_confirmation: "",
});

async function register(){
  try {
        const response = await axios.post("/register", formData.value);
        toast("Account created successfully", "success");
        resetForm();
      } catch (error) {
        if (error.response?.status === 422) {
          errors.value = error.response.data.errors;
        }
    }
}

function toast(message, icon) {
    Swal.fire({
        toast: true,
        position: "top-end",
        text: message,
        icon: icon,
        timer: 3000,
        showConfirmButton: false,
    });
}
</script>