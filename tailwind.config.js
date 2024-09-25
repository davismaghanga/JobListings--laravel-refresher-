/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        colors:{
            "laracasts": "rgb(50,138,241)"
        }
    },
  },
  plugins: [],
}

