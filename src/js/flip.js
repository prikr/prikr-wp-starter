const flipCards = document.querySelectorAll('.flip');
const flipcards = [...flipCards];

const cards = document.querySelectorAll('.flip .card');
const cardsarray = [...cards]; 

flipcards.forEach( (flipper) => {
  const card = flipper.querySelector('.card');
  
  cardsarray.forEach( (el) => {
    el.classList.remove( 'flipped' );
  })

  card.addEventListener( 'click', (e) => {
    card.classList.toggle('flipped');
  });
})