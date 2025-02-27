<template>
  <!-- Start Categories Section -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <h5>Filters</h5>
        <hr />
        <h6>Location</h6>
        <VueSelect :options="cities" label="name_en" v-model="filterData.city"></VueSelect>
        <hr>
        <h6>Availability</h6>
        <div style="display: flex; align-items: center; gap: 5px;">
          <input class="form-check" type="checkbox" id="weekdays" v-model="filterData.weekdays" />
            <label for="weekdays">Weekdays</label>
        </div>
        <div style="display: flex; align-items: center; gap: 5px;">
          <input class="form-check" type="checkbox" id="weekends" v-model="filterData.weekends" />
            <label for="weekends">Weekends</label>
        </div>
        <div style="display: flex; align-items: center; gap: 5px;">
          <input class="form-check" type="checkbox" id="poyadays" v-model="filterData.poyadays" />
            <label for="poyadays">Poya Days</label>
        </div>
        <div style="display: flex; align-items: center; gap: 5px;">
          <input class="form-check" type="checkbox" id="public_holydays" v-model="filterData.public_holidays" />
            <label for="public_holydays">Public Holydays</label>
        </div>
      </div>
      <div class="col-md-5">
      <div v-if="category || location">
        <h3>{{ category != null ? category : 'All Jobs' }} {{ location != null ? 'around ' + location : '' }} </h3>
        <div class="row">
          <div class="col-6">
            <div class="badge text-bg-light">Filter Applied</div>
          </div>
          <div class="col-6 text-end">
            <div class="badge text-bg-light">Sort By Recommended</div>
          </div>
        </div>
      </div>
      <div v-else>
        <h3>ALL Listed Jobs</h3>
      </div>
          <hr>
        <div class="item mb-3" style="max-width: 540px" v-for="job in jobPosts.data">
          <RouterLink class="row g-0" :to="'/job?id=' + job.job_post_id" >
            <div class="col-md-4 px-3">
              <img :src="`${$storagePath}` + job.images[0]?.file_path
                " class="img-fluid rounded-start" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-dark">{{ job.job_title }}</h5>
                <span class="card-text text-secondary">
                  {{ truncateWords(job.job_description, 8) }}
                </span>
                <p class="card-text">
                <div class="badge text-bg-success">{{ job.location }}</div>
                  <small class="text-body-secondary" style="float: right;">{{ timeAgo(job.created_at) }}</small>
                </p>
              </div>
            </div>
          </RouterLink>
        </div>
      </div>
      <div class="col-md-4">
        <div style="width: 100%; height:400px; background-color:rgb(248 249 250);"><center>Advertisement</center></div>
      </div>
    </div>
  </div>
<br>
  <!-- End Categories Section -->
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";
import { useRoute, useRouter } from 'vue-router';

let categories = ref([]);
let cities = ref([]);
let jobPosts = ref([]);
const route = useRoute();
const router = useRouter();
let category = ref(null);
let location = ref(null);
// Filter Variables
let filterData = ref({
  city: null,
  weekdays: true,
  weekends: true,
  poyadays: true,
  public_holidays: true,
});

function filter() { 
  if (filterData.value.city) {
    location.value = filterData.value.city.name_en;
  } else {
    location.value = null;
  }

  // Build query parameters dynamically
  const query = {};
  if (category.value) query.category = category.value;
  if (location.value) query.location = location.value;
  if (filterData.value.weekdays) query.weekdays = filterData.value.weekdays;
  if (filterData.value.weekends) query.weekends = filterData.value.weekends;
  if (filterData.value.poyadays) query.poyadays = filterData.value.poyadays;
  if (filterData.value.public_holidays) query.public_holidays = filterData.value.public_holidays;

  // Update route parameters
  router.push({ 
    path: '/jobs', 
    query: query // Only includes non-null values
  });

  fetchJobPosts();
}


// Watch for changes in city and update filter accordingly
watch(filterData.value, (filterValues) => {
  filter(); 
});


function timeAgo(createdDate) {
  const currentDate = new Date();
  const publishedAt = new Date(createdDate);
  const timeAgo = calculateTimeAgo(publishedAt, currentDate);

  function calculateTimeAgo(startDate, endDate) {
    const timeIntervals = {
      year: 365 * 24 * 60 * 60 * 1000,
      month: 30 * 24 * 60 * 60 * 1000,
      day: 24 * 60 * 60 * 1000,
      hour: 60 * 60 * 1000,
      minute: 60 * 1000,
    };

    let timeElapsed = endDate - startDate;
    const displayIntervals = [];

    for (const [interval, duration] of Object.entries(timeIntervals)) {
      const count = Math.floor(timeElapsed / duration);
      if (count > 0) {
        displayIntervals.push(
          `${count} ${interval}${count > 1 ? "s" : ""}`
        );
        timeElapsed -= count * duration;
        break;
      }
    }

    return displayIntervals.length > 0
      ? displayIntervals.join(", ") + " ago"
      : "just now";
  }
  return timeAgo;
}

const fetchCategories = async () => {
  try {
    const { data } = await axios.get("/category");
    categories.value = data.categories;
  } catch (error) {
    console.error("Failed to fetch categories:", error);
  }
};

const fetchCities = async () => {
  try {
    const { data } = await axios.get("/cities");
    cities.value = data.cities;
  } catch (error) {
    console.error("Failed to fetch cities:", error);
  }
};

const fetchJobPosts = async () => {
  const params = new URLSearchParams();
  
  if (category.value) {
    params.append('category', category.value);
  }
  
  if (location.value) {
    params.append('location', location.value);
  }

  const url = params.toString() 
    ? `/job-posts?${params.toString()}`
    : '/job-posts';

  try {
    const { data } = await axios.get(url);
    jobPosts.value = data.jobPosts;
  } catch (error) {
    console.error("Failed to fetch job posts:", error);
  }
};

onMounted(async () => {
  // Initialize values from route query parameters
  category.value = route.query.category;
  location.value = route.query.location;
  filterData.value.city = route.query.location;
  // Fetch all data concurrently
  await Promise.all([
    fetchCategories(),
    fetchCities(),
    fetchJobPosts()
  ]);
});

function truncateWords(text, limit) {
      if (!text) return "";
      return text.split(" ").slice(0, limit).join(" ") + (text.split(" ").length > limit ? "..." : "");
}
</script>
