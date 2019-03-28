var gulp   = require('gulp'),
    readme = require('gulp-readme-to-markdown');

//
// Documentation
//

// Generates a README.md from README.txt
gulp.task('readme', () => {
  return gulp.src('readme.txt')
    .pipe(readme({
      details: false,
      screenshot_ext: []
    }))
    .pipe(gulp.dest('.'));
});


//
// Default task
//
gulp.task('default', gulp.series('readme'));
