// let inputUsernameValue = document.querySelector('.input-username');
// let inputPasswordValue = document.querySelector('.input-password');
// let inputConfirmPasswordValue = document.querySelector('.input-confirm-password');
// let inputEmailValue = document.querySelector('.input-email');
// let inputDataValue = document.querySelector('.input-data-box');

// const dataRegistration = {
//   username: '',
//   password: '',
//   confirmPassword: '',
//   email: '',
//   data: ''
// };


// document.querySelector('.js-registration-button').addEventListener('click', () => {
//   dataRegistration.username = inputUsernameValue.value ;
//   dataRegistration.password = inputPasswordValue.value ;
//   dataRegistration.confirmPassword = inputConfirmPasswordValue.value ;
//   dataRegistration.email = inputEmailValue.value ;
//   dataRegistration.data = inputDataValue.value;

//   localStorage.setItem('userData', JSON.stringify(dataRegistration));

//   window.location.href = 'login.html'

//   console.log(dataRegistration)
// });

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


