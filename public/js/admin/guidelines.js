const editActions = document.querySelectorAll('.actions .btn');
const editForm = document.getElementsByClassName('.edit-form');

editActions.forEach(button => {
    button.addEventListener('click', () => {
        editForm.style.display = 'block';
    });
});

const addGuidelines = document.getElementById('addGuidelines');
const addMore = document.getElementById('addMore');

addMore.forEach(button => {
    button.addEventListener('click', () => {
        addGuidelines.style.display = 'block';
    });
});


