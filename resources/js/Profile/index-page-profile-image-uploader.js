const indexPageProfileImageUploader = () => {
  const imageUploadContainer = document.getElementById('index-page-image-uploader');
  const closeImageUploadContainerBtn = document.getElementById('index-page-image-uploader-close');

  if (localStorage.getItem('closedImageContainer') === 'true' && imageUploadContainer) imageUploadContainer.remove();
  else if (closeImageUploadContainerBtn) closeImageUploadContainerBtn.addEventListener('click', () => {
    imageUploadContainer.remove();
    localStorage.setItem('closedImageContainer', 'true');
  });
}

export { indexPageProfileImageUploader }
