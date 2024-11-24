document.querySelectorAll('.input-field').forEach(input => {
  input.addEventListener('focus', () => {
      const label = input.nextElementSibling;
      label.classList.add('active');
  });

  input.addEventListener('blur', () => {
      if (!input.value) {
          const label = input.nextElementSibling;
          label.classList.remove('active');
      }
  });
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();
  
  const formData = new FormData(this);
  const xhr = new XMLHttpRequest();
  
  xhr.open('POST', this.action, true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  
  xhr.onload = function() {
      if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          const errorMessage = document.getElementById('error-message');

          if (response.status === "success") {
              window.location.href = response.redirect;
          } else {
              errorMessage.style.display = 'block';
              errorMessage.textContent = response.message;
          }
      }
  };

  xhr.send(formData);
});
