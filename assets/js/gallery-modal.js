document.addEventListener('DOMContentLoaded', function () {

    const galleryModal = document.getElementById('galleryModal');
    const galleryTriggers = Array.from(
        document.querySelectorAll('.gallery-modal-trigger')
    );

    const modalImage = galleryModal.querySelector('#galleryModalImage');
    const modalCaption = galleryModal.querySelector('#galleryModalCaption');
    const prevButton = galleryModal.querySelector('.gallery-modal-prev');
    const nextButton = galleryModal.querySelector('.gallery-modal-next');

    let currentIndex = 0;

    function showImage(index, animate = true) {

        // Loop around
        if (index < 0) {
            index = galleryTriggers.length - 1;
        }

        if (index >= galleryTriggers.length) {
            index = 0;
        }

        currentIndex = index;

        const trigger = galleryTriggers[currentIndex];

        const image = trigger.getAttribute('data-image');
        const caption = trigger.getAttribute('data-caption');

        function updateImage() {

            modalImage.src = image;
            modalCaption.textContent = caption || '';

            if (caption) {
                modalCaption.classList.remove('d-none');
            } else {
                modalCaption.classList.add('d-none');
            }

            if (animate) {
                modalImage.onload = function () {
                    modalImage.classList.remove('is-changing');
                };
            }
        }

        if (animate) {

            modalImage.classList.add('is-changing');

            setTimeout(function () {
                updateImage();
            }, 200);

        } else {

            updateImage();
            modalImage.classList.remove('is-changing');

        }
    }


    // When modal opens
    galleryModal.addEventListener('show.bs.modal', function (event) {

        const trigger = event.relatedTarget;

        currentIndex = galleryTriggers.indexOf(trigger);

        showImage(currentIndex, false);

    });


    // Previous
    prevButton.addEventListener('click', function () {
        showImage(currentIndex - 1);
    });


    // Next
    nextButton.addEventListener('click', function () {
        showImage(currentIndex + 1);
    });


    // Keyboard controls
    document.addEventListener('keydown', function (event) {

        if (!galleryModal.classList.contains('show')) {
            return;
        }

        if (event.key === 'ArrowLeft') {
            showImage(currentIndex - 1);
        }

        if (event.key === 'ArrowRight') {
            showImage(currentIndex + 1);
        }

    });

});