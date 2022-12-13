export function emailVerificationNotice() {
  const sendVerificationEmailBtn = document.getElementById('send-verification-email-btn');
  const sendVerificationEmailForm = document.getElementById('send-verification-email-form');

  if (!sendVerificationEmailBtn || !sendVerificationEmailForm) return;

  sendVerificationEmailBtn.addEventListener('click', function (event) {
    event.preventDefault();
    sendVerificationEmailForm.submit();
  });
}
