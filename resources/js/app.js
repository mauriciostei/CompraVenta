import './bootstrap';

let boton = document.querySelector('#toggleMenu');
let menu = document.querySelector('#menu');

boton.addEventListener('click', (event) => {
    menu.toggleAttribute('hidden');
});


const toastElList = document.querySelectorAll('.toast')
const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, {delay: 3000}))
toastList.forEach(toast => toast.show());