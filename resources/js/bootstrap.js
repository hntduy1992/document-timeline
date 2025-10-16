import axios from 'axios';
import {router} from "@inertiajs/vue3";

axios.defaults.withCredentials = true
axios.defaults.withXSRFToken = true
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['Accept'] = 'application/json'
/**
 * Track CSRF initialization để tránh gọi nhiều lần
 */
let csrfPromise = null

/**
 * Khởi tạo CSRF token
 */
const initCsrf = () => {
    if (!csrfPromise) {
        csrfPromise = axios.get('/sanctum/csrf-cookie')
            .then(() => {
                console.log('CSRF token initialized')
            })
            .catch(error => {
                console.error('Failed to initialize CSRF token:', error)
                csrfPromise = null
                throw error
            })
    }
    return csrfPromise
}

/**
 * Request Interceptor
 * Tự động khởi tạo CSRF token trước các request mutation
 */
axios.interceptors.request.use(async (config) => {
    const mutationMethods = ['post', 'put', 'patch', 'delete']

    if (mutationMethods.includes(config.method?.toLowerCase())) {
        await initCsrf()
    }

    return config
}, error => {
    return Promise.reject(error)
})

/**
 * Response Interceptor
 * Xử lý CSRF token expired (419) và retry request
 */
axios.interceptors.response.use(
    response => response,
    async error => {
        // CSRF token mismatch/expired
        if (error.response?.status === 419 && !error.config._retry) {
            console.log('CSRF token expired, refreshing...')

            error.config._retry = true
            csrfPromise = null

            try {
                await initCsrf()
                return axios.request(error.config)
            } catch (retryError) {
                return Promise.reject(retryError)
            }
        }

        // Unauthenticated
        if (error.response?.status === 401) {
            console.log('Unauthenticated, redirecting to login...')

            // Redirect về login với Inertia
            router.visit('/login', {
                method: 'get',
                preserveState: false,
                preserveScroll: false,
                replace: true, // Thay thế history để không back lại được
            })
        }

        return Promise.reject(error)
    }
)

window.axios = axios;

