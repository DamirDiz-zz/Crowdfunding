module.exports = function (grunt) {

    grunt.initConfig({
        sass: {
            dist: {
                files: {
                    'styles/css/projectbox.css': 'styles/scss/projectbox.scss',
                    'styles/css/customize.css': 'styles/scss/customize.scss'
                }
            }
        },
        autoprefixer: {
            compile: {
                files: {
                    'styles/css/projectbox.css': 'styles/css/projectbox.css',
                    'styles/css/customize.css': 'styles/css/customize.css'

                }
            }
        },
        cssmin: {
            target: {
                files: {
                    'build/main.min.css': ['styles/css/site.css', 'styles/css/projectbox.css',  'styles/css/customize.css']
                }
            }
        },
        watch: {
            stylus: {
                files: ['styles/scss/*.scss'],
                tasks: ['sass', 'autoprefixer', 'cssmin']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin']);
};