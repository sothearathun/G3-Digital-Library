const writeComment = document.getElementsByClassName('writeComment');
const hiddenCmtForm = document.getElementsByClassName('hiddenCmtForm');

writeComment[0].addEventListener('click', function() {
  hiddenCmtForm[0].style.display = 'block';
});

const cancelBtn = document.getElementsByClassName('btn-cancel');

cancelBtn.addEventListener('click', function() {
  hiddenCmtForm.style.display = 'none';
});

