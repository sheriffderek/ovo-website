
const version = 'v0.0.4'

console.log(`displaying ${version}`);

const versionOulet = document.querySelectorAll('.site-version');

versionOulet.forEach( (outlet) => outlet.innerHTML = version);


const siteLinks = document.querySelectorAll('a');


const bodyElement = document.getElementsByTagName('body')[0]



const foldUps = document.querySelectorAll(`[rel='jjs'`);
const openers = document.querySelectorAll(`[rel='opener'`);

foldUps.forEach( function(area) {
  area.classList.add('closed'); // if JS / set sections for fold up
});

[...openers].forEach( function(button, index) {
  button.addEventListener('click', function() {
    this.closest(`[rel='jjs'`).classList.remove('closed');
  });
});


const menuToggle = document.querySelector('.menu-toggle');

menuToggle.addEventListener('click', function() {
  alert('Would open a menu');
});


// bodyElement.classList.add('closed');

// setTimeout( function() {
//   bodyElement.classList.add('opening');
//   setTimeout( function() {
//     bodyElement.classList.remove('closed', 'opening');
//     bodyElement.classList.add('open');
//   }, 5000);

// }, 3000);


// function closeUp() {
//   bodyElement.classList.add('closing');
// }

// function delayLink(URL) {
//   closeUp();
//   setTimeout( function() {
//     window.location = URL
//   }, 500);
// }

// siteLinks.forEach( function(link) {
//   link.addEventListener('click', function() {
//     var destination = link.getAttribute('href');
//     delayLink(destination);
//   });
// });