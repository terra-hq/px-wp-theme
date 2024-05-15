const colors = require("colors");
var gulp = require("gulp");
var sftp = require("gulp-sftp-up4");

const currentTask = process.env.npm_lifecycle_event;
console.log(colors.bgBlack.white(`Executing Task:  ${currentTask}`));
var serverCredentials;

var devSFTP = sftp({
    host: "XXXXXXX",
    user: "XXXXXXX",
    port: "2222",
    pass: "XXXXX",
    remotePath: "/wp-content/themes/XXXXXXX-wp-theme",
});

if (
    currentTask == "dev-php" ||
    currentTask == "dev-static-assets" ||
    currentTask == "dev-img" ||
    currentTask == "dev-hash" ||
    currentTask == "dev-full" ||
    currentTask == "deploy_file" ||
    currentTask == "dev-file"
) {
    serverCredentials = devSFTP;
}

var stageSFTP = sftp({
    host: "XXXXXXX",
    user: "XXXXXXX",
    port: "2222",
    pass: "XXXXX",
    remotePath: "/wp-content/themes/XXXXXXX-wp-theme",
});

if (
    currentTask == "stg-php" ||
    currentTask == "stg-static-assets" ||
    currentTask == "stg-img" ||
    currentTask == "stg-hash" ||
    currentTask == "stg-full" ||
    currentTask == "deploy_file" ||
    currentTask == "stg-file"
) {
    serverCredentials = stageSFTP;
}


var prodSFTP = sftp({
    host: "XXXXXXX",
    user: "XXXXXXX",
    port: "2222",
    pass: "XXXXX",
    remotePath: "/wp-content/themes/XXXXXXX-wp-theme",
});

if (
    currentTask == "prd-php" ||
    currentTask == "prd-static-assets" ||
    currentTask == "prd-img" ||
    currentTask == "prd-hash" ||
    currentTask == "prd-full" ||
    currentTask == "deploy_file" ||
    currentTask == "prd-file"
) {
    serverCredentials = prodSFTP;
}

/**
 * Upload all PHP
 * uploads everything except local variable, used for virtual not virtual env.
 * @author: Andres
 */
function deploy_php() {
    return gulp
        .src(
            [
                "components/**/*.php",
                "flexible-modules/**/*.php",
                "functions/default/**/*.php",
                "functions/project/**/*.php",
                "*.php",
                "!functions/reference/**/*.php",
                "!functions/project/local/local-variable.php",
                "!functions/project/enqueues/define-hash.php",
            ],
            { base: "./" }
        )
        .pipe(serverCredentials);
}
exports.deploy_php = deploy_php;

/**
 * Upload all JS & CSS
 * Inside / dist
 * @author: Andres
 */

function deploy_static_assets() {
    return gulp.src(["dist/**/*.*"], { base: "./" }).pipe(serverCredentials);
    cb();
}

exports.deploy_static_assets = deploy_static_assets;

/**
 * Upload all Static Assets
 * inside /assets
 * @author: Andres
 */

function deploy_img() {
    return gulp.src(["assets/**/*.*"], { base: "./" }).pipe(serverCredentials);
}
exports.deploy_img = deploy_img;

/**
 *  Deploy Fonts and images inside css.
 */
function deploy_fonts() {
    return gulp
        .src(
            [
                // JS & CSS
                "dist/css/fonts/*",
                "dist/css/img/*",
            ],
            { base: "./" }
        )
        .pipe(serverCredentials);
}
exports.deploy_fonts = deploy_fonts;

/**
 *  Deploy Assets and hash.
 */
function deploy_hash() {
    return gulp
        .src(
            [
                // JS & CSS
                "dist/**/*.*",
                "functions/project/enqueues/define-hash.php",
                "!dist/css/fonts/*",
                "!dist/css/img/*",
            ],
            { base: "./" }
        )
        .pipe(serverCredentials);
}
exports.deploy_hash = deploy_hash;

/**
 *  Deploy all
 */
function deploy_full() {
    return gulp
        .src(
            [
                // JS & CSS
                "dist/**/*.*",

                // Static img
                "assets/**/*.*",

                // PHP
                "flexible-modules/**/*.php",
                "components/**/*.php",
                "flexible-modules/**/*.php",
                "functions/default/**/*.php",
                "functions/project/**/*.php",
                "*.php",
                "!functions/reference/**/*.php",
                "!functions/project/local/local-variable.php",
            ],
            { base: "./" }
        )
        .pipe(serverCredentials);
}
exports.deploy_full = deploy_full;

function deploy_file() {
    var argv = require("yargs").argv;
    return gulp.src([argv.file], { base: "./" }).pipe(serverCredentials);
}
exports.deploy_file = deploy_file;
