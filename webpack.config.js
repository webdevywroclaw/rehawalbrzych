var Encore = require('@symfony/webpack-encore');
const path = require('path')
const PrerenderSPAPlugin = require('prerender-spa-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const PuppeteerRenderer = PrerenderSPAPlugin.PuppeteerRenderer


Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .addEntry('app', './assets/js/app.js')
    .addEntry('appcss', './assets/css/app.css')
    // .createSharedEntry('vendor', ['babel-polyfill'])
    .enableVueLoader()
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()


    // first, install any presets you want to use (e.g. yarn add babel-preset-es2017)
    // then, modify the default Babel configuration
    .configureBabel(function(babelConfig) {
        // add additional presets
        // babelConfig.presets = ['es2015','es2017']
        babelConfig.presets.push('es2015');
        babelConfig.presets.push('es2017');
        // // no plugins are added by default, but you can add some
        babelConfig.plugins.push('transform-runtime');
    })

    // .addPlugin(new PrerenderSPAPlugin({
    //     // Required - The path to the webpack-outputted app to prerender.
    //     staticDir: '/public/build',
    //     // Required - Routes to render.
    //     routes: [ '/', '/kontakt', '/oferta' ],
    //     renderer: new PuppeteerRenderer()
    // }))

;

module.exports = {
    entry: ["@babel/polyfill", "./assets/js/app.js"],
    plugins: [
        new CopyWebpackPlugin([{
            from: 'public/build'
        }]),
        new PrerenderSPAPlugin({
            staticDir: 'dist', // The path to the folder where index.html is.
            routes: ['/'], // List of routes to prerender.
            renderer: new PuppeteerRenderer()
        })
    ]
};

// module.exports = {
//     entry: ["@babel/polyfill", "./assets/js/app.js"]
// };
module.exports = Encore.getWebpackConfig();
