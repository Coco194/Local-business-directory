import axios from "axios";
// Function to store the authentication token in localStorage
export function storeToken(token) {
  localStorage.setItem('token', token);
}

// Function to retrieve the authentication token from localStorage
export function getToken() {
  return localStorage.getItem('token');
}

// Function to remove the authentication token from localStorage (logout)
export function removeToken() {
  localStorage.removeItem('token');
}

// Function to check if the user is authenticated based on the presence of the token
export async function isAuthenticated() {
  let token = localStorage.getItem("token");
  let user = localStorage.getItem("user");

  // Check if the token exists in localStorage
  if (!token) {
    return { authenticated: false, user: {} };
  }

  // If there's a token, we can consider the user authenticated.
  // You can add more validation here if needed (e.g., check token expiry, call an API).
  return { authenticated: true, user: JSON.parse(user) };  // Assuming `user` is stored as a stringified JSON object
}
