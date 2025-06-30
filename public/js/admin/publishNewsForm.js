document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('news_cover');
    const preview = document.getElementById('news_cover_preview');

    input.addEventListener('change', function () {
        const file = this.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover;">`;
            };

            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    });
});