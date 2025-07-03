const moveToLogin = document.getElementsByClassName('moveToLogin');
const moveToSignup = document.getElementsByClassName('moveToSignup');
const guestBtn = document.getElementsByClassName('guest-button');

moveToLogin[0].addEventListener('click', function() {
    window.location.href = '/';
});

moveToSignup[0].addEventListener('click', function() {
    window.location.href = '/signup';
});

guestBtn[0].addEventListener('click', function() {
    window.location.href = '/home';
});