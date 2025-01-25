const slidesTrack = document.querySelector('.banner__slides');
const slides = Array.from(slidesTrack.children);
const previousButton = document.querySelector('.banner__buttons--prev');
const nextButton = document.querySelector('.banner__buttons--next');

const slideWidth = slides[0].getBoundingClientRect().width;

slides.forEach((slide, index) => slide.style.left = `${index * slideWidth}px`);

const updateButtons = (slides, previousButton, nextButton, targetIndex) => {
    previousButton.disabled = targetIndex === 0;
    nextButton.disabled = targetIndex === slides.length - 1;
};

const moveToSlide = (slidesTrack, currentSlide, targetSlide) => {
    slidesTrack.style.transform = `translateX(-${targetSlide.style.left})`;
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
};

nextButton.addEventListener('click', () => {
    const currentSlide = slidesTrack.querySelector('.current-slide');
    const currentIndex = slides.indexOf(currentSlide);
    const nextSlide = slides[currentIndex + 1];

    moveToSlide(slidesTrack, currentSlide, nextSlide);
    updateButtons(slides, previousButton, nextButton, currentIndex + 1);
});

previousButton.addEventListener('click', () => {
    const currentSlide = slidesTrack.querySelector('.current-slide');
    const currentIndex = slides.indexOf(currentSlide);
    const previousSlide = slides[currentIndex - 1];

    moveToSlide(slidesTrack, currentSlide, previousSlide);
    updateButtons(slides, previousButton, nextButton, currentIndex - 1);
});

let autoSlideInterval = setInterval(() => {
    const currentSlide = slidesTrack.querySelector('.current-slide');
    const currentIndex = slides.indexOf(currentSlide);
    const nextIndex = (currentIndex + 1) % slides.length;
    const nextSlide = slides[nextIndex];

    moveToSlide(slidesTrack, currentSlide, nextSlide);
    updateButtons(nextIndex);
}, 3000);

[previousButton, nextButton].forEach((button) => {
    button.addEventListener('click', () => {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => {
            const currentSlide = slidesTrack.querySelector('.current-slide');
            const currentIndex = slides.indexOf(currentSlide);
            const nextIndex = (currentIndex + 1) % slides.length;
            const nextSlide = slides[nextIndex];

            moveToSlide(slidesTrack, currentSlide, nextSlide);
            updateButtons(nextIndex);
        }, 3000);
    });
});

// Initial state
slides[0].classList.add('current-slide');
updateButtons(slides, previousButton, nextButton, 0);