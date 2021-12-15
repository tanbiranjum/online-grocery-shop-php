let mark = false;
let btn = document.querySelectorAll(".card-button");

// WILL CONSTRUCT AN ARRAY OF FUNCTION WHICH REMEMBER IT'S PREVIOUS VALUE &
// BASED ON THAT IT WILL GIVE OUTPUT OF DIFFERENT RESULT EACH TIME
// STATE[0]() ==> true
// STATE[0]() ==> false
// STATE[0]() ==> true
let state = Array.from(btn).map(()=> {
  let result = generator();
  return result;
})


btn.forEach((el, i) =>
  el.addEventListener("click", () => {
    let result = state[i]();
    el.innerHTML = result === true ? "Added to cart!" : "Add to cart";
    el.style.background = result === true ? "green" : "#2196F3";
  })
);



function generator() {
  let result = false;
  function innerChild() {
    result = !result;
    return result;
  }
  return innerChild;
}
