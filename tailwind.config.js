/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        "primary": "#699D15",
        "secondary": "#E9DC00",
        "accent": "#C3E956",
      }
    },
  },
  plugins: [],
}

