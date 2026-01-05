document.querySelector('.scroll-down').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('#lineup').scrollIntoView({
        behavior: 'smooth'
    });
});

document.addEventListener("DOMContentLoaded", function () {
  
// Update cart count from localStorage
    updateCartCount();
  });
  
  // Update cart count in navigation
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    document.querySelectorAll("#cart-count").forEach((el) => {
      el.textContent = totalItems;
    });
  }