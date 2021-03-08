import path from 'path'
import penthouse from 'penthouse'
import fs from 'fs'
import urlList from '../critical.pages.json'

function generateCriticalCss() {
  return new Promise((resolve, reject) => {
    urlList.urls.forEach(function (item, i) {
      penthouse({
          url: item.link, // can also use file:/// protocol for local files
          css: path.join(__dirname, '../style.css'), // path to original css file on disk
          width: 1920, // viewport width for 13" Retina Macbook.  Adjust for your needs
          height: 1080, // viewport height for 13" Retina Macbook.  Adjust for your needs
          keepLargerMediaQueries: true, // when true, will not filter out larger media queries
          propertiesToRemove: [
            '@font-face',
            /url\(/
          ],
          userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
          puppeteer: {
            getBrowser: undefined,
          },
          // screenshots: {
          //   basePath: 'homepage', // absolute or relative; excluding file extension
          //   type: 'jpeg', // jpeg or png, png default
          //   quality: 20 // only applies for jpeg type
          // }
        })
        .then((criticalCss) => {
          // use the critical css
          fs.writeFileSync('./dist/critical/critical-' + item.name + '.css', criticalCss);
          resolve();
        })
        .catch((err) => {
          // handle the error
          console.log(err);
          reject();
        })
    })
  })
}

module.exports = {
  generateCriticalCss
}