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
                    <input type="text" class="form-control mt-2" placeholder="Enter your email">
                  </div>
                  <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" class="form-control mt-2" placeholder="Enter your password">
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
                    <button type="button" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
