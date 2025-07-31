/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.vue',
    './resources/**/*.js',
    // Eğer React kullanıyorsan:
    // './resources/**/*.jsx',
  ],
  theme: {
    extend: {
      // Özel renk, font vs. ekleyeceksen buraya göm.
    },
  },
  plugins: [
    // Örneğin form, typography eklentisi istersen:
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
  ],
};
