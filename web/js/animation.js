$(() => {
    const text = "Онлайн курсы твоей мечты!";
  const element = $(".main-text");
  let i = 0;

  function typeWriter() {
    if (i < text.length) {
      element.html(element.html() + text.charAt(i));
      i++;
      setTimeout(typeWriter, 200); // Скорость печати (мс)
    } else {
      setTimeout(() => {        
        element.html("")
        i = 0;
        typeWriter()    
      }, 1000);
    }
  }

    typeWriter();
});
