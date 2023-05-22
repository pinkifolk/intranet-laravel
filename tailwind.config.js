/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        back: '#F5F5F5',
        aside: '#283739',
        action: '#228896',
        secondary: '#A9C52F',
      },
      spacing: {
        '200': '200px'
      },
    },

  },
  plugins: [],
}

