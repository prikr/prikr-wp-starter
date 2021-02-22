const Modal = import('../../node_modules/bootstrap/js/src/modal');

const CookieConsent = import('./cookieconsent')
const LazyLoad = import('./lazyload')

if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker.register("./../dist/js/service-worker.js");
  })
}
