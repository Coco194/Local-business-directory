<template>
  <!-- Start Header Section -->
  <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="mb-2">
              Search, compare, connect with local businesses for all your needs.
            </h2>
            <p class="mb-4">
              Your one stop place for all your local business needs whether
              you’re a customer or an employer.
            </p>
            <div class="input-group mb-3">
              <VueSelect v-model="category" placeholder="Are you looking for...?" style="width: 300px;" :options="categories" label="category_name"></VueSelect>
              <VueSelect v-model="location" placeholder="Location" style="width: 130px;" :options="cities" label="name_en"></VueSelect>
              <button @click="search()" style="border-radius: 3px !important;" class="btn btn-primary" type="button" id="button-addon2">
                Search
              </button>
            </div>
            <small>Ready to list your business ? <a href="">list now</a></small>
          </div>
          <div class="col-md-6 text-center">
            <img
              width="80%"
              src="https://images.business.com/app/uploads/2011/06/12131215/Leadership-Skills.png"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>
 <!-- End Header Section -->

 <!-- Start Services Section -->
 <section class="gray-section">
   <div class="container">
     <div class="row">
       <div class="col-md-4">
         <img src="/assets/img/rocket.png" width="30px" class="mb-2">
         <h6>Fast & easy advertising</h6>
         <p class="text-secondary">
           Reach local customers quickly and advertise your business in
           minutes and skip the hassle.
         </p>
       </div>
       <div class="col-md-4">
         <img src="/assets/img/star.png" width="30px" class="mb-2">
         <h6>Top rated services</h6>
         <p class="text-secondary">
           Experience the best and quality services, discover top rated
           services near you.
         </p>
       </div>
       <div class="col-md-4">
        <img src="/assets/img/trophy.png" width="30px" class="mb-2">
         <h6>Industry professionals</h6>
         <p class="text-secondary">
           Leave the work to the experts, hire the top talent for guaranteed
           results.
         </p>
       </div>
     </div>
   </div>
 </section>
 <!-- End Services Section -->

    <!-- Start Categories Section -->

    <section
   id="bisiness-section"
   class="carousel slide mt-4"
   data-bs-touch="false"
 >
   <div class="carousel-inner"  style="margin-top: 10rem">
     <div class="container">
       <h2>Professional Services</h2>
       <div class="carousel-item active">
            <div class="row row-cols-2 row-cols-md-4 g-4">
              <div class="col" v-for="category in categories">
                <div class="card" @click="search(category.category_name)" style="cursor: pointer">
                  <img
                    :src="category.category_image"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ category.category_name }}</h5>
                    <p class="card-text">
                      {{ category.category_description }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
     </div>
   </div>
   <button
     class="carousel-control-prev"
     type="button"
     data-bs-target="#bisiness-section"
     data-bs-slide="prev"
   >
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button
     class="carousel-control-next"
     type="button"
     data-bs-target="#bisiness-section"
     data-bs-slide="next"
   >
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
 </section>
    <section
      id="carouselExampleControlsNoTouching"
      class="carousel slide mt-4"
      data-bs-touch="false"
    >
      <div class="carousel-inner">
        <div class="container">
          <h3>Popular businesses</h3>
          <div class="carousel-item active">
            <div class="row row-cols-2 row-cols-md-4 g-4">
              <div class="col" v-for="jobPost in jobPosts.data">
                <div class="card" style="cursor: pointer">
                  <img
                    :src="$storagePath + jobPost.images[0].file_path"
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ jobPost.job_title }}</h5>
                    <p class="card-text">
                      {{ truncateWords(jobPost.job_description,10) }}
                    </p>
                  </div>
                  <RouterLink :to="'/job?id=' + jobPost.job_post_id" class="btn stretched-link"></RouterLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </section>
    <!-- End Categories Section -->


 <!-- Start Business Section -->

 <!-- End Business Section -->
   <!-- Start Features Section -->
   <section>
     <div class="container" style="margin-top: 10rem">
       <div class="row align-items-center">
         <div class="col-md-7">
           <p style="font-size: 1rem; color: #068006;">Simple</p>
           <h1>Easily search and compare local businesses for your needs</h1>
           <p style="font-size: 1.125rem; color: #6a6a6a; margin-bottom: 2rem;">
             Our vast business directory helps all businesses and customers
             connect together easily and get their work done.
           </p>
           <ul style="color: #068006; line-height: 1.75rem">
             <li>✅ 24 hours or less response time</li>
             <li>✅ Free consultation</li>
             <li>✅ Professional services</li>
           </ul>
         </div>
         <div class="col-md-5 text-center">
           <img class="img" width="80%" src="https://www.totodreammarketing.com/wp-content/uploads/2021/03/seo-graphic.jpg" alt="" />
         </div>
       </div>
     </div>
   </section>
   <!-- End Features Section -->

   <hr width="77.5%" style = "margin: 8rem auto 8rem auto; color: #8a8a8a;">


   <!-- Start Features Section -->
   <section>
     <div class="container">
       <div class="row align-items-center">
         <div class="col-md-5 text-center">
           <img class="img" width="80%" src="https://newadventureweb.com/wp-content/uploads/2021/01/Google-Map-Results.jpg" alt="" />
         </div>
         <div class="col-md-7">
           <p style="font-size: 1rem; color: #804306;">Trustworthy</p>
           <h1>Easily search and compare local businesses for your needs</h1>
           <p style="font-size: 1.125rem; color: #6a6a6a; margin-bottom: 2rem;">
             We have partnered with some of the best service providers from all over 
             the island with cheap but high quality service.
           </p>
           <ul style="color: #804306; line-height: 1.75rem">
             <li>✅ Certified professionals</li>
             <li>✅ Compare reviews</li>
             <li>✅ Maximized user satisfaction</li>
           </ul>
         </div>
       </div>
     </div>
   </section>
   <!-- End Features Section -->
 <!-- Start FAQ Section -->
 <section class="container">
   <div class="row" style="margin: 10rem auto 10rem auto">
     <div class="col-md-5">
       <h3>Frequently asked questions</h3>
     </div>
     <div class="col-md-7">
       <div class="accordion" id="accordionExample">
         <div class="accordion-item">
           <h2 class="accordion-header">
             <button
               class="accordion-button collapsed"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#collapseTwo"
               aria-expanded="false"
               aria-controls="collapseTwo"
             >
               Is there any hidden fee 
             </button>
           </h2>
           <div
             id="collapseTwo"
             class="accordion-collapse collapse"
             data-bs-parent="#accordionExample"
           >
             <div class="accordion-body">
               No we do not charge any fee for our website
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header">
             <button
               class="accordion-button collapsed"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#collapseThree"
               aria-expanded="false"
               aria-controls="collapseThree"
             >
               Do you charge money for it
             </button>
           </h2>
           <div
             id="collapseThree"
             class="accordion-collapse collapse"
             data-bs-parent="#accordionExample"
           >
             <div class="accordion-body">
               No we do not charge any money for any of our services its all completely free
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header">
             <button
               class="accordion-button collapsed"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#collapseFour"
               aria-expanded="false"
               aria-controls="collapseFour"
             >
               Do you assist in getting the service
             </button>
           </h2>
           <div
             id="collapseFour"
             class="accordion-collapse collapse"
             data-bs-parent="#accordionExample"
           >
             <div class="accordion-body">
               No we only assist you in contacting them and we do not
               take responsibility for anything other than getting the 
               two parties in contact with each other
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header">
             <button
               class="accordion-button collapsed"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#collapseFive"
               aria-expanded="false"
               aria-controls="collapseFive"
             >
               Is this completely free
             </button>
           </h2>
           <div
             id="collapseFive"
             class="accordion-collapse collapse"
             data-bs-parent="#accordionExample"
           >
             <div class="accordion-body">
               Yes this is completely free for all
             </div>
           </div>
         </div>
       </div>
       <small>
         <a href="" style="color: #004700;">
           Read more FAQ ->
         </a></small>
     </div>
   </div>
 </section>
 <!-- End FAQ Section -->
</template>

<script setup>
import { onMounted, ref } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";
import { useRouter } from 'vue-router';
const router = useRouter();

let categories = ref([]);
let cities = ref([]);
let jobPosts = ref([]);
let category = ref(null);
let location = ref(null);

function search(categoryName = null) {
  const baseUrl = '/jobs/';
  const params = new URLSearchParams();

  if(categoryName != null){
    params.append('category', categoryName);
  }

  if (category?.value?.category_name) {
    params.append('category', category.value.category_name);
  }

  if (location?.value?.name_en) {
    params.append('location', location.value.name_en);
  }

  const url = params.toString() 
    ? `${baseUrl}?${params.toString()}`
    : baseUrl;

    router.push(url);
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
    axios
        .get("/job-posts")
        .then((response) => {
          jobPosts.value = response.data.jobPosts;
          
        })
        .catch((error) => {
            console.error(error);
        });
});

function truncateWords(text, limit) {
      if (!text) return "";
      return text.split(" ").slice(0, limit).join(" ") + (text.split(" ").length > limit ? "..." : "");
}
</script>
