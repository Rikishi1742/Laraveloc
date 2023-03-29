const forms = document.querySelectorAll('.form-bid-delete');
forms.forEach(form => {
  form.addEventListener('submit', function(e) {
    if(!confirm('Вы уверены, что хотите удалить заявку?')) {
      e.preventDefault();
    }
  });
});