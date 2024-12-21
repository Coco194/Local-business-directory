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
             <button @click="search" style="border-radius: 3px !important;" class="btn btn-primary" type="button" id="button-addon2">
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
           <div class="icon"></div>
           <h6>Fast & easy advertising</h6>
           <p class="text-secondary">
             Reach local customers quickly and advertise your business in
             minutes and skip the hassle.
           </p>
         </div>
         <div class="col-md-4">
           <div class="icon"></div>
           <h6>Top rated services</h6>
           <p class="text-secondary">
             Experience the best and quality services, discover top rated
             services near you.
           </p>
         </div>
         <div class="col-md-4">
           <div class="icon"></div>
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
     id="carouselExampleControlsNoTouching"
     class="carousel slide mt-4"
     data-bs-touch="false"
   >
     <div class="carousel-inner">
       <div class="container">
         <h3>Professional services</h3>
         <div class="carousel-item active">
           <div class="row row-cols-2 row-cols-md-4 g-4">
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="carousel-item active">
           <div class="row row-cols-2 row-cols-md-4 g-4">
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
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
   <section
     id="bisiness-section"
     class="carousel slide mt-4"
     data-bs-touch="false"
   >
     <div class="carousel-inner">
       <div class="container">
         <h3>Popular businesses</h3>
         <div class="carousel-item active">
           <div class="row row-cols-2 row-cols-md-4 g-4">
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Vito’s pizza</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="carousel-item active">
           <div class="row row-cols-2 row-cols-md-4 g-4">
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content.
                   </p>
                 </div>
               </div>
             </div>
             <div class="col">
               <div class="card">
                 <img
                   src="https://picsum.photos/200"
                   class="card-img-top"
                   alt="..."
                 />
                 <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">
                     This is a longer card with supporting text below as a
                     natural lead-in to additional content. This content is a
                     little bit longer.
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
   <!-- End Business Section -->
     <!-- Start Features Section -->
     <section>
       <div class="container">
         <div class="row align-items-center">
           <div class="col-md-7">
             <h2>Easily search and compare local businesses for your needs</h2>
             <p>
               Our vast business directory helps all businesses and customers
               connect together easily and get their work done.
             </p>
             <ul>
               <li>24 hours or less response time</li>
               <li>24 hours or less response time</li>
               <li>24 hours or less response time</li>
             </ul>
           </div>
           <div class="col-md-5 text-center">
             <img class="img" width="80%" src="" alt="" />
           </div>
         </div>
       </div>
     </section>
     <!-- End Features Section -->

     <!-- Start Features Section -->
     <section>
       <div class="container">
         <div class="row align-items-center">
           <div class="col-md-5 text-center">
             <img class="img" width="80%" src="" alt="" />
           </div>
           <div class="col-md-7">
             <h2>Easily search and compare local businesses for your needs</h2>
             <p>
               Our vast business directory helps all businesses and customers
               connect together easily and get their work done.
             </p>
             <ul>
               <li>24 hours or less response time</li>
               <li>24 hours or less response time</li>
               <li>24 hours or less response time</li>
             </ul>
           </div>
         </div>
       </div>
     </section>
     <!-- End Features Section -->
   <!-- Start FAQ Section -->
   <section class="container">
     <div class="row">
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
                 Accordion Item #2
               </button>
             </h2>
             <div
               id="collapseTwo"
               class="accordion-collapse collapse"
               data-bs-parent="#accordionExample"
             >
               <div class="accordion-body">
                 <strong>This is the second item's accordion body.</strong> It
                 is hidden by default, until the collapse plugin adds the
                 appropriate classes that we use to style each element. These
                 classes control the overall appearance, as well as the showing
                 and hiding via CSS transitions. You can modify any of this
                 with custom CSS or overriding our default variables. It's also
                 worth noting that just about any HTML can go within the
                 <code>.accordion-body</code>, though the transition does limit
                 overflow.
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
                 Accordion Item #3
               </button>
             </h2>
             <div
               id="collapseThree"
               class="accordion-collapse collapse"
               data-bs-parent="#accordionExample"
             >
               <div class="accordion-body">
                 <strong>This is the third item's accordion body.</strong> It
                 is hidden by default, until the collapse plugin adds the
                 appropriate classes that we use to style each element. These
                 classes control the overall appearance, as well as the showing
                 and hiding via CSS transitions. You can modify any of this
                 with custom CSS or overriding our default variables. It's also
                 worth noting that just about any HTML can go within the
                 <code>.accordion-body</code>, though the transition does limit
                 overflow.
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
                 Accordion Item #2
               </button>
             </h2>
             <div
               id="collapseFour"
               class="accordion-collapse collapse"
               data-bs-parent="#accordionExample"
             >
               <div class="accordion-body">
                 <strong>This is the second item's accordion body.</strong> It
                 is hidden by default, until the collapse plugin adds the
                 appropriate classes that we use to style each element. These
                 classes control the overall appearance, as well as the showing
                 and hiding via CSS transitions. You can modify any of this
                 with custom CSS or overriding our default variables. It's also
                 worth noting that just about any HTML can go within the
                 <code>.accordion-body</code>, though the transition does limit
                 overflow.
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
                 Accordion Item #3
               </button>
             </h2>
             <div
               id="collapseFive"
               class="accordion-collapse collapse"
               data-bs-parent="#accordionExample"
             >
               <div class="accordion-body">
                 <strong>This is the third item's accordion body.</strong> It
                 is hidden by default, until the collapse plugin adds the
                 appropriate classes that we use to style each element. These
                 classes control the overall appearance, as well as the showing
                 and hiding via CSS transitions. You can modify any of this
                 with custom CSS or overriding our default variables. It's also
                 worth noting that just about any HTML can go within the
                 <code>.accordion-body</code>, though the transition does limit
                 overflow.
               </div>
             </div>
           </div>
         </div>
         <small><a href="">Read more FAQ -></a></small>
       </div>
     </div>
   </section>
   <!-- End FAQ Section -->
   <!-- Start contact us Section -->
   <section>
     <div class="container">
       <div class="row align-items-center">
         <div class="col-md-12">
           <h3>
             Contact us
           </h3>
           <p>
             Do you have any queries or trouble using our website ? Please reach us out at LocalBusinessDirectory@gmail.com. 
             You can also find us on Instagram, Twitter or LinkedIn.  
           </p>
         </div>
       </div>
     </div>
   </section>
   <!-- End contact us Section -->
</template>

<script setup>
import { onMounted, ref } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";

let categories = ref([]);
let cities = ref([]);
let category = ref(null);
let location = ref(null);

function search() {
 const baseUrl = '/jobs/';
 const params = new URLSearchParams();

 if (category?.value?.category_name) {
   params.append('category', category.value.category_name);
 }

 if (location?.value?.name_en) {
   params.append('location', location.value.name_en);
 }

 const url = params.toString() 
   ? `${baseUrl}?${params.toString()}`
   : baseUrl;

 window.open(url, '_blank');
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