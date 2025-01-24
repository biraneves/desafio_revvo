<?php require_once __DIR__ . '/html-start.php'; ?>
<?php require_once __DIR__ . '/html-banner.php'; ?>
<section class="courses">
            <div class="container">
                <h2 class="courses-title">Meus cursos</h2>
                <div class="courses__grid">
                    <?php foreach($courseList as $course): ?>
                    <article class="courses__grid__course">
                        <div class="courses__grid__course__img-container">
                            <img src="<?= $course->image; ?>" alt="Course image" class="courses__grid__course__img-container__image">
                            <?php if ($course->isNew()): ?>
                            <div class="ribbon">Novo</div>
                            <?php endif; ?>
                        </div>
                        <div class="courses__grid__course__content-container">
                            <h3 class="courses__grid__course__content-container__title"><?= $course->title; ?></h3>
                            <p class="courses__grid__course__content-container__description">
                                <?= $course->description; ?>
                            </p>
                            <a 
                                class="courses__grid__course__content-container__button" 
                                href="<?= $course->linkSlideshow; ?>"
                                target="_blank">Ver curso</a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <a href="/new-course" class="card_link">
                        <div class="courses__grid__course-add">
                            <img src="img/add-course.svg" alt="Add course" class="courses__grid__course-add__icon">
                            <p class="courses__grid__course-add__caption">
                                Adicionar<br>
                                <span class="courses__grid__course-add__caption-highlight">curso</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
<?php require_once __DIR__ . '/html-end.php'; ?>