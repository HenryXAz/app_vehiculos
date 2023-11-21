/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.vue',
    './resources/**/*.js'
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        dark: {
          'color-1': '#212529',
          'color-2': '#2B3035',
        },
        light: {
          'color-1': '#F8F9FA',
          'color-2': '#E9ECEF',
        }
      }
    },
  },
  plugins: [],
}

