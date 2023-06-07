/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'base': ['Poppins,sans-serif'],
      'title': ['Poppins,sans-serif']
    },
    extend: {
      colors: {
        back: '#F5F5F5',
        aside: '#283739',
        action: '#228896',
        hover: 'rgb(34 136 150 / 85%)',
        secondary: '#A9C52F',
      },
      spacing: {
        '200': '200px',
        '150': '150px',
      },
    },

  },
  plugins: [],
}

