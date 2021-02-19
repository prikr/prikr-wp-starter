export function isDesktop() {
  var screensize = window.matchMedia("(min-width: 1200px)");
  return screensize.matches;
}
window.addEventListener('resize', isDesktop);

export function isMobileOrTablet() {
  var screensize = window.matchMedia("(max-width: 1200px)");
  return screensize.matches;
}
window.addEventListener('resize', isMobileOrTablet);


export function fromBreakpoint(point) {
  var screensize = window.matchMedia("(min-width: " + point + ")");
  return screensize.matches;
}

export function toBreakpoint(point) {
  var screensize = window.matchMedia("(max-width: " + point + ")");
  return screensize.matches;
}

