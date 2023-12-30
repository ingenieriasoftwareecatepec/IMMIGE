/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#A21CAF',
        secondary: {
          100: '#FBBDDF',
          200: '#F240A2'
        }
      },
      fontFamily: {
        custom: ['Lobster'],
        custom2: ['Russo'],
      }
    },
  },
  plugins: [],
}

