let mix = require('laravel-mix');

mix.setPublicPath('src/Assets/build')

mix.js('src/Assets/js/app.js', 'src/Assets/build/js').vue();
mix.sass('src/Assets/scss/app.scss', 'src/Assets/build/css');
