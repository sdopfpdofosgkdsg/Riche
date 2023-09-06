const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const error = document.querySelector('.error')
const closeBtn = document.querySelector('.close')

signUpButton.addEventListener('click', () =>
container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () =>
container.classList.remove('right-panel-active'));

console.log(1)
closeBtn.addEventListener('click', () => {

    error.classList.add('block__close')
})