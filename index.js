document.querySelector('.js-search').addEventListener('click', () => {
  const fromValue = document.querySelector('.js-input-from');
  const toValue = document.querySelector('.js-input-to');
  const dataValue = document.querySelector('.js-data');

  document.querySelector('.js-input-show').innerHTML = `From ${fromValue.value} to ${toValue.value} Data: ${dataValue.value}`
})