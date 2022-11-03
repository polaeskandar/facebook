export function notify(text) {
  const notificationToast = document.getElementById('notification-toast');
  notificationToast.querySelector('.toast-body').innerText = text;
  const toast = new bootstrap.Toast(notificationToast);
  toast.show();
}
