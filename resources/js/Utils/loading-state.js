export function initBtnLoadingState(btnId, iconId, spinnerId) {
  const submitBtn = document.getElementById(btnId);
  const submitBtnIcon = document.getElementById(iconId);
  submitBtnIcon.classList.add('d-none')
  submitBtn.classList.add('disabled', 'opacity-75');
  document.getElementById(spinnerId).classList.remove('d-none');
}

export function endBtnLoadingState(btnId, iconId, spinnerId) {
  const submitBtn = document.getElementById(btnId);
  const submitBtnIcon = document.getElementById(iconId);
  submitBtnIcon.classList.remove('d-none')
  submitBtn.classList.remove('disabled', 'opacity-75');
  document.getElementById(spinnerId).classList.add('d-none');
}
