/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {
      screens:{
        'mobile': '360px',
        'tablet':'640px',
        'laptop': '1024px',
        'desktop': '1280px',
      },
      colors:{
        'bilal': '#cdcdcd'
      },
    },
  },
  plugins: [],
}
