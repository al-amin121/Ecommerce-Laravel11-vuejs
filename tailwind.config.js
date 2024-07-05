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
    container: {
      center: true,
    },
    extend: {
      colors: {
        'primary':'#00FF66',
        'Secondary':'#F5F5F5',

        
      },
      fontFamily: {
        pop: 'Poppins',
        Inter: 'Inter',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

