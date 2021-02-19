import LazyLoad from "vanilla-lazyload";

const images = document.querySelectorAll("img");

const createLazyLoadInstance = () => {
  console.log('entering yes!');
	return new LazyLoad({
    unobserve_entered: true,
    webp: true,
    elements_selector: ".lazy"
  }, 
  images
  );
};

const delayedCreateLazyLoadInstance = () => {
  setTimeout(createLazyLoadInstance, 100);
}

document.addEventListener("DOMContentLoaded", createLazyLoadInstance);