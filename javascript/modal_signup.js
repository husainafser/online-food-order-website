const modalBtn = document.querySelector(".modal-btn2");
const modal_signup = document.querySelector(".modal-overlay2");
const closeBtn = document.querySelector(".close-btn2");

modalBtn.addEventListener("click", function () {
    modal_signup.classList.add("open-modal");
  });
closeBtn.addEventListener("click", function () {
  modal_signup.classList.remove("open-modal");
});
