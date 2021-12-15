const nameInput = document.querySelector(".name-input");
const numInput = document.querySelector(".num-input");
const emailInput = document.querySelector(".email-input");
const passInput = document.querySelector(".pass-input");
const cpassInput = document.querySelector(".cpass-input");

function validator() {
  const name = nameInput.value.trim();
  const num = numInput.value.trim();
  const email = emailInput.value.trim();
  const password = passInput.value.trim();
  const confirmPassword = nameInput.value.trim();

  if (
    name === "" ||
    num === "" ||
    email === "" ||
    password === "" ||
    confirmPassword === ""
  ) {
    alert("Please input all requirment!");
    return false;
  }
}
