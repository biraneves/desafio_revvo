<?php require_once __DIR__ . '/html-start.php'; ?>
    <section class="courses">
        <div class="container">
            <h2 class="courses-title"><?= $id !== false && $id !== null ? 'Editar Curso' : 'Adicionar curso'; ?></h2>
            <form 
                action="<?= $id !== false && $id !== null ? '/edit-course' : '/new-course'; ?>"
                method="POST"
                class="courses__form">
                <div class="courses__form__field">
                    <label for="title">Título:</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        class="courses__form__field__input"
                        value="<?= $course?->title; ?>"
                        required>
                </div>
                <div class="courses__form__field">
                    <label for="description">Descrição:</label>
                    <input 
                        type="text" 
                        name="description" 
                        id="description"
                        class="courses__form__field__input"
                        value="<?= $course?->description; ?>"
                        required>
                </div>
                <div class="courses__form__field">
                    <label for="image">URL da imagem:</label>
                    <input 
                        type="url"
                        name="image" 
                        id="image"
                        class="courses__form__field__input"
                        value="<?= $course?->image; ?>"
                        required>
                </div>
                <div class="courses__form__field">
                    <label for="link_slideshow">URL do slideshow:</label>
                    <input 
                        type="url"
                        name="link_slideshow" 
                        id="link_slideshow"
                        class="courses__form__field__input"
                        value="<?= $course?->link_slideshow; ?>"
                        required>
                </div>
                <input type="submit" value="Enviar" class="courses__form__button">
            </form>
        </div>
    </section>
<?php require_once __DIR__ . '/html-end.php'; ?>