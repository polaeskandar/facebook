const errorsContainer = () => {
  window.addEventListener('load', function () {
    const errorsContainerElement = document.querySelector('.errors-container');
    errorsContainerElement && document.querySelector('.errors-container').classList.add('active');
  });
}

export { errorsContainer }
