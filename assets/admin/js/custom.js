/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
const modal = document.querySelector('.modal');
const btnConfirm = document.querySelector('.btn-confirm');
const btnCancel = document.querySelector('.btn-cancel');

function showModal() {
    modal.style.display = 'block';
}

function hideModal() {
    modal.style.display = 'none';
}

btnConfirm.addEventListener('click', () => {
    // Do something when user confirms
    hideModal();
});

btnCancel.addEventListener('click', hideModal);
"use strict";
