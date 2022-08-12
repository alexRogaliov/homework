const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const gulpif = require('gulp-if');
const uglifyCss = require('gulp-uglifycss');
const imageMin = require('gulp-imagemin');
const sprite = require('gulp.spritesmith');
const twig2html = require('gulp-twig2html');
const rename = require("gulp-rename");
const beautify = require('gulp-beautify');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const fs = require('fs');
const browserSync = require('browser-sync').create();
const reload      = browserSync.reload;
const cowSay = require('cowsay');

const sourcesObject = {
    style: './assets/src/styles/main.scss',
    allStyles: './assets/src/styles/**/*',
    images: './assets/src/images/img/**/*',
    sprites: {
        all: './assets/src/images/sprites/*',
        sprites: './assets/src/images/sprites/*.png',
        spritesRestina: './assets/src/images/sprites/*@2x.png',
    },
    twig: './twig/pages/*.twig',
    allTwig: './twig/**/*.twig',
    scripts: () => JSON.parse(fs.readFileSync('./assets/src/scripts/init.json')).map((path) => `./src/scripts/${path}`),
    allScripts: './assets/src/scripts/**/*'
};
const buildObject = {
    style: './assets/build/css',
    images: './assets/build/img',
    sprites: {
        spritesStyle: './assets/src/styles/common',
        spritesImages: './assets/build/img',
    },
    script: './assets/build/js',
    html: './assets/build',
};

let devMode = true;
let watchMode = false;

gulp.task('style', () => {
    return gulp.src(sourcesObject.style)
        .pipe(gulpif(devMode, sourcemaps.init()))
        .pipe(sass({
            sourceMap: { inline: true },
            'include css': true
        }).on('error', sass.logError))
        .pipe(gulpif(!devMode, uglifyCss()))
        .pipe(gulpif(devMode, sourcemaps.write('.')))
        .pipe(gulp.dest(buildObject.style))
        .pipe(gulpif(watchMode, browserSync.stream()));
});


gulp.task('twig2html', () => {
    return gulp.src(sourcesObject.twig)
        .pipe(twig2html())
        .pipe(rename({ extname: '.html' }))
        .pipe(beautify.html({
            indent_size: 2,
            inline: []
        }))
        .pipe(gulp.dest(buildObject.html))
        .pipe(gulpif(watchMode, browserSync.stream()));
});

gulp.task('images', () => {
    return gulp.src(sourcesObject.images)
        .pipe(gulpif(!devMode, imageMin()))
        .pipe(gulp.dest(buildObject.images))
        .pipe(gulpif(watchMode, browserSync.stream()));
});

gulp.task('sprites', (done) => {
    const spriteOutput = gulp.src(sourcesObject.sprites.sprites)
        .pipe(sprite({
            imgName: 'sprites.png',
            imgPath: '../img/sprites.png',
            cssName: 'sprites.scss',
            algorithm: 'binary-tree',
            retinaImgName: 'sprites-retina.png',
            retinaImgPath: '../img/sprites-retina.png',
            retinaSrcFilter: sourcesObject.sprites.spritesRestina,
        }));
    spriteOutput.css
        .pipe(gulp.dest(buildObject.sprites.spritesStyle));
    spriteOutput.img
        .pipe(gulpif(!devMode, imageMin()))
        .pipe(gulp.dest(buildObject.sprites.spritesImages))
        .pipe(gulpif(watchMode, browserSync.stream()));

    done();
});

gulp.task('script', () => {
    return gulp.src(sourcesObject.scripts())
        .pipe(gulpif(devMode, sourcemaps.init()))
        .pipe(concat('app.js'))
        .pipe(gulpif(!devMode, uglify()))
        .pipe(gulpif(devMode, sourcemaps.write('./')))
        .pipe(gulp.dest(buildObject.script))
        .pipe(gulpif(watchMode, browserSync.stream()));
});

gulp.task('browserSync', () => {
    browserSync.init({
        proxy: "homework.loc"
    });

    gulp.watch(sourcesObject.allStyles, gulp.series('style'));
    gulp.watch(sourcesObject.images, gulp.series('images'));
    gulp.watch(sourcesObject.sprites.all, gulp.series('sprites'));
    gulp.watch(sourcesObject.allScripts, gulp.series('script'));
    gulp.watch(sourcesObject.allTwig, gulp.series('twig2html'));
});

gulp.task('build', gulp.series('sprites', 'images', 'style', 'script', 'twig2html', (done) => {
    console.log(cowSay.say({
        text : "I'm build your project as developer mode!",
        e : "oO",
        T : "U "
    }));
    done();
}));

gulp.task('prod', gulp.series((done) => {
    devMode = false;
    done();
}, 'build', (done) => {
    console.log(cowSay.say({
        text : "I'm build your project as product mode!",
        e : "oO",
        T : "U "
    }));
    done();
}));

gulp.task('watch', gulp.series((done) => {
    watchMode = true;
    done();
}, 'build', (done) => {
    console.log(cowSay.say({
        text : "Lets start developing!",
        e : "oO",
        T : "U "
    }));
    done();
}, 'browserSync'));
