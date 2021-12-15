const cart = document.querySelectorAll(".card");
const priceNode = document.querySelectorAll(".price");
const totalPriceNode = document.querySelector(".totalPrice");
const totalPriceHidden = document.querySelector(".total-h");
let totalSum = 0;

const priceAll = Array.from(priceNode).map((item) => {
  totalSum = totalSum + 1 * item.innerHTML;
  return 1 * item.innerHTML;
});

totalPriceNode.innerHTML = totalSum;
totalPriceHidden.value = totalSum;

const priceInc = [...priceAll];

cart.forEach((c, i) => {
  c.addEventListener("click", (e) => {
    //DELETE BUTTON
    if (e.target.classList.contains("card-btn-del")) {
      if (confirm("Are you sure you want to delete this?")) {
        c.remove();
        increaseTotalSum(i);
      }
    }
    //ADD BUTTON
    if (e.target.classList.contains("btn-plus")) {
      let quantity = c.querySelector(".quantity");
      let quantityHidden = c.querySelector(".card-quantity-h");
      quantity.innerHTML++;
      quantityHidden.value++;
      c.querySelector(".price").innerHTML =
        priceAll[i] * (1 * quantity.innerHTML);
      c.querySelector(".card-money-h").value =
        priceAll[i] * (1 * quantity.innerHTML);
      priceInc[i] = c.querySelector(".price").innerHTML * 1;
      totalPriceNode.innerHTML = 1 * totalPriceNode.innerHTML + priceAll[i];
      totalSum = totalPriceNode.innerHTML * 1;
      totalPriceHidden.value = totalSum;
    }
    //DELETE BUTTON
    if (e.target.classList.contains("btn-minus")) {
      let quantity = c.querySelector(".quantity");
      if (quantity.innerHTML * 1 >= 1) {
        quantity.innerHTML--;
        c.querySelector(".price").innerHTML =
          priceAll[i] * (1 * quantity.innerHTML);
        priceInc[i] = c.querySelector(".price").innerHTML * 1;
        totalPriceNode.innerHTML = 1 * totalPriceNode.innerHTML - priceAll[i];
        totalSum = totalPriceNode.innerHTML * 1;
        totalPriceHidden.value = totalSum;
      }
    }
  });
});

function increaseTotalSum(i) {
  totalSum = totalSum - priceInc[i];
  totalPriceNode.innerHTML = totalSum;
  totalPriceHidden.value = totalSum;
}
