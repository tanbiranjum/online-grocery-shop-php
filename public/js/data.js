let mark = false;
let fruit = "";
let fish = "";
let dring = "";
let arr;
const catagoryBtn = document.querySelectorAll(".catagory-link");
const productContainer = document.querySelector(".product-container");

catagoryBtn.forEach((btn) => {
  btn.addEventListener("click", function () {
    if (btn.classList.contains("fruit")) {
      productLoader(".FruitsCart", ".MeatCart", ".DrinkCart");
    } else if (btn.classList.contains("fish")) {
      productLoader(".MeatCart", ".FruitsCart", ".DrinkCart");
    } else if (btn.classList.contains("drink")) {
      productLoader(".DrinkCart", ".FruitsCart", ".MeatCart");
    }
  });
});

function generator() {
  let result = false;
  function innerChild() {
    result = !result;
    return result;
  }
  return innerChild;
}

async function getProducts() {
  let products = await fetch("http://localhost/IP/product.php").catch((err) =>
    console.log(err)
  );
  const result = await products.json();
  return result;
}

getProducts().then((data) => {
  arr = data;
  let str = "";
  fruit = arr.filter((el) => {
    if (el[3] === "Fruits & Vegetables") return true;
  });
  fish = arr.filter((el) => {
    if (el[3] === "Meat & Fish") return true;
  });
  loadProduct(arr);
  grabButton();
});

function loadProduct(product) {
  str = "";
  product.forEach((element, i) => {
    let cl = element[3].split(" ")[0] + "Cart";
    str =
      str +
      `<form class="card ${cl}" data-id="${element[5]} action="index.php" method="post">
                <div class="img-container">
                    <img src="${element[4]}" alt="#" class="card-image">
                </div>
                <p class="card-name">${element[0]}</p>
                <p class="card-size">Price: <span class="size">${element[1]} tk</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1 ${element[2]}</span></p>
                <button type="submit" class="card-button" name="add">Add to cart</button>
                <input type="hidden" name="product_id" value="${element[5]}" />
            </form>`;
  });
  productContainer.innerHTML = "";
  productContainer.innerHTML = str;
}

function grabButton() {
  let btn = document.querySelectorAll(".card-button");

  let state = Array.from(btn).map(() => {
    let result = generator();
    return result;
  });

  btn.forEach((el, i) =>
    el.addEventListener("click", () => {
      let result = state[i]();
      el.innerHTML = result === true ? "Added to cart!" : "Add to cart";
      el.style.background = result === true ? "green" : "#2196F3";
    })
  );
}

function productLoader(cardOne, cardTwo, cardThree) {
  const cartOne = document.querySelectorAll(cardOne);
  const cartTwo = document.querySelectorAll(cardTwo);
  const cartThree = document.querySelectorAll(cardThree);
  cartOne.forEach((cart) => {
    cart.style.display = "block";
  });
  cartTwo.forEach((cart) => {
    cart.style.display = "none";
  });
  cartThree.forEach((cart) => {
    cart.style.display = "none";
  });
}
