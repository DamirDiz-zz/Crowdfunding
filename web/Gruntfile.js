module.exports = function (grunt) {

    grunt.initConfig({
        sass: {
            dist: {
                files: [{
                        expand: true,
                        cwd: 'styles/scss',
                        src: ['*.scss'],
                        dest: 'styles/css',
                        ext: '.css'
                    }]
            }
        },
        autoprefixer: {
            options: {
                browsers:  ['last 1 version']
            },
            build: {
                expand: true,
                cwd: "styles/css",
                src: ['*.css'],
                dest: "styles/css"
            }
        },
        cssmin: {
            target: {
                files: {
                    'build/main.min.css': ['styles/css/*.css']
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