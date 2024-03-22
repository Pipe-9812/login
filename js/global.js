
// function changeType() {
//     let inpPasswords = document.querySelectorAll(".password");
//     let iconToggles = document.querySelectorAll(".icon-toggle");

//     inpPasswords.forEach(function(inpPassword, index) {
//         if (inpPassword.type === "password") {
//             inpPassword.type = "text";
//             iconToggles[index].classList.remove("fa-eye");
//             iconToggles[index].classList.add("fa-eye-slash");
//         } else {
//             inpPassword.type = "password";
//             iconToggles[index].classList.remove("fa-eye-slash");
//             iconToggles[index].classList.add("fa-eye");
//         }
//     });
// }


function changeType(iconToggle) {
    let inpPassword = iconToggle.parentElement.previousElementSibling;

    if (inpPassword.type === "password") {
        inpPassword.type = "text";
        inpPassword.focus();
        iconToggle.classList.remove("fa-eye");
        iconToggle.classList.add("fa-eye-slash");
    } else {
        inpPassword.type = "password";
        inpPassword.focus();
        iconToggle.classList.remove("fa-eye-slash");
        iconToggle.classList.add("fa-eye");
    }
}