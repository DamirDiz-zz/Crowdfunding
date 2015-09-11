module.exports = function (grunt) {

    grunt.initConfig({
        sass: {
            dist: {
                files: {
                    'styles/css/projectbox.css': 'styles/scss/projectbox.scss',
                    'styles/css/styles.css': 'styles/scss/styles.scss'
                }
            }
        },
        autoprefixer: {
            compile: {
                files: {
                    'styles/css/projectbox.css': 'styles/css/projectbox.css',
                    'styles/css/styles.css': 'styles/css/styles.css'

                }
            }
        },
        cssmin: {
            target: {
                files: {
                    'build/main.min.css': ['styles/css/site.css',  'styles/css/styles.css', 'styles/css/projectbox.css']
                }
            }
        },
        watch: {
            stylus: {
                files: ['styles/scss/*.scss', 'styles/scss/partials/*.scss'],
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