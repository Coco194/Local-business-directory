<template>
    <!-- Start Categories Section -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7">
                        <img
                            :src="`${$storagePath}` + featureImage"
                            width="100%"
                        />
                        <center>
                          <div class="mt-2">
                                    <img v-for="image in jobPost.images"
                                        @click="
                                            setFeatureImage(image.file_path)
                                        "
                                        :src="`${$storagePath}${image.file_path}`"
                                        width="70px"
                                        height="70px"
                                        class="m-1"
                                        style="cursor: pointer;"
                                    />
                                </div>
                        </center>
                    </div>
                    <div class="col-md-5">
                        <h3>{{ jobPost.job_title }}</h3>
                        <b>{{ jobPost.category?.category_name }}</b
                        ><br /><br />
                        <p>{{ jobPost.job_description }}</p><hr>
                        <ul>
                            <li>Profile: <a href="">Amila Perera</a></li>
                            <li>Location: {{ jobPost.location }}</li>
                            <li>
                                Availability
                                <ul>
                                    <span
                                        :class="{
                                            badge: true,
                                            'text-bg-success': jobPost.weekdays,
                                            'text-bg-danger': !jobPost.weekdays,
                                        }"
                                        >Weekdays</span
                                    >
                                </ul>
                                <ul>
                                    <span
                                        :class="{
                                            badge: true,
                                            'text-bg-success': jobPost.weekends,
                                            'text-bg-danger': !jobPost.weekends,
                                        }"
                                        >weekends</span
                                    >
                                </ul>
                                <ul>
                                    <span
                                        :class="{
                                            badge: true,
                                            'text-bg-success': jobPost.poyadays,
                                            'text-bg-danger': !jobPost.poyadays,
                                        }"
                                        >Poya days</span
                                    >
                                </ul>
                                <ul>
                                    <span
                                        :class="{
                                            badge: true,
                                            'text-bg-success':
                                                jobPost.public_holidays,
                                            'text-bg-danger':
                                                !jobPost.public_holidays,
                                        }"
                                        >Public Holidays</span
                                    >
                                </ul>
                            </li>
                            <li>
                                Contact:
                                <a :href="'tel:' + jobPost.contact"
                                    >{{ jobPost.contact }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <br />
                <br />
                <br />
                <br />
                <hr />
                <h5>Comments</h5>
                <div class="row">
                    <div class="col-md-12">
                        <textarea
                            :class="{
                                'form-control': true,
                                'is-invalid': errors?.comment,
                            }"
                            v-model="comment"
                            rows="3"
                            placeholder="Add a comment"
                        ></textarea>

                        <button
                            class="btn btn-dark mt-2"
                            style="float: right"
                            @click="postComment()"
                        >
                            Post Comment
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-body" v-for="comment in comments">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img
                                            src="https://media.istockphoto.com/id/2175615388/vector/vector-flat-illustration-stylish-pastel-profile-of-a-man-avatar-user-profile-person-icon.jpg?s=612x612&w=0&k=20&c=ljrLaB-2MJfN0yWiutBX0BPKGflEvxiKmbSuLYiExyg="
                                            width="70"
                                            style="border-radius: 50%"
                                        />
                                    </div>
                                    <div class="col-md-11">
                                        <h6>@{{ comment.user.name }}</h6>
                                        <span>{{ comment.comment }}</span
                                        ><br />
                                        <small>{{
                                            timeAgo(comment.created_at)
                                        }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <!-- End Categories Section -->
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import VueSelect from "vue3-select";
import axios from "axios";
import Swal from "sweetalert2";
import { useRoute, useRouter } from "vue-router";

let jobPost = ref([]);
let comment = ref(null);
let errors = ref([]);
const route = useRoute();
let id = ref(null);
let comments = ref([]);
let city = ref(null);
let featureImage = ref(null);

function setFeatureImage(image) {
    featureImage.value = image;
}

// Watch for changes in city and update filter accordingly
watch(city, (newCity) => {
    if (newCity) {
        filter();
    }
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

const fetchJobPost = async () => {
    try {
        const { data } = await axios.get("/job-post/" + id.value);
        jobPost.value = data.jobPost;
        featureImage.value = data.jobPost.images[0].file_path;
    } catch (error) {
        console.error("Failed to fetch job post:", error);
    }
};

const fetchComments = async () => {
    try {
        const { data } = await axios.get("/comments/" + id.value);
        comments.value = data.comments;
    } catch (error) {
        console.error("Failed to fetch job post:", error);
    }
};

const postComment = async () => {
    try {
        const response = await axios.post("/post-comment", {
            comment: comment.value,
            job_post_id: id.value,
        });
        fetchComments();
        comment.value = null;
    } catch (error) {
        if (error.response?.status === 422) {
            errors.value = error.response.data.errors;
        }
    }
};

onMounted(async () => {
    // Initialize values from route query parameters
    id.value = route.query.id;
    // Fetch all data concurrently
    await Promise.all([fetchJobPost(), fetchComments()]);
});

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
