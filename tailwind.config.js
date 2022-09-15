/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {    
    screens: {
      'sm': {'max': '639px'},

      'md': {'max': '767px'},

      'lg': {'max': '1023px'},

      'xl': {'max': '1279px'},
    },
    fontFamily: {
      'sans': ['Ubuntu', 'Sans-serif']
    },
    extend: {
      spacing: {
        '72': '18rem',
        '84': '21rem',
        '96': '30rem',
      },
    },
  },
  variants: {},
  plugins: [require("daisyui")],
  // plugins: [
  //   require('tailwindcss-animatecss')({
  //     settings: {
  //       animatedSpeed: 1000,
  //       heartBeatSpeed: 1000,
  //       hingeSpeed: 2000,
  //       bounceInSpeed: 750,
  //       bounceOutSpeed: 750,
  //       animationDelaySpeed: 1000
  //     },
  //     variants: ['responsive'],
  //   }),
  // ],
}
