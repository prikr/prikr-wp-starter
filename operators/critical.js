const fs = require('fs')
const urlList = require('../critical.pages.json');
const Crittr = require("crittr");

function generateCriticalCss() {

  [...urlList.urls].forEach(async (obj) => {

    console.log(`[🟠 ${obj.name}]: Creating critical CSS...`);

    const CSS_FILE = `./style.css`;
    const CRITICAL_DOMAIN_FOLDER = `./dist/critical`;

    if (!fs.existsSync(CRITICAL_DOMAIN_FOLDER)) {
      fs.mkdirSync(CRITICAL_DOMAIN_FOLDER);
    }
    fs.writeFileSync(`${CRITICAL_DOMAIN_FOLDER}/${obj.name}.critical.css`, '');

    const urls = [];
    urls.push(obj.link);

    try {
      await Crittr({
        urls: urls,
        css: `${CSS_FILE}`,
        removeSelectors: [
          '@font-face',
          'font-face',
          'font',
          '%col%',
          '%-md-%',
          '%-lg-%',
          '%-xl-%',
          '%hamburger%',
          'hamburger%'
        ],
        device: {
          width: 1920,
          height: 400
        },
      }).then( ( { critical, rest } ) => {

        let rewritepaths_critical = critical.replace(/dist\/fonts/g, '/wp-content/themes/flexurity/dist/fonts');
        rewritepaths_critical = rewritepaths_critical.replace(/dist\/img/g, '/wp-content/themes/flexurity/dist/img');

        let rewritepaths_rest = rest.replace(/dist\/fonts/g, '/wp-content/themes/flexurity/dist/fonts');
        rewritepaths_rest = rewritepaths_rest.replace(/dist\/img/g, '/wp-content/themes/flexurity/dist/img');

        /** 
         * Write critical to file
         */
        fs.promises
          .writeFile(`${CRITICAL_DOMAIN_FOLDER}/${obj.name}.critical.css`, rewritepaths_critical, {
              encoding: 'utf8'
            },
            (err) => {
              if (err) throw err;
            })
          .then(() => {
            console.log(`[🚀 ${obj.name}]: Critical CSS file is being generated.`);
          });

        /** 
         * Write critical to file
         */
        fs.promises
          .writeFile(`${CRITICAL_DOMAIN_FOLDER}/${obj.name}.style.css`, rewritepaths_rest, {
              encoding: 'utf8'
            },
            (err) => {
              if (err) throw err;
            })
          .then(() => {
            console.log(`[🟢 ${obj.name}]: Done creating critical CSS!`);
          });
      })
      .catch( (err) => {
        console.log(err);
      })

    } catch (err) {
      console.error(err);
    }
  })

}

module.exports = {
  generateCriticalCss
}