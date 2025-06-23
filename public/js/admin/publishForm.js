  const bookCoverInput = document.getElementById('book_cover');
  const bookCoverPreview = document.getElementById('book_cover_preview');

  bookCoverInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
      bookCoverPreview.style.backgroundImage = `url(${event.target.result})`;
    };

    reader.readAsDataURL(file);
  });