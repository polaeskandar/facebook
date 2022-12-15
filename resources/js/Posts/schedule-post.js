export function schedulePost() {
  const schedulePostBtn = document.getElementById('schedule-post-btn')
  const schedulePostCloseBtn = document.getElementById('schedule-post-close-btn');
  const schedulePostInputContainer = document.getElementById('schedule-post-input-container')
  const schedulePostInput = document.getElementById('schedule-post-input')

  if (!schedulePostBtn || !schedulePostInputContainer || !schedulePostInput) return;

  schedulePostBtn.addEventListener('click', function (event) {
    event.preventDefault();
    schedulePostInputContainer.classList.remove('d-none');
    schedulePostInputContainer.classList.add('d-flex');
  });

  schedulePostCloseBtn.addEventListener('click', function (event) {
    event.preventDefault();
    schedulePostInputContainer.classList.add('d-none');
    schedulePostInputContainer.classList.remove('d-flex');
    schedulePostInput.value = '';
  });
}
