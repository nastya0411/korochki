$(() => {
  const showAlert = () => {
    setTimeout(() => {
      $(".alert-block").fadeIn(2500);
    }, 1500);

    setTimeout(() => {
      $(".alert-block").fadeOut(2000);
    }, 6000);
  };

  const text = "Привет, это эффект печатающегося текста на JavaScript!";
  const element = document.getElementById("typewriter");
  let i = 0;

  function typeWriter() {
    if (i < text.length) {
      element.innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, 100); // Скорость печати (мс)
    } else {
      setTimeout(() => (element.innerHTML = ""), 200);
    }
  }

  // Запускаем эффект

  if ($(".alert").length) {
    // typeWriter();
    showAlert();
  }
});
