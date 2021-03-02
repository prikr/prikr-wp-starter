window.acf = Object;

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

export function isElementInViewport(el) {
  let rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
    rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
  );
}

export function offset(el) {
  var rect = el.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return {
    top: rect.top + scrollTop,
    left: rect.left + scrollLeft
  }
}

export function isElementReadyToLoad(el) {
  const scrollTop = window.scrollY;
  const rect = el.getBoundingClientRect();
  const elOffset = offset(el);
  const innerHeight = (window.innerHeight || document.documentElement.clientHeight);
  return (scrollTop + innerHeight + 200) >= elOffset.top;
}


export function onVisibilityChange(el, callback) {
  let old_visible;
  return function () {
    var visible = isElementReadyToLoad(el);
    if (visible != old_visible) {
      old_visible = visible;
      if (visible !== false) {
        if (typeof callback == 'function') {
          callback();
        }
      }
    }
  }
}