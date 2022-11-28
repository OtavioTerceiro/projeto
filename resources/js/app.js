require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const inputs = document.querySelectorAll('input');
inputs.forEach(input => {
    input.addEventListener('onfocus',function(){
        console.log(this);
        this.classList.remove('is-invalid');
    })
});
