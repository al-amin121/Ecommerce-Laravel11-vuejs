import { ref } from 'vue';
import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_API_URL,
  withCredentials: true,
  xsrfHeaderName: "X-XSRF-TOKEN", 
});

export default function useAxios() {
  const loading = ref(false);
  const error = ref(null);

  const sendRequest = async (config) => {
    loading.value = true;

    try {
      const response = await axiosInstance(config);
      return response;
    } catch (err) {
      error.value = err;
     
    } finally {
      loading.value = false;
    }
  };
  return {
    loading,
    error,
    sendRequest,
  };
}