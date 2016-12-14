var gulp  = require('gulp');
var chmod = require('gulp-chmod');
var rename = require('gulp-rename');
var del = require('del');
var concat = require('gulp-concat');
var gutil = require('gulp-util');
var exec = require('child_process').exec;


var includedFiles = ['../**/*'];
// var includedInstallationReadme = ['../install-instructions/installation-steps.md'];
var includedInstallationReadmeTXT = ['../install-instructions/installation-steps.txt'];

var excludedFiles = ['!../gulp{,/**}', '!../node_modules{,/**}','!../install-instructions{,/**}',
    '!../dist', '!../dist/**/*', '!../todo.md', '!../readme.md', '!../.gitignore'];

gulp.task('default', function() {
    return gutil.log('Gulp is running!');
});

gulp.task('WordPress 4.5.2 - Deploy Local', function () {
    var wpPluginsFolder = '/Users/mfromin/Sites/wordpress452/wp-content/plugins/powerpaste-wordpress';
    moveFiles(wpPluginsFolder);
});

gulp.task('WordPress 4.6.1 - Deploy Local', function () {
    var wpPluginsFolder = '/Users/mfromin/Sites/wordpress461/wp-content/plugins/powerpaste-wordpress';
    moveFiles(wpPluginsFolder);
});

function moveFiles(wpPluginsFolder) {
    gulp.src(includedFiles.concat(excludedFiles))
        .pipe(gulp.dest(wpPluginsFolder));
}

gulp.task('Create ZIP for Distribution', ['Move Files for Zip', 'Create Install Readme', 'Zip Files']);

gulp.task('Move Files for Zip', ['Clean dist-code-files'] ,function () {
    var distributionCodeFilesFolder = '../dist/powerpaste-wordpress-cloud';
    return gulp.src(includedFiles.concat(excludedFiles))
        .pipe(chmod(755))
        .pipe(gulp.dest(distributionCodeFilesFolder));
});

gulp.task('Create Install Readme', function () {
    // We are only shipping a TXT file per Blake M.
    console.log('Create Install Readme');
    var distributionCodeFilesFolder = '../dist/powerpaste-wordpress-cloud';

    //Move the original TXT file
    gulp.src(includedInstallationReadmeTXT)
        .pipe(rename("install-instructions.txt"))
        .pipe(gulp.dest(distributionCodeFilesFolder));
});

gulp.task('Zip Files', ['Move Files for Zip', 'Create Install Readme'],  function () {
    return exec('cd ../dist && zip -r ./zip/powerpaste4wordpresscloud_latest.zip ./powerpaste-wordpress-cloud/*');
});

gulp.task('Clean dist-code-files', function () {
    // Delete Temp Files & Folders needed to make the distribution ZIP
    return del(['../dist/powerpaste-wordpress-cloud/**', '../dist/zip/**', '!../dist/powerpaste-wordpress-cloud', '!../dist/zip'], {force: true});
});