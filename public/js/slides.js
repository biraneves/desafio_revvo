// Elements selection
const slidesTrack = document.querySelector('.banner__slides');
const slides = Array.from(slidesTrack.children);
const previousButton = document.querySelector('.banner__buttons--prev');
const nextButton = document.querySelector('.banner__buttons--next');

// Get the width of the slides
const slideWidth = slides[0].getBoundingClientRect().width;

// Arrange the slides next to each other
slides.forEach((slide, index) => slide.style.left = `${index * slideWidth}px`);

// Update buttons
const updateButtons = (slides, previousButton, nextButton, targetIndex) => {
    previousButton.disabled = targetIndex === 0;
    nextButton.disabled = targetIndex === slides.length - 1;
};

// Moving the slide
const moveToSlide = (slidesTrack, currentSlide, targetSlide) => {
    slidesTrack.style.transform = `translateX(-${targetSlide.style.left})`;
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
};

