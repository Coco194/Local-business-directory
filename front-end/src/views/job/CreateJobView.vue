<template>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5>CREATE JOB POST</h5>
                <form @submit.prevent="createJobPost" enctype="multipart/form-data">
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Job Title</label>
                                <input v-model="formData.job_title" type="text"
                                    :class="{ 'form-control': true, 'is-invalid': errors?.job_title }" />
                                <div class="invalid-feedback">
                                    {{ errors?.job_title ? errors.job_title[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Category</label>
                                <VueSelect :class="{ 'is-invalid': errors?.category }" v-model="formData.category"
                                    :options="categories" label="category_name" placeholder="Select Category">
                                </VueSelect>
                                <div class="invalid-feedback">
                                    {{ errors?.category ? errors.category[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Job Description</label>
                                <textarea v-model="formData.job_description" rows="3"
                                    :class="{ 'form-control': true, 'is-invalid': errors?.job_description }"></textarea>
                                <div class="invalid-feedback">
                                    {{ errors?.job_description ? errors.job_description[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Contact Info</label>
                                <input type="text" v-model="formData.contact" :class="{ 'is-invalid': errors?.contact, 'form-control': true }" />
                                <div class="invalid-feedback">
                                    {{ errors?.contact ? errors.contact[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Images</label>
                                <input multiple type="file" @change="onFileChange" :class="{ 'is-invalid': errors?.images, 'form-control': true }" />
                                <div class="invalid-feedback">
                                    {{ errors?.images ? errors.images[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Location</label>
                                <VueSelect :class="{ 'is-invalid': errors?.location }" v-model="formData.location"
                                    :options="cities" label="name_en"></VueSelect>
                                <div class="invalid-feedback">
                                    {{ errors?.location ? errors.location[0] : '' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="mb-2">Availability</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input v-model="formData.weekdays" class="form-check-input" type="checkbox"
                                                id="Weekdays" />
                                            <label class="form-check-label" for="Weekdays">
                                                Weekdays
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input v-model="formData.weekends" class="form-check-input" type="checkbox"
                                                id="Weekends" />
                                            <label class="form-check-label" for="Weekends">
                                                Weekends
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input v-model="formData.poyadays" class="form-check-input" type="checkbox"
                                                id="poyadays" />
                                            <label class="form-check-label" for="poyadays">
                                                Poya Days
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input v-model="formData.public_holidays" class="form-check-input"
                                                type="checkbox" id="public-holydays" />
                                            <label class="form-check-label" for="public-holydays">
                                                Public Holidays
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success form-control">
                                Create Job Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";

let categories = ref([]);
let cities = ref([]);
const formData = ref({
    job_title: "",
    category: null,
    job_description: "",
    contact: "",
    location: null,
    weekdays: false,
    weekends: false,
    poyadays: false,
    public_holidays: false,
    images: [], // File references
});
const errors = ref({});



async function createJobPost() {
    // Prepare FormData object for Axios
    const payload = new FormData();
    payload.append("job_title", formData.value.job_title);
    payload.append("category_id", formData.value.category?.category_id || ""); // Adjust based on category structure
    payload.append("job_description", formData.value.job_description);
    payload.append("contact", formData.value.contact);
    payload.append("location", formData.value.location?.name_en || ""); // Adjust based on location structure
    payload.append("weekdays", formData.value.weekdays ? 1 : 0); // Use boolean directly
    payload.append("weekends", formData.value.weekends ? 1 : 0); // Use boolean directly
    payload.append("poyadays", formData.value.poyadays ? 1 : 0); // Use boolean directly
    payload.append("public_holidays", formData.value.public_holidays ? 1 : 0); // Use boolean directly

    // Append images
    formData.value.images.forEach((file, index) => {
        payload.append(`images[${index}]`, file); // Append files to FormData
    });

    try {
        const response = await axios.post("/create-job-post", payload, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        toast("JobPost created successfully", "success");
        resetForm();
    } catch (error) {
        if (error.response?.status === 422) {
            errors.value = error.response.data.errors;
        }
        toast(error.response?.data?.message || error.message, "error");
    }
}


function onFileChange(event) {
    formData.value.images = Array.from(event.target.files); // Convert FileList to Array
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

function resetForm() {
    formData.value = {
        job_title: "",
        category: null,
        job_description: "",
        location: null,
        weekdays: false,
        weekends: false,
        poyadays: false,
        public_holidays: false,
        images: [],
    };
}

onMounted(() => {
    axios
        .get("/category")
        .then((response) => {
            categories.value = response.data.categories;
        })
        .catch((error) => {
            console.error(error);
        });
    axios
        .get("/cities")
        .then((response) => {
            cities.value = response.data.cities;
        })
        .catch((error) => {
            console.error(error);
        });
});
</script>
