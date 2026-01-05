document.addEventListener("DOMContentLoaded", function () {
  // Event tombol tambah ke keranjang
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.getAttribute("data-id");
      const productName = this.getAttribute("data-name");
      const productPrice = parseInt(this.getAttribute("data-price"));
      const productImage = this.closest(".menu-item")
        .querySelector("img")
        .getAttribute("src");
      addToCart(productId, productName, productPrice, productImage);
    });
  });

  // Inisialisasi cart jika belum ada
  let cartData = localStorage.getItem("cart");

  if (cartData === null) {
    localStorage.setItem("cart", JSON.stringify([]));
  }
  

  // Tampilkan item cart di halaman cart
  if (document.querySelector("#cart-table-body")) {
    displayCartItems();
  }

  // Tampilkan item cart di halaman checkout
  if (document.querySelector("#checkout-items")) {
    displayCheckoutItems();
  }

  // Event untuk tombol tambah/kurang/hapus di cart
  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("increase")) {
      const productId = e.target.closest("tr").getAttribute("data-id");
      updateQuantity(productId, 1);
    }
    if (e.target.classList.contains("decrease")) {
      const productId = e.target.closest("tr").getAttribute("data-id");
      updateQuantity(productId, -1);
    }
    if (e.target.classList.contains("remove-item")) {
      const productId = e.target.closest("tr").getAttribute("data-id");
      removeFromCart(productId);
    }
  });

  // Validasi tombol checkout
  const checkoutBtn = document.getElementById("checkout-btn");
  if (checkoutBtn) {
    checkoutBtn.addEventListener("click", function (e) {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      if (cart.length === 0) {
        e.preventDefault();
        alert(
          "Keranjang belanja Anda kosong. Silahkan tambahkan produk terlebih dahulu."
        );
      }
    });
  }

  // Form order
  const orderForm = document.getElementById("order-form");
  if (orderForm) {
    orderForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(this);
      const order = {
        customer: {
          name: formData.get("name"),
          address: formData.get("address"),
          phone: formData.get("phone"),
          payment: formData.get("payment"),
          notes: formData.get("notes"),
        },
        items: JSON.parse(localStorage.getItem("cart")) || [],
        total: calculateTotal(),
      };
      console.log("Order submitted:", order);
      alert(
        "Pesanan Anda telah berhasil diterima! Kami akan segera menghubungi Anda untuk konfirmasi."
      );
      localStorage.setItem("cart", JSON.stringify([]));
      updateCartCount();
      window.location.href = "index.php";
    });
  }

  // Form kontak
  const contactForm = document.getElementById("contact-form");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(this);
      const message = {
        name: formData.get("name"),
        email: formData.get("email"),
        subject: formData.get("subject"),
        message: formData.get("message"),
      };
      console.log("Message submitted:", message);
      alert("Pesan Anda telah terkirim! Terima kasih telah menghubungi kami.");
      this.reset();
    });
  }
});

// Cart functions
function addToCart(id, name, price, image) {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const existingItem = cart.find((item) => item.id === id.toString());
  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      id: id.toString(),
      name,
      price,
      image,
      quantity: 1,
    });
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartCount();
  alert(`${name} telah ditambahkan ke keranjang!`);
}

function removeFromCart(id) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart = cart.filter((item) => item.id !== id);
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartCount();
  displayCartItems();
  displayCheckoutItems();
}

function updateQuantity(id, change) {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const item = cart.find((item) => item.id === id);
  if (item) {
    item.quantity += change;
    if (item.quantity <= 0) {
      removeFromCart(id);
      return;
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartCount();
    displayCartItems();
    displayCheckoutItems();
  }
}

function displayCartItems() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const cartTableBody = document.querySelector("#cart-table-body");
  const cartTotal = document.querySelector("#cart-total");
  if (cartTableBody) {
    cartTableBody.innerHTML = "";
    if (cart.length === 0) {
      cartTableBody.innerHTML =
        '<tr><td colspan="5" class="text-center">Keranjang belanja kosong</td></tr>';
      cartTotal.textContent = "Rp 0";
      return;
    }
    cart.forEach((item) => {
      const subtotal = item.price * item.quantity;
      const row = document.createElement("tr");
      row.setAttribute("data-id", item.id);
      row.innerHTML = `
        <td>
          <img src="${item.image}" class="cart-product-img" alt="${item.name}">
          ${item.name}
        </td>
        <td>Rp ${item.price.toLocaleString()}</td>
        <td>
          <div class="quantity-control">
            <button class="decrease">-</button>
            <span>${item.quantity}</span>
            <button class="increase">+</button>
          </div>
        </td>
        <td>Rp ${subtotal.toLocaleString()}</td>
        <td><span class="remove-item">Hapus</span></td>
      `;
      cartTableBody.appendChild(row);
    });
    cartTotal.textContent = `Rp ${calculateTotal().toLocaleString()}`;
  }
}

function displayCheckoutItems() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const checkoutItems = document.querySelector("#checkout-items");
  const checkoutTotal = document.querySelector("#checkout-total");
  if (checkoutItems) {
    checkoutItems.innerHTML = "";
    cart.forEach((item) => {
      const subtotal = item.price * item.quantity;
      const itemElement = document.createElement("div");
      itemElement.className = "order-item";
      itemElement.innerHTML = `
        <div>${item.name} (${item.quantity}x)</div>
        <div>Rp ${subtotal.toLocaleString()}</div>
      `;
      checkoutItems.appendChild(itemElement);
    });
    checkoutTotal.textContent = `Rp ${calculateTotal().toLocaleString()}`;
  }
}

function calculateTotal() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  return cart.reduce((total, item) => total + item.price * item.quantity, 0);
}

function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  const cartCountElement = document.getElementById("cart-count");
  if (cartCountElement) {
    cartCountElement.textContent = `${totalItems}`; 
  }
}

window.onload = function() {
  updateCartCount();
};

