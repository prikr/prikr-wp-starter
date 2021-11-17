import crumbs from 'crumbsjs';

const cookieNoticer = document.querySelector('#cookie_consent');
const declinedCookiesBtn = document.querySelector('#declineCookies');
const acceptedCookiesBtn = document.querySelector('#acceptCookies');
const cookieNoticerCk = crumbs.get('acceptedCookies');
const cookieNoticerLs = crumbs.ls.get('acceptedCookies');
const gtmId = window.gtmid;
const ga3Id = window.ga3id;
const ga4Id = window.ga4id;
const conformAvg = window.avg;
const preloadGa = window.preload_ga;

window.addEventListener('load', (e) => {
  
  if (preloadGa) { initGa(); }

  if (conformAvg === false) {
    initGtm();
    if (document.body.contains(cookieNoticer)) {
      if (checkCookies('cookie') === false) {
        if (checkCookies('localStorage') === false) {
          cookieNoticer.style.transform = 'translateY(0)';
        } else {
          return true;
        }
      }
    }
  } else {
    if (document.body.contains(cookieNoticer)) {
      if (checkCookies('cookie') === false) {
        if (checkCookies('localStorage') === false) {
          cookieNoticer.style.transform = 'translateY(0)';
        } else {
          return true;
        }
      }
    }
  }
});

if (document.body.contains(cookieNoticer)) {
  if (document.body.contains(declinedCookiesBtn)) {
    declinedCookiesBtn.addEventListener('click', (e) => {
      setCookie('all', true);
      deleteCookieNotice(true);
    }, false);
  }
  acceptedCookiesBtn.addEventListener('click', (e) => {

    setCookie('all', true);
    
    if (conformAvg) {
      initGtm();
    }
    
    deleteCookieNotice(true);
  }, false);
}

function checkCookies(type) {
  let hasCookie = false;

  if (type === 'cookie') {

    if (!cookieNoticerCk) {
      hasCookie = false;
    } else {
      if (cookieNoticerCk === 'declined') {
        hasCookie = true;
        deleteCookieNotice(false);
      } else if (cookieNoticerCk === 'accepted') {
        initGtm();
        deleteCookieNotice(false);
        hasCookie = true;
      }
    }

  } else if (type === 'localStorage') {
    if (!cookieNoticerLs) {
      hasCookie = false;
    } else {
      if (cookieNoticerLs === 'declined') {
        hasCookie = true;
        deleteCookieNotice(false);
      } else if (cookieNoticerLs === 'accepted') {
        initGtm();
        deleteCookieNotice(false);
        hasCookie = true;
      }
    }
  }
  return hasCookie;
}

function setCookie(type, accepted) {
  let validation = accepted ? 'accepted' : 'declined';
  return (type === 'localStorage') ? crumbs.ls.set("acceptedCookies", validation, {
    type: "day",
    value: 7
  }, "/crumbsjs") : (type === 'all') ? crumbs.ls.set("acceptedCookies", validation, {
    type: "day",
    value: 7
  }, "/crumbsjs") && crumbs.set("acceptedCookies", validation, {
    type: "day",
    value: 7
  }, "/crumbsjs") : crumbs.set("acceptedCookies", validation, {
    type: "day",
    value: 7
  }, "/crumbsjs");
}

function deleteCookieNotice(wasVisible) {
  if (wasVisible) {
    cookieNoticer.classList.add('cookieconsent__close');
    setTimeout(() => {
      cookieNoticer.remove();
    }, 15000)
  } else {
    cookieNoticer.remove();
  }
}

function initGa() {
  if (ga3Id !== '' && ga3Id !== null && ga3Id !== undefined) {
    const ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.id = 'ga3-init';
    ga.async = true;
    ga.src = 'https://www.googletagmanager.com/gtag/js?id=' + ga3Id;
    if (isMyScriptLoaded(ga.src)) return false;

    const s = document.getElementsByTagName('meta')[0];
    s.parentNode.insertBefore(ga, s);

    window.dataLayer = window.dataLayer || [];

    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', ga3Id);
  }

  if (ga4Id !== '' && ga4Id !== null && ga4Id !== undefined) {
    // Init GA 4
    const ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.id = 'ga4-init';
    ga.async = true;
    ga.src = 'https://www.googletagmanager.com/gtag/js?id=' + ga4Id;
    if (isMyScriptLoaded(ga.src)) return false;

    const s = document.getElementsByTagName('meta')[0];
    s.parentNode.insertBefore(ga, s);

    window.dataLayer = window.dataLayer || [];

    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', ga4Id);

  } else {
    return false;
  }
  
}

function initGtm() {
  if (window.gtmDidInit) return false;
  if (gtmId === '' || gtmId === null || gtmId === undefined) return false;
  removeGa();
  (function (w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName('meta')[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.id = 'gtm-init'
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
    j.onload = async () => {
      window.gtmDidInit = true;
      startGtm();
    }
  })(window, document, 'script', 'dataLayer', gtmId);
}


function startGtm() {
  dataLayer.push({
    event: 'gtm.js',
    'gtm.start': (new Date()).getTime(),
    'gtm.uniqueEventId': 0
  });
}

function removeGa() {
  const scriptGa2 = document.querySelector('script[src="https://www.google-analytics.com/analytics.js"]');
  const scriptGa = document.getElementById('ga-init');
  const scriptGa4 = document.getElementById('ga4-init');

  if (scriptGa !== '' && scriptGa !== null && scriptGa !== undefined) {
    scriptGa.remove();
  }

  if (scriptGa2 !== '' && scriptGa2 !== null && scriptGa2 !== undefined) {
    scriptGa2.remove();
  }

  if (scriptGa4 !== '' && scriptGa4 !== null && scriptGa4 !== undefined) {
    scriptGa4.remove();
  }
}

function isMyScriptLoaded(url) {
  var scripts = document.getElementsByTagName('script');
  for (var i = scripts.length; i--;) {
    if (scripts[i].src == url) return true;
  }
  return false;
}