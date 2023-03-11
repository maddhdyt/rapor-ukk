function hideAlert() {
    document.querySelector('.alert').classList.add("hide_alert")
}
function showMenuProfile() {
    document.querySelector('.profile_menu').classList.toggle("nav_drop")
}
function showNavbar() {
    document.querySelector('.nav_items').classList.toggle("nav_drop")
}
function showNavbarV2() {
    document.querySelector('.nav_itemsV2').classList.toggle("nav_drop")
}
function showPassword() {
    let inputPassword = document.getElementsByClassName('input_password')
    for (var i = 0; i < inputPassword.length; i++) {
        var inputPasswords = inputPassword[i];
        if (inputPasswords.type == 'password') {
            inputPasswords.type = 'text';
        } else {
            inputPasswords.type = 'password';
        }
    }
}

const actionToggle = document.querySelectorAll('.action_toggle')
for (let i = 0; i < actionToggle.length; i++) {
    const Toggles = actionToggle[i];

    Toggles.addEventListener("click", function (e) {
        Toggles.classList.toggle("drop_active");
        for (let i = 0; i < actionToggle.length; i++) {
            if (actionToggle[i] != Toggles) {
                actionToggle[i].classList.remove('drop_active')
            }
        }
    })
}

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
    hideModal();
});

btnCancel.addEventListener('click', hideModal);