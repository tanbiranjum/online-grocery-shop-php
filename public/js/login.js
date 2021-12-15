const email = document.querySelector(".email-input");
const password = document.querySelector(".pass-input");
const submitBtn = document.querySelector(".submit-btn");

function validator() {
  const emailInput = email.value.trim();
  const passInput = email.value.trim();
  if (emailInput === "" || passInput === "") {
    alert("Please input all requirment!");
    return false;
  }
}
