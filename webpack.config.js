const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured by the "encore" command
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')

    // public path used by the web server to access the output path
    .setPublicPath('/build')

    // uncomment if deploying under a subdirectory or CDN
    // .setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     */
    .addEntry('app', './assets/app.ts')
    .addEntry('method2', './assets/javascript/method2.ts')

    /*
     * FEATURE CONFIG
     */
    .splitEntryChunks()
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    /*
     * Loaders
     */
    .enableTypeScriptLoader((tsConfig) => {
        // Example customization:
        // tsConfig.transpileOnly = true;
    })

    // If you use Babel with TypeScript, keep this for modern JS support
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.38';
    })

/*
 * Optional Enhancements
 */
// .enableReactPreset()
// .enableSassLoader()
.enablePostCssLoader()
// .enableIntegrityHashes(Encore.isProduction())
// .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
