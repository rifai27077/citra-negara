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
        "primary": {
          DEFAULT: "#699D15",
          50: '#f1f8e6',
          100: '#e0efc8',
          200: '#c5e297',
          300: '#a3cf60',
          400: '#84bc34',
          500: '#699d15',
          600: '#527e0f',
          700: '#406111',
          800: '#354d13',
          900: '#2d4114',
          950: '#172406',
        },
        "secondary": {
          DEFAULT: "#E9DC00",
          50: '#fefce7',
          100: '#fdf8c3',
          200: '#fcf18d',
          300: '#fae64e',
          400: '#f9d81d',
          500: '#e9dc00', // Adjusted to match brand
          600: '#cbb300',
          700: '#a28303',
          800: '#86680a',
          900: '#72550f',
          950: '#422e04',
        },
        "accent": {
          DEFAULT: "#C3E956",
          50: '#f7fceb',
          100: '#ebf9ce',
          200: '#d8f1a0',
          300: '#c3e956', // Brand accent
          400: '#a9db2b',
          500: '#89bf15',
          600: '#69980d',
          700: '#50750e',
          800: '#415d12',
          900: '#384f15',
          950: '#1c2b05',
        }
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
        display: ['Outfit', 'ui-sans-serif', 'system-ui'],
      },
      boxShadow: {
        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
        'glow': '0 0 15px rgba(105, 157, 21, 0.3)',
      }
    },
  },
  plugins: [],
}

