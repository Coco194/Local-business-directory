<template>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <RouterLink class="navbar-brand" to="/"><img src="/assets/img/logo.png" width="190px"></RouterLink>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/jobs">All Jobs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           {{ user != null ? user.name : 'Account' }}
          </a>
          <ul class="dropdown-menu" v-if="user == null">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Sign In</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal" href="#">Sign Up</a></li>
          </ul>
          <ul class="dropdown-menu" v-else>
            <li><a class="dropdown-item" href="#" @click="logOut">Log Out</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <RouterLink to="/post-job" class="btn btn-outline-success" type="submit">Post a Job</RouterLink>
      </form>
    </div>
  </div>
</nav>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav> -->
  <router-view/>

      <!-- Start Footer Section -->
      <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="/assets/img/logo.png" width="250px">
          </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
              <li class="mb-2 fs-5 fw-normal" style="list-style: none;">
                Home
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">
                <a href="/">Home</a>
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">About</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Careers</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Developers</li>
            </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
              <li class="mb-2 fs-5 fw-normal" style="list-style: none;">
                Links
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">
                <a href="/job/ExploreView">Explore</a>
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Resources</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Regulations</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Blog</li>
            </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
              <li class="mb-2 fs-5 fw-normal" style="list-style: none;">
                Socials
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Github</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">LinkedIn</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Instagram</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Twitter</li>
            </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
              <li class="mb-2 fs-5 fw-normal" style="list-style: none;">
                Others
              </li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Help and support</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Complaints</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Terms of use</li>
              <li class="mt-1 mb-1 text-secondary" style="list-style: none;">Contact us</li>
            </ul>
        </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">© 2024 Business Directory</div>
          <div class="col-md-6"><a href="#" style="float: right;">Privacy policy</a></div>
        </div>
      </div>
     </footer>
    <!-- End Footer Section -->
    <LoginView />
    <registerView />
</template>


<script setup>
import LoginView from './components/Login';
import registerView from './components/Register';

const user = JSON.parse(localStorage.getItem('user')) || null;

function logOut(){
  localStorage.removeItem('token');
  localStorage.removeItem('user');
  location.reload();
}
</script>