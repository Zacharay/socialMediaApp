class Slider {
    constructor(container) {
        this.currentSlide = 0;
        this.container = container;
        this.nextBtn = container.querySelector(".slider__next");
        this.prevBtn = container.querySelector(".slider__prev");
        this.slider = container.querySelector(".slider");
        

        if (!this.slider || !this.nextBtn || !this.prevBtn) return;
        this.slides = Array.from(this.slider.children);

        this.init();
    }

    init() {
        this.nextBtn.addEventListener("click", this.nextSlide.bind(this));
        this.prevBtn.addEventListener("click", this.prevSlide.bind(this));
    }

    nextSlide() {
      
        this.currentSlide++;
        console.log(this.currentSlide)
        if (this.currentSlide >= this.slides.length) this.currentSlide = 0;
        this.updateSlider();
    }

    prevSlide() {
        this.currentSlide--;
        if (this.currentSlide < 0) this.currentSlide = this.slides.length - 1;
        this.updateSlider();
    }

    updateSlider() {
        this.slides.forEach((slide, index) => {
            slide.style = `transform:translateX(${-this.currentSlide * 100}%);`;
        });
    }
}

const postContainers = document.querySelectorAll(".post__container");

postContainers.forEach((container) => {
    new Slider(container);
});