/**
 * Helpers
 */
import { onVisibilityChange } from './helpers'

/**
 * Web standards
 */
import './menu'
import './lazyload'
import './cookieconsent'

/**
 * Scripts which doesn't need dynamic import
 */
import {  Modal } from 'bootstrap';

/**
 * Dynamic import scripts
 */
const elements = [
  '.has-js-flip',
  '.googlemap_textright'

];

[].forEach.call(elements, (element) => {


  if (document.querySelector(element) !== null && document.querySelector(element) !== undefined) {

    const lazyloadHandler = onVisibilityChange(document.querySelector(element), function () {

      // Example library without init:
      if (element === '.has-js-flip') {
        const Filters = import('./flip')
      }
      
      if (element === '.googlemap_textright') {
        const Filters = import('./googlemap')
      }

      // Example library with init:
      // if (element === '[data-aos]' || element === '.aos-element') {
      //   const AOS = import('aos').then(AOS => {
      //     AOS.init();
      //   });
      // }
    })

    if (window.addEventListener) {
      addEventListener('DOMContentLoaded', lazyloadHandler, false);
      addEventListener('load', lazyloadHandler, false);
      addEventListener('scroll', lazyloadHandler, false);
      addEventListener('resize', lazyloadHandler, false);
    } else if (window.attachEvent) {
      attachEvent('onDOMContentLoaded', lazyloadHandler); // Internet Explorer 9+ :(
      attachEvent('onload', lazyloadHandler);
      attachEvent('onscroll', lazyloadHandler);
      attachEvent('onresize', lazyloadHandler);
    }
  }
});
