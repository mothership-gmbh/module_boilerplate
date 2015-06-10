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

        // setup sass task
        sass      : {

            // task for the specific single files
            basic  : {
                files: {
                    '../src/skin/frontend/base/default/css/mothership/template/style.css': 'src/sass/styles.scss'
                }
            },

            // task for all files in the component directory
            modules: {
                options: {
                    update: true
                },
                files  : [{
                    expand: true,
                    cwd   : 'src/sass/component',
                    src   : ['*.scss'],
                    dest  : 'src/css/component',
                    ext   : '.css'
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
            all    : ['Gruntfile.js', '../src/skin/frontend/base/default/js/mothership/template/**/*.js']
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
        }

    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-typescript');

    // task that's going to be executed with 'grunt'
    grunt.registerTask('default', ['watch']);

};