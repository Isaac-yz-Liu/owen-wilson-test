import axios from "axios";
import { BACKEND_HOST } from "../Constants";

class API {
  constructor() {
    axios.interceptors.response.use(
      function (response) {
        return response;
      },
      function (error) {
        return Promise.reject(error);
      }
    );
  }

  getExternalData = async () => {
    let headers = { Accept: "application/json" };

    try {
      const response = await axios({
        baseURL: BACKEND_HOST,
        url: `/api/wows-in-movie/external`,
        headers: headers,
        method: "GET",
      });

      return response;
    } catch (error) {
      throw error;
    }
  };

  getInternalData = async () => {
    let headers = { Accept: "application/json" };
    try {
      const response = await axios({
        baseURL: BACKEND_HOST,
        url: `/api/wows-in-movie`,
        headers: headers,
        method: "GET",
      });

      return response;
    } catch (error) {
      throw error;
    }
  };
}

const api = new API();
export default api;
