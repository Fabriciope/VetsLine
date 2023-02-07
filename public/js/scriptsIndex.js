const menu= document.getElementById('menu');
const x= document.getElementById('x');
const perfil= document.getElementById('btn_perfil');
menu.addEventListener('click', ()=>{
    const ul= document.getElementById('ul_nav');
    ul.classList.add('active');
});
x.addEventListener('click', ()=>{
    const ul= document.getElementById('ul_nav');
    ul.classList.remove('active');
})
perfil.addEventListener('click', ()=>{
    const ul_perfil= document.getElementById('ul_perfil');
    ul_perfil.classList.toggle('perfil_active');
})
