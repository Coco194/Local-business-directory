<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="loginModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="loginModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">
                        Login
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
                    <label>Email</label>
                    <input type="email" v-model="formData.email" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.email }" placeholder="Enter your email">
                    <div class="invalid-feedback">
                        {{ errors?.email ? errors.email[0] : '' }}
                    </div>
                  </div>
                  <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" v-model="formData.password" :class="{ 'form-control mt-2': true, 'is-invalid': errors?.password }" placeholder="Enter your password">
                    <div class="invalid-feedback">
                        {{ errors?.password ? errors.password[0] : '' }}
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
                    <button type="button" class="btn btn-primary" @click="login">
                        Login
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
    email: "",
    password: ""
});

async function login(){
  try {
        const response = await axios.post("/login", formData.value);
        if (response.status === 200) {
            localStorage.setItem("token", response.data.token);
            localStorage.setItem("user", JSON.stringify(response.data.user));
            window.location.reload();
        }
    } catch (error) {
        if (error.response?.status === 422) {
            errors.value = error.response.data.errors;
        }
        if (error.response?.status === 401) {
            toast("Unauthorized", "error");
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