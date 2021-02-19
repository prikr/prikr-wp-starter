import gulp from gulp
import imagemin from 'gulp-imagemin'
import newer from 'gulp-newer'

function images() {
  return gulp
    .src("./../src/img/*")
    .pipe(newer("./../dist/img"))
    .pipe(
      imagemin([
        imagemin.gifsicle({
          interlaced: true
        }),
        imagemin.mozjpeg({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 5
        }),
        imagemin.svgo({
          plugins: [{
              optimizationLevel: 3
            },
            {
              progessive: true
            },
            {
              interlaced: true
            },
            {
              removeViewBox: false
            },
            {
              removeUselessStrokeAndFill: false
            },
            {
              cleanupIDs: false
            },
            {
              removeXMLProcInst: false
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest("./../dist/img"));
}

exports.images = images;