// Profile Image Upload Container on Index Page
const imageUploadContainer = document.getElementById('upload-image-container');
const closeImageUploadContainerBtn = document.getElementById('upload-image-close');

if (localStorage.getItem('closedImageContainer') === 'true') imageUploadContainer && imageUploadContainer.remove();
else closeImageUploadContainerBtn && closeImageUploadContainerBtn.addEventListener('click', () => {
  imageUploadContainer.remove();
  localStorage.setItem('closedImageContainer', 'true');
});
