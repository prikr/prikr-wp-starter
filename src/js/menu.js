import {
  isDesktop
} from './helpers';

const hamburgerWrapper = document.querySelector(".hamburger__wrapper");
const hamburger = document.querySelector(".hamburger");
const body = document.querySelector('body');
const navigation = document.querySelector('.navigation');

/**
 * Fixed nav
 */
/**
 * Fixed navigation and call-us button
 */
 const fixedNav = document.querySelector('.header__navigation');
 
 
 window.addEventListener('scroll', function () {
   let scrollPosition = window.scrollY;
   let offsetA = 50;
   let offsetB = 150;

   if (scrollPosition >= offsetA) {
     if (fixedNav) {
       fixedNav.classList.add('sticky');
       body.style.marginTop = '56px';
     }
   } else {
    if (fixedNav.classList.contains('sticky')) {
      fixedNav.classList.remove('sticky');
      body.style.marginTop = '0px';

     }
   } 


   if(scrollPosition >= offsetB) {
     fixedNav.classList.add('active');
   } else {
     if (fixedNav.classList.contains('active')) {
      fixedNav.classList.remove('active');
     }
   }
 });

/**
 * Toggle menu on menu-icon click
 */
if (hamburgerWrapper) {

  hamburgerWrapper.addEventListener("click", function () {
    console.log(body.classList.contains('sub-menu-active'));
    if (!body.classList.contains('sub-menu-active')) {
      toggleMenu();
    }
  });
}
  
/**
 * Toggle menu on mobile if click on link with Anchor
 */
const navigationItems = document.querySelectorAll('.menu-item a');
if (navigationItems) {
  navigationItems.forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      if (e.target.hash) {
        toggleMenu();
      } else {
        return true;
      }
    })
  });
}

/**
 * Toggle mobile menu function
 */
function toggleMenu() {
  if (!isDesktop()) {
    hamburger.classList.toggle("is-active");
    body.classList.toggle('modal-open');

    if (body.style.overflow === 'hidden') {
      body.style.overflow = 'initial';
    } else {
      body.style.overflow = 'hidden';
    }
    body.classList.toggle('navigation-is-open');
    navigation.classList.toggle('navigation__is-open');
    closeAllSubMenus();
  }
}



/**
 * 
 * #########################
 * Mobile section
 * #########################
 * 
 */
const listItemsWithChildren = document.querySelectorAll('.menu-item-has-children');
const arrayListItemsWithChildren = [...listItemsWithChildren];
const mainMenu = document.querySelector('.nav__menu');
const navWrapper = document.querySelector('.navwrapper');
const backButton = document.querySelector('.back-button');
const hamburgerBackButton = document.querySelector('.hamburger__backbutton');

/**
 * Opening sub menu
 */
if (!isDesktop()) {
  if (arrayListItemsWithChildren) {
  arrayListItemsWithChildren.forEach(listItem => {
    let subMenu = listItem.querySelector('.sub-menu');
    let navAnchor = listItem.querySelector('.nav__anchor');

    listItem.addEventListener('click', (e) => {

      console.log({
        parent: e.target.parentNode.parentNode,
        contains: e.target.parentNode.parentNode.classList.contains('sub-menu')
      });

      if (e.target.parentNode.parentNode.classList.contains('sub-menu')) {
        return true;
      } else {

        e.preventDefault();

        listItem.classList.add('sub-menu-active');
        subMenu.classList.add('active');

        let inlineItem = document.createElement('li');
        inlineItem.innerHTML = listItem.innerHTML;
        inlineItem.setAttribute('id', 'subMenuTitle');

        inlineItem.removeChild(inlineItem.querySelector('.sub-menu'));

        if (!subMenu.querySelector('#subMenuTitle')) {
          subMenu.prepend(inlineItem);
        }

        mainMenu.classList.add('nav__menu__sub-menu-active');
        navWrapper.classList.add('bg-white');
        body.classList.add('sub-menu-active');
        hamburgerBackButton.classList.add('active');

      }
    })

  })
}

}

if (backButton) {

  backButton.addEventListener('click', (e) => {
    e.preventDefault();
    closeAllSubMenus();
    hamburgerBackButton.classList.remove('active');
  });
  
}

/**
 * Closing submenu
 */
function closeAllSubMenus() {
  arrayListItemsWithChildren.forEach(listItem => {
    let subMenu = listItem.querySelector('.sub-menu');
    let navAnchor = listItem.querySelector('.nav__anchor');

    listItem.classList.remove('sub-menu-active');
    subMenu.classList.remove('active');
    mainMenu.classList.remove('nav__menu__sub-menu-active');
    navWrapper.classList.remove('bg-white');
    body.classList.remove('sub-menu-active');
  });
}