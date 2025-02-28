<template>
  <div class="page-layout">
    <!-- Header Section -->
    <Header />

    <!-- Main Content -->
    <main class="container my-4">
      <div class="row">
        <!-- Filter Bar (Left Column) -->
        <aside class="col-md-3">
          <div class="filter-bar p-3 border bg-light">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Filters</h5>
              <button class="btn btn-sm btn-link text-muted" @click="clearFilters">Clear All</button>
            </div>
            <hr />

            <!-- Tags Section -->
            <div class="mb-3">
              <h5>Tags:</h5>
              <ul class="list-unstyled mt-3">
                <li>Colombo</li>
                <li>Kandy</li>
              </ul>
            </div>
            <hr />

            <!-- Locations Section -->
            <div class="mb-3">
              <h5>Locations:</h5>
              <ul class="list-unstyled mt-3 mt-3">
                <li>Kandy</li>
                <li>Colombo</li>
                <li>Mawanella</li>
                <li>Kegalle</li>
                <li><button type="button" class="btn btn-link text-primary fs-6 p-0 mt-1">
                  Show More</button>
                </li>
              </ul>
            </div>
            <hr />

            <!-- Featured Section -->
            <div class="mb-3">
              <h5>Locations:</h5>
              <ul class="list-unstyled mt-3">
                <li>Restaurant</li>
                <li>Hotel</li>
                <li>Saloon</li>
                <li>Mechanic</li>
                <li>Theater</li>
                <li><button type="button" class="btn btn-link text-primary fs-6 p-0 mt-1">
                  Show More</button>
                </li>
              </ul>
            </div>
            <hr />

            <!-- Working status Section -->
            <div class="mb-3">
              <h5>Working status</h5>
              <ul class="list-unstyled mt-3">
                <li>Open</li>
                <li>Closed</li>
                <li><button type="button" class="btn btn-link text-primary fs-6 p-0 mt-1">
                  Show More</button>
                </li>
              </ul>
              
            </div>
            <hr />

            <!-- Features Filter -->
            <div class="mb-3">
              <h5>Features</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="feature1" />
                <label class="form-check-label" for="feature1">Free Wi-Fi</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="feature2" />
                <label class="form-check-label" for="feature2">Parking</label>
              </div>
            </div>
            <hr />

            <!-- Price Range Filter -->
            <div class="mb-3">
              <label for="price-range" class="form-label">Price Range</label>
              <input type="range" class="form-range" id="price-range" min="0" max="100" />
              <div class="d-flex justify-content-between">
                <span>$0</span>
                <span>$100</span>
              </div>
            </div>
            <hr />

            <!-- Apply Filters Button -->
            <button type="button" class="btn btn-primary w-100">Apply Filters</button>
          </div>
        </aside>

        <!-- Main Content (Right Section) -->
        <section class="col-md-9">
          <div class="row">
            <div class="col-md-8">
              <div class="p-2 border bg-light">Search/services/cleaning services</div>
              <div class="display-6 fw-bold border bg-light">Popular cleaning services around colombo</div>
            </div>
            <div class="col-md-4">
              <div class="p-3 border bg-light">Maps</div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <!-- Footer Section -->
    <Footer />
  </div>
</template>

<script>
export default {
  methods: {
    clearFilters() {
      // Add logic to clear filters, e.g., reset the state of applied filters
      console.log('Filters cleared');
    }
  }
}
</script>

<style scoped>
.filter-bar {
  position: sticky;
  top: 0;
}
</style>
