// const dotenvExpand = require('dotenv-expand');
// dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();


mix.js(__dirname + '/Resources/js/app.js', 'js/admin/app.js').vue({version :3 })
    .sass(__dirname + '/Resources/sass/app.scss', 'css/admin/app.css');
// .css(__dirname + '/Resources/assets/css/bootstrap.min.css', 'css/admin/app.css')
// .css(__dirname + '/Resources/assets/css/main.css', 'css/admin/app.css');


mix.webpackConfig({
    output: {
        chunkFilename: "js/admin/[name].js" + (mix.inProduction() ? "?id=[chunkhash]" : "")
    },
});
if (mix.inProduction()) {
    mix.version();
}
