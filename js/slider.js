function initializeSlider(container) {
  
    let currentSlide = 0;
    const nextBtn = container.querySelector(".slider__next");
    const prevBtn = container.querySelector(".slider__prev");
    const slider = container.querySelector(".slider");
    if(!slider||!nextBtn||!prevBtn)return;
    const slides = Array.from(slider.children);




    const nextSlide = function () {
        currentSlide++;
        if (currentSlide >= slides.length) currentSlide = 0;
        updateSlider();
    };
  
    const prevSlide = function () {
        currentSlide--;
        if (currentSlide < 0) currentSlide = slides.length - 1;
        updateSlider();
    };
  
    function updateSlider() {
        
      slides.forEach((slide, index) => {
        slide.style= `transform:translateX(${-currentSlide * 100}%);`;
      });
    }
  
    nextBtn.addEventListener("click", nextSlide);
    prevBtn.addEventListener("click", prevSlide);
}

const postContainers = document.querySelectorAll(".post__container");

postContainers.forEach(initializeSlider);