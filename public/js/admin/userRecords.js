
document.querySelectorAll('.user-interaction-select').forEach(function(select) {
  select.addEventListener('change', function() {
    const value = this.value;
    // You can use the user ID if needed: const userId = this.dataset.user;
    if (value === 'log') {
      var modal = new bootstrap.Modal(document.getElementById('log_Modal'));
      modal.show();
    } else if (value === 'interest') {
      var modal = new bootstrap.Modal(document.getElementById('interest_Modal'));
      modal.show();
    } else if (value === 'progress') {
      var modal = new bootstrap.Modal(document.getElementById('progress_Modal'));
      modal.show();
    } else if (value === 'fav') {
      var modal = new bootstrap.Modal(document.getElementById('fav_Modal'));
      modal.show();
    }
    // Reset select to default after opening modal
    this.selectedIndex = 0;
  });
});