const profileIcon = document.querySelector('.profile-icon');
const profileMenu = document.querySelector('.menu');

profileIcon.addEventListener('click', function() {
    profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
});