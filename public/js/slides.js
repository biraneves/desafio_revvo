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

const setCookie = (name, value, days) => {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = `${name}=${value};${expires};path=/`;
};

const getCookie = (name) => {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
};

document.addEventListener('DOMContentLoaded', () => {
    if (getCookie('firstTime') === null) {
        const modal = document.querySelector('.modal');
        
        modal.innerHTML = `
        <div class="modal__content">
        <button class="modal__content__close-button">&times;</button>
        <div class="modal__content__header">
        <img src="img/workspace.jpg" alt="Flat-lay illustration of a workspace">
        </div>
        <div class="modal__content__body">
        <h2 class="modal__content__body__title">Egestas Tortor Vulputate</h2>
        <p class="modal__content__body__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime cum necessitatibus harum accusantium sed repellendus, aperiam assumenda dignissimos!
        </p>
        <a href="#" class="modal__content__body__button">Inscreva-se</a>
        </div>
        </div>
        `;
        
        const closeModalButton = document.querySelector('.modal__content__close-button');
        closeModalButton.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.classList.remove('no-scroll');
            setCookie('firstTime', 'false', 30);
        });

        modal.style.display = 'flex';
        document.body.classList.add('no-scroll');
    }
});

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

slides[0].classList.add('current-slide');
updateButtons(slides, previousButton, nextButton, 0);