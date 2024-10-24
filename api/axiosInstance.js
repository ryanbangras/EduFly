import axios from "axios";

let baseURL = `http://localhost:3000`; // Towards API-hosted IP address

export default axios.create({
  baseURL: baseURL,
});