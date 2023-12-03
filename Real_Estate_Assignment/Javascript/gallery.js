let currentSlideIndex = 1;

function showSlide(index) {
    const slides = document.querySelector('.carousel-slides');
    const indicators = document.querySelectorAll('.indicator');

    if (index > slides.childElementCount) {
        currentSlideIndex = 1;
    } else if (index < 1) {
        currentSlideIndex = slides.childElementCount;
    } else {
        currentSlideIndex = index;
    }

    const translateValue = -100 * (currentSlideIndex - 1) + '%';
    slides.style.transform = `translateX(${translateValue})`;

    indicators.forEach((indicator, i) => {
        indicator.classList.toggle('active', i + 1 === currentSlideIndex);
    });
}

function currentSlide(index) {
    showSlide(index);
}

function nextSlide() {
    showSlide(currentSlideIndex + 1);
}

function prevSlide() {
    showSlide(currentSlideIndex - 1);
}

// Auto slide change (optional)
setInterval(nextSlide, 5000); // Change slide every 5 seconds