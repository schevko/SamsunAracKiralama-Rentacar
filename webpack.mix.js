const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [
          tailwindcss('./tailwind.config.js'),
          require('autoprefixer')
      ]
   })
   .version();

// Üretim modunda minify işlemi
if (mix.inProduction()) {
    mix.options({
        terser: {
            extractComments: false,
            terserOptions: {
                compress: {
                    drop_console: true
                }
            }
        },
        cssNano: {
            discardComments: {
                removeAll: true
            }
        }
    });
}
