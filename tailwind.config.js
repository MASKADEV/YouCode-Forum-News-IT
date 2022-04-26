module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.tsx",
      "./resources/**/*.ts",
      "./resources/**/*.vue",
  ],
  theme: {
      extend: {
        animation: {
          fade: 'fadeOut 1s ease-in-out',
        },
        keyframes: theme => ({
          fadeOut: {
            '0%': { backgroundColor: theme('colors.white') },
            '100%': { backgroundColor: theme('colors.transparent') },
          },
        }),
      },
  },
  plugins: [],
}