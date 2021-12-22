function showLoginForm() {
    console.log("showSignupEl");
    let loginForm = document.querySelector("#login");
    let createAccountForm = document.querySelector("#createAccount");

    loginForm.classList.remove("form--hidden");
    createAccountForm.classList.add("form--hidden");
}

function showSignupForm() {
    let loginForm = document.querySelector("#login");
    let createAccountForm = document.querySelector("#createAccount");

    loginForm.classList.add("form--hidden");
    createAccountForm.classList.remove("form--hidden");
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");
    let showLoginEl = document.querySelector("#activateLoginForm");
    let showSignupEl = document.querySelector("#activateSignupForm");

    if (showLoginEl) {
        showLoginForm()
    }
    else if (showSignupEl) {
        showSignupForm();
    }

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        showSignupForm()
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        showLoginForm()
    });
});

let showLoginEl = document.querySelector("#activateLoginForm");
if (showLoginEl) {
    showLoginForm()
}

let showSignupEl = document.querySelector("#activateSignupForm");

if (showSignupEl) {
    showSignupForm();
}

showLoginEl.addEventListener("load", showLoginForm);
showSignupEl.addEventListener("load", showSignupForm);