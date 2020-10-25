// Defining requirements
const gulp        = require('gulp');
const ulpIgnore   = require('gulp-ignore');
const del         = require('del');
const sourcemap   = require('gulp-sourcemaps');
const sass        = require('gulp-sass');
const compass     = require('compass-importer');
const prefixer    = require('gulp-autoprefixer');
const imagemin    = require('gulp-imagemin');
const changed     = require('gulp-changed');
const svgmin      = require('gulp-svgmin');
const uglify      = require('gulp-uglify');
const concat      = require('gulp-concat');
const rename      = require('gulp-rename');
const wpPot       = require('gulp-wp-pot');
const sort        = require('gulp-sort');
const header      = require('gulp-header');
const gutil       = require('gulp-util');


// Base config
const project = 'powiat-bartoszycki'; // The directory name for your theme
const node = 'node_modules/';
const src = './src/';
const dist = './dist/';
const project_dir = dist + project + '/';

// Config assets_js
const jquery         = node + 'jquery/dist/jquery.min.js';
const cookies        = node + 'jquery.cookie/jquery.cookie.js';
const html5shiv      = node + 'html5shiv/dist/*.min.js';
const slider         = node + 'slick-carousel/slick/slick.min.js';
const carousel       = node + 'owl.carousel/dist/owl.carousel.min.js';
const imgPopup       = node + 'magnific-popup/dist/jquery.magnific-popup.min.js';
const imgload        = node + 'imagesloaded/imagesloaded.pkgd.min.js';
const masonry        = node + 'masonry-layout/dist/masonry.pkgd.min.js';
const jgallery       = node + 'justifiedGallery/dist/js/jquery.justifiedGallery.min.js';
const dist_assets_js = 'js/assets/';


//Config theme
const theme = {
  css: {
    src:      src + 'assets/sass/', //sass
    src_css:  src + '/css/', //css
    dist:     project_dir, //baseCss
    dist_css: project_dir + 'css/' //extraCss
  },
  image: {
    img_screen: src + '/*.{jpg,jpeg,png,gif}',
    dis_screen: project_dir,
    src:        src + 'assets/img/',
    dist:       project_dir + '/img/',
    svg_src:    src + 'assets/img/svg/',
    svg_dist:   project_dir + '/img/svg/',
    imgType:    '*.{jpg,jpeg,png,gif}'
  },
  js: {
    src:  src + 'assets/js/',
    dist: project_dir + 'js/'
  },
  php: {
    src:  src + '**/*.php', //src and watch
    dist: project_dir
  },
  customizer_assets: {
    src:  src + 'inc/customizer/assets/**/*{.js,.css,.json}', //src and watch
    dist: project_dir + 'inc/customizer/assets/'
  },
  fonts: {
    src:  src + 'assets/fonts/**/*{.ttf,.woff,.eot,.svg}', //src and watch
    dist: project_dir + 'fonts/'
  },
  lang: {
    src:  src + 'languages/**/*', //src and watch
    dist: project_dir + 'languages/'
  }
};



/////////////////////////////////////////////////////////////////////////

//4.0 Copy PHP source files to the `build` folder
function php(){
  return gulp
  .src(theme.php.src)
  .pipe(changed(theme.php.dist))
  .pipe(gulp.dest(theme.php.dist))
}
//4.0 Copy customizer assets
function copyAssets() {
  return gulp
  .src(theme.customizer_assets.src)
  .pipe(changed(theme.customizer_assets.dist))
  .pipe(gulp.dest(theme.customizer_assets.dist))
}
//4.0 Copy fonts
function copyFonts() {
  return gulp
  .src(theme.fonts.src)
  .pipe(gulp.dest(theme.fonts.dist))
}

//4.0 Copy Js assets: silder, html5shiv
function copyJs() {
  return gulp
  .src([slider, html5shiv, cookies])
  .pipe(changed(project_dir + dist_assets_js))
  .pipe(gulp.dest(project_dir + dist_assets_js))
}
//4.0 Copy Js for gallery and images
function jsImage() {
  return gulp
  .src([imgload, masonry, imgPopup])
  .pipe(changed(project_dir + dist_assets_js))
  .pipe(concat('wpg-image.js'))
  .pipe(uglify())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(project_dir + dist_assets_js))
}
//4.0 Copy js file
function jsMin() {
  return gulp
  .src([theme.js.src + '**/*.min.js'])
  .pipe(changed(theme.js.dist))
  .pipe(gulp.dest(theme.js.dist))
}
//4.0 Copy js file
function jsMinify() {
  return gulp
  .src(['!' + theme.js.src + '**/*.min.js', theme.js.src + '**/*.js'])
  .pipe(changed(theme.js.dist))
  .pipe(uglify())
  .pipe(rename({suffix: '.min'	}))
  .pipe(gulp.dest(theme.js.dist))
}

