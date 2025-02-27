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
            <img src="/assets/img/logo.png" width="190px">
          </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
          </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
          </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
          </ul>
        </div>
          <div class="col-md-2">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
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