import crumbs from 'crumbsjs';

const cookieNoticer = document.querySelector('#cookie_consent');
const declinedCookiesBtn = document.querySelector('#declineCookies');
const acceptedCookiesBtn = document.querySelector('#acceptCookies');
const cookieNoticerCk = crumbs.get('acceptedCookies');
const cookieNoticerLs = crumbs.ls.get('acceptedCookies');
const gtmId = document.head.querySelector("[name=gtm]") ? document.head.querySelector("[name=gtm]").content : '';
const gaId = document.head.querySelector("[name=ga]") ? document.head.querySelector("[name=ga]").content : '';

window.addEventListener( 'load', (e) => {
  if (document.body.contains(cookieNoticer)) {
    checkCookies('cookie'); 
    checkCookies('localStorage');
  }
});

if (document.body.contains(cookieNoticer)) {
  declinedCookiesBtn.addEventListener('click', (e) => {
    initGa();
    setCookie('all', true);
    deleteCookieNotice(true);
  }, false);
  acceptedCookiesBtn.addEventListener('click', (e) => {
    initGtm();
    initGa();
    setCookie('all', true);
    deleteCookieNotice(true);
  }, false);
}

function checkCookies(type) {
  let hasCookie = false;

  if (type === 'cookie') {
    if (cookieNoticerCk === 'declined') {
      hasCookie = true;
      deleteCookieNotice(false);
    } else if (cookieNoticerCk === 'accepted') {
      initGtm();
      deleteCookieNotice(false);
      hasCookie = true;
    }
  } 
  else if (type === 'localStorage') {
    if (cookieNoticerLs === 'declined') {
      hasCookie = true;
      deleteCookieNotice(false);
    } else if (cookieNoticerLs === 'accepted') {
      initGtm();
      deleteCookieNotice(false);
      hasCookie = true;
    }
  }
  return hasCookie;
}

function setCookie(type, accepted) {
  let validation = accepted ? 'accepted' : 'declined';
  return (type === 'localStorage') ? crumbs.ls.set("acceptedCookies", validation) : (type === 'all') ? crumbs.ls.set("acceptedCookies", validation) && crumbs.set("acceptedCookies", validation) : crumbs.set("acceptedCookies", validation);
}

function deleteCookieNotice(wasVisible) {
  if (wasVisible) {
    cookieNoticer.classList.add('cookieconsent__close');
    setTimeout( () => {
      return cookieNoticer.remove();
    }, 15000)
  } else {
    return cookieNoticer.remove();
  }
}

function initGtm () {
	if (window.gtmDidInit) return false;
  if (gtmId === '' || gtmId === null || gtmId === undefined) return false;
	window.gtmDidInit = true; // flag to ensure script does not get added to DOM more than once.
	const script = document.createElement('script');
    script.type = 'text/javascript';
    script.async = true;
    script.onload = () => { dataLayer.push({ event: 'gtm.js', 'gtm.start': (new Date()).getTime(), 'gtm.uniqueEventId': 0 }); } // this part ensures PageViews is always tracked
    script.src = 'https://www.googletagmanager.com/gtm.js?id=' + gtmId;
	document.head.appendChild(script);
}

var _gaq = [];
_gaq.push(['_setAccount', gaId]);
_gaq.push(['_trackPageview']);

function initGa() {
  if (gaId === '' || gaId === null || gaId === undefined) return false;
  const ga = document.createElement('script');
  ga.type = 'text/javascript';
  ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

  const s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(ga, s);
}