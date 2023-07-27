// document.getElementById('message').addEventListener('click', function () {
//     document.getElementById('message').classList.add('fade')
// });

const open = document.querySelector('#open');
const navbar = document.querySelector('#navbar');
const openSub = document.querySelector('#openSub');
const sub = document.querySelector('#sub');

open.addEventListener('click', () => {
    navbar.classList.toggle('hidden')
});
openSub.addEventListener('click', () => {
    sub.classList.toggle('hidden')
});