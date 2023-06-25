const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('assets/resources/js/service/create-service.js', 'public/js')
   .js('assets/resources/software/software.js', 'public/js/create-software.js')
   .js('assets/resources/templates/basic/frontend/js/job-proposal.js', 'public/js')
   .js('assets/resources/templates/basic/frontend/js/job.view.js', 'public/js')
   .js('assets/resources/templates/basic/frontend/js/create_job.js', 'public/js')
   .js('assets/resources/templates/basic/frontend/js/proposal-step.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/create_job.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/breadcrum.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/all-proposal.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/job_proposal.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/job_view.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/send-offer.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/testimonial_response.css','public/css')
   .css('assets/resources/templates/basic/frontend/css/custom/view-propsal.css','public/css')
    ;

    