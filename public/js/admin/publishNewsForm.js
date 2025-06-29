  const newsCoverInput = document.getElementById('news_cover');
  const newsCoverPreview = document.getElementById('news_cover_preview');

  newsCoverInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
      newsCoverPreview.style.backgroundImage = `url(${event.target.result})`;
    };

    reader.readAsDataURL(file);
  });

  const cancelButton = document.getElementById('cancel-button');
  cancelButton.addEventListener('click', (e) => {
    e.preventDefault();
    window.location.href = '/DigitalesNews';
  });