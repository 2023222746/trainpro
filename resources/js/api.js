import axios from 'axios';

const api = {
    /**
     * GET request
     */
    get(url, params = {}) {
        return axios.get(url, { params })
            .then(response => response.data)
            .catch(error => {
                console.error('API GET error:', error);
                throw error;
            });
    },

    /**
     * POST request
     */
    post(url, data = {}) {
        return axios.post(url, data)
            .then(response => response.data)
            .catch(error => {
                console.error('API POST error:', error);
                throw error;
            });
    },

    /**
     * PUT request
     */
    put(url, data = {}) {
        return axios.put(url, data)
            .then(response => response.data)
            .catch(error => {
                console.error('API PUT error:', error);
                throw error;
            });
    },

    /**
     * DELETE request
     */
    delete(url) {
        return axios.delete(url)
            .then(response => response.data)
            .catch(error => {
                console.error('API DELETE error:', error);
                throw error;
            });
    }
};

export default api;
