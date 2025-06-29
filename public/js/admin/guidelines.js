const editActions = document.querySelectorAll('.actions .btn');
const editForm = document.getElementsByClassName('.edit-form');

editActions.forEach(button => {
    button.addEventListener('click', () => {
        editForm.style.display = 'block';
    });
});

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})


function handleEnter(e, input) {
  if (e.key === 'Enter') {
    e.preventDefault();
    addBulletPoint();
  }
}
