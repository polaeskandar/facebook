export const getIframeContents = (iframe) => {
  return document.querySelector(iframe).contentDocument.querySelector('body').innerHTML
}

export const clearIframeContents = (iframe) => {
  return document.querySelector(iframe).contentDocument.querySelector('body').innerHTML = '';
}
