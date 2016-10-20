var gulp  = require('gulp');
var chmod = require('gulp-chmod');
var rename = require('gulp-rename');
var del = require('del');
// var marked = require('gulp-marked');
// var order = require('gulp-order');
var concat = require('gulp-concat');
var gutil = require('gulp-util');
var exec = require('child_process').exec;


var includedFiles = ['../**/*'];
var includedPluginFolderReadme = ['../plugins/readme.md'];
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

gulp.task('Create ZIP for Distribution', ['Move Files for Zip', 'Move Plugin Folder Readme', 'Create Install Readme', 'Zip Files']);

gulp.task('Move Files for Zip', ['Clean dist-code-files'] ,function () {
    var distributionCodeFilesFolder = '../dist/powerpaste-wordpress';
    return gulp.src(includedFiles.concat(excludedFiles))
        .pipe(chmod(755))
        .pipe(gulp.dest(distributionCodeFilesFolder));
});

gulp.task('Move Plugin Folder Readme', function () {
    var distributionCodeFilesFolder = '../dist/powerpaste-wordpress';
    return gulp.src(includedPluginFolderReadme)
        .pipe(chmod(755))
        .pipe(gulp.dest(distributionCodeFilesFolder + '/plugins'));
});

// gulp.task('Generate HTML Body', function () {
//     return gulp.src(includedInstallationReadme)
//         .pipe(marked({}))
//         .pipe(rename("body.html"))
//         .pipe(gulp.dest('../install-instructions/components'));
// });

// gulp.task('Create Install Readme', ['Generate HTML Body'], function () {
gulp.task('Create Install Readme', function () {
    // We are only shipping a TXT file per Blake M.
    console.log('Create Install Readme');
    var distributionCodeFilesFolder = '../dist/powerpaste-wordpress';
    // gulp.src('../install-instructions/components/**/*.html')
    //     .pipe(order([
    //         "header.html",
    //         "body.html",
    //         "footer.html"
    //     ]))
    //     .pipe(concat("install-instructions.html"))
    //     // .pipe(rename("install-instructions.html"))
    //     .pipe(gulp.dest(distributionCodeFilesFolder));

    //Move the original MD file in case anyone prefers that format
    // gulp.src(includedInstallationReadme)
    //     .pipe(rename("install-instructions.md"))
    //     .pipe(gulp.dest(distributionCodeFilesFolder));

    //Move the original TXT file
    gulp.src(includedInstallationReadmeTXT)
        .pipe(rename("install-instructions.txt"))
        .pipe(gulp.dest(distributionCodeFilesFolder));
});

gulp.task('Zip Files', ['Move Files for Zip', 'Move Plugin Folder Readme', 'Create Install Readme'],  function () {
    return exec('cd ../dist && zip -r ./zip/powerpaste4wordpress_latest.zip ./powerpaste-wordpress/*');
});

gulp.task('Clean dist-code-files', function () {
    // Delete Temp Files & Folders needed to make the distribution ZIP
    return del(['../dist/powerpaste-wordpress/**', '../dist/zip/**', '!../dist/powerpaste-wordpress', '!../dist/zip'], {force: true});
});