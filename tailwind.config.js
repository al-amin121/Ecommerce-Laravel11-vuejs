/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
    'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'  
  ],
  theme: {
    extend: {
      colors: {
        'primary':'#00FF66',
        'Secondary':'#F5F5F5',

        
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

