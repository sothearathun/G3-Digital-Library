

const addGuidelines = document.getElementById('addGuidelines');
const addMoreButtons = document.querySelectorAll('.addMore');

addMoreButtons.forEach(button => {
    button.addEventListener('click', () => {
        addGuidelines.style.display = 'block';
    });
});

