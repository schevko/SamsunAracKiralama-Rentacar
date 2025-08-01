// ES6 import ifadesi yerine CommonJS require kullanın
const axios = require('axios');
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