//4.0 sass style.css
function style() {
  return gulp
  .src([theme.css.src + 'style.scss'])
  .pipe(changed(theme.css.dist))
  //Default:nestedValues:nested,expanded,compact,compressed
  .pipe(sass({outputStyle: 'expanded' }).on('error', sass.logError))
  .pipe(prefixer())
  .pipe(gulp.dest(theme.css.dist));
}
//4.0 sass other
function otherStyle() {
  return gulp
  .src(['!' + theme.css.src + 'style.scss', theme.css.src + '*.scss'])
  .pipe(changed(theme.css.dist_css))
  .pipe(sass().on('error', function(error) {console.log(error);this.emit('end');}))
  .pipe(gulp.dest(theme.css.dist_css));

}
//4.0 copy css
function copyStyle() {
  return gulp
  .src(theme.css.src_css + '*.css')
  .pipe(changed(theme.css.dist_css))
  .pipe(sass().on('error', function(error) {console.log(error);this.emit('end');}))
  .pipe(gulp.dest(theme.css.dist_css));
}

//4.0 header tag
function headerTag() {
  return gulp
  .src(project_dir + 'style.css')
  .pipe(header(
    '/*\n\
    Theme Name: Powiat Bartoszycki\n\
    Theme URI: https://powiat.bartoszyce.pl/\n\
    Author: Kamil Żerebny\n\
    Author URI:https://zerebny.ovh\n\
    Description: :Theme for Powiat Bartoszycki\n\
    Version: 0.1.0\n\
    Licence: GPL-2.0\n\
    Licence URI: http://www.gnu.org/licenses/gpl-2.0.html\n\
    Tags: one-column,responsive-layout,custom-menu,featured-images,microformats,threaded-comments,translation-ready\n\
    Text Domain: wpg_theme\n\
    */\n'
  ))
  .pipe(gulp.dest(project_dir))

}
//4.0 imagesFile
function imagesFile() {
  return gulp
  .src(theme.image.src + '**/' + theme.image.imgType)
  .pipe(changed(theme.image.dist))
  .pipe(imagemin())
  .pipe(gulp.dest(theme.image.dist))
  done();
}
//4.0 svgFile
function svgFile() {
  return gulp
  .src(theme.image.svg_src + '**/*.svg')
  .pipe(changed(theme.image.svg_dist))
  .pipe(svgmin())
  .pipe(gulp.dest(theme.image.svg_dist))
}
//4.0 screenFile
function screenFile() {
  return gulp
  .src(theme.image.img_screen)
  .pipe(imagemin())
  .pipe(gulp.dest(theme.image.dis_screen))

}

//4.0 Generate pot-files for WordPress localization
function translation() {
  return gulp
  .src(theme.php.src)
  .pipe(wpPot({
    domain: 'wpg_theme',
    package: 'Powiat Bartoszycki',
    bugReport: 'http:/powiatbartoszyce.pl'
  }))
  .pipe(gulp.dest(theme.lang.dist + 'powiat-bartoszycki.pot'))
}


//4.0 Generate pot-files for WordPress localization
function langSrc() {
  return gulp
  .src(theme.lang.src)
  .pipe(gulp.dest(theme.lang.dist));
}
function cleanUp() {
  return del(dist);
}

//////////////////////Watch////////////////////////////////////////////////

// Watch files
function watchFiles() {
  //1.Copy PHP source files to the `build`folder
  gulp.watch(theme.php.src, php);
  //2.Copy customizer assets and fonts
  //gulp.watch(theme.customizer_assets.src, copyAssets);
  //3.Copy customizer assets and fonts
  //gulp.watch(theme.fonts.src, copyFonts);
  //4.Copy everything under `src/languages`indiscriminately
  //gulp.watch(theme.lang.src, langDis);
  //6.Generate script theme js
  gulp.watch(theme.js.src + '**/*.js', gulp.series(copyJs, jsImage, jsMin, jsMinify));
  //7.Build stylesheets
  gulp.watch(theme.css.src + '**/*.scss', gulp.series(style, headerTag));
  //8.Copy images
  //gulp.watch([theme.image.src + '**/' + theme.image.imgType],imagesFile);
  //9.Copy svg
  //gulp.watch([theme.image.svg_src + '**/*.svg'],svgFile);
}


exports.images = gulp.series(imagesFile);
exports.clean = gulp.series(cleanUp);
exports.wat = gulp.series(watchFiles);
exports.build = gulp.series(cleanUp, php, copyAssets, copyFonts, copyJs, jsImage, jsMin, jsMinify, style, otherStyle, copyStyle, headerTag, imagesFile, svgFile, screenFile, langSrc, translation);
