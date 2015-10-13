/*jshint strict:false */
module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        typescript: {
            base: {
                src    : ['src/js/*.ts'],
                dest   : '../src/skin/frontend/base/default/js/mothership/template/compiled.js',
                options: {
                    module     : 'amd',  //or commonjs
                    target     : 'es5',  //or es3s
                    sourceMap  : true,
                    declaration: true
                }
            }
        },

        sass: {
            options: {
                sourcemap: 'none', // this requires SASS version >= 3.4
                trace: true,
                style: 'expanded',
                compass: true // this requires COMPASS version >= 1.0 and a contrib.rb file
            },

            // task for the specific single files
            basic: {
                files: {
                    '../../www/skin/frontend/base/default/js/mothership/template/css/basic.css': '../../www/skin/frontend/base/default/js/mothership/template/sass/basic.scss'
                }
            },

            // task for all files in the modules directory
            modules: {
                options: {
                    update: true
                },
                files: [{
                    expand: true,
                    cwd: '../../www/skin/frontend/base/default/js/mothership/template/sass/modules',
                    src: ['*.scss'],
                    dest: '../../www/skin/frontend/base/default/js/mothership/template/css/modules',
                    ext: '.css'
                }]
            }

        },

        // setup jshint tasks
        jshint    : {
            options: {
                globalstrict: true,
                curly    : true,
                eqeqeq   : true,
                immed    : true,
                latedef  : true,
                newcap   : true,
                noarg    : true,
                sub      : true,
                undef    : true,
                boss     : true,
                eqnull   : true,
                unused   : true,
                browser  : true,
                strict   : true,
                jquery   : true,
                "globals": {
                    "angular": true,
                    "console": true,
                    "google" : true,
                    "module" : true,
                    "_"      : true,
                    "FB"     : true,
                    "$$"     : true,
                    "Class"  : true
                }
            },
            all    : [
                'Gruntfile.js',
                '../../www/skin/frontend/mothership/craft/js/**/*.js',
                // exclude some vendor files
                '!../../www/skin/frontend/mothership/craft/js/jquery*.js',
                '!../../www/skin/frontend/mothership/craft/js/magento/*.js'
            ]
        },

        // setup watch tasks
        watch     : {
            // files/directory to watch
            files: [
                'Gruntfile.js',
                'src/sass/**/*.scss',
                'src/js/**/*.ts'
            ],
            // task to run with this task
            tasks: [
                'sass',
                'typescript',
                'jshint'
            ]
        },

        // minimize css files
        cssmin: {
            basic: {
                files: {
                    '../../www/skin/frontend/base/default/js/mothership/template/css/basic.css': '../../www/skin/frontend/base/default/js/mothership/template/css/basic.css'
                }
            },
            modules: {
                files: [{
                    expand: true,
                    cwd: '../../www/skin/frontend/base/default/js/mothership/template/css/modules',
                    src: ['*.css'],
                    dest: '../../www/skin/frontend/base/default/js/mothership/template/css/modules',
                    ext: '.css'
                }]
            }
        },

        // uglify js files
        uglify: {
            options: {
                mangleProperties: true,
                reserveDOMCache: true
            },
            jquery: {
                files: {
                    '../../www/skin/frontend/base/default/js/mothership/template/js/jquery-1.11.1.js': '../../www/skin/frontend/base/default/js/mothership/template/js/jquery-1.11.1.js'
                }
            },
            modules: {
                files: [{
                    expand: true,
                    cwd: '../../www/skin/frontend/base/default/js/mothership/template/js',
                    src: '**/*.js',
                    dest: '../../www/skin/frontend/base/default/js/mothership/template/js'
                }]
            }
        }

    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-typescript');
    grunt.loadNpmTasks('grunt-remove-logging');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // task that's going to be executed with 'grunt'
    grunt.registerTask('default', ['watch']);

    /**
     * Build task
     *  sass - preprocesses SASS to CSS
     *  cssmin - minifies CSS file
     *  uglify - minifies JS file
     *  jshint - checks js files
     */
    grunt.registerTask('build', [
        'sass',
        'cssmin',
        'uglify'
    ]);
};