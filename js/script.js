const modalButton = document.getElementById("modal-button");
const modal = document.getElementById("modal");
const closeModal = document.getElementById("close-modal");
const loginTab = document.getElementById("login-tab");
const registerTab = document.getElementById("register-tab");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");

if (modalButton) {
  // Открытие модального окна
  modalButton.addEventListener("click", () => {
    modal.style.display = "flex";
  });

  // Закрытие модального окна
  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Переключение между формами
  loginTab.addEventListener("click", () => {
    loginTab.classList.add("active");
    registerTab.classList.remove("active");
    loginForm.classList.add("active");
    registerForm.classList.remove("active");
  });

  registerTab.addEventListener("click", () => {
    registerTab.classList.add("active");
    loginTab.classList.remove("active");
    registerForm.classList.add("active");
    loginForm.classList.remove("active");
  });

  // Закрытие модального окна при клике вне его
  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
}
