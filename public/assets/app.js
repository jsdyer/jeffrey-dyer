'use strict';

// An accessible lightbox for the illustrated collection studies.
// Replace the image and copy in content/personal.json when real photographs are ready.
const studies = [...document.querySelectorAll('.photo-open')];
const dialog = document.querySelector('#photo-dialog');
let selectedStudy = 0;
let returnFocus = null;

function displayStudy(index) {
  selectedStudy = (index + studies.length) % studies.length;
  const study = studies[selectedStudy].dataset;
  const image = document.querySelector('#photo-image');
  image.src = study.src;
  image.alt = study.alt;
  document.querySelector('#photo-title').textContent = study.title;
  document.querySelector('#photo-caption').textContent = study.caption;
  document.querySelector('#photo-position').textContent = `${selectedStudy + 1} / ${studies.length}`;
}

studies.forEach((button, index) => button.addEventListener('click', () => {
  returnFocus = button;
  displayStudy(index);
  dialog.showModal();
}));
document.querySelector('.lightbox-close')?.addEventListener('click', () => dialog.close());
document.querySelector('#photo-prev')?.addEventListener('click', () => displayStudy(selectedStudy - 1));
document.querySelector('#photo-next')?.addEventListener('click', () => displayStudy(selectedStudy + 1));
dialog?.addEventListener('keydown', event => {
  if (event.key === 'ArrowRight') { event.preventDefault(); displayStudy(selectedStudy + 1); }
  if (event.key === 'ArrowLeft') { event.preventDefault(); displayStudy(selectedStudy - 1); }
});
dialog?.addEventListener('click', event => {
  if (event.target !== dialog) return;
  const bounds = dialog.getBoundingClientRect();
  if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) dialog.close();
});
dialog?.addEventListener('close', () => returnFocus?.focus());
