<div class="container-fluid pb-4 pb-lg-5">

	<?php if( get_sub_field('gallery_title') ): ?>
		<div class="container mb-4">
			<div class="row">
				<div class="col-12 text-center">
					<h2 class="mt-0 text-blue"><?php the_sub_field('gallery_title'); ?></h2>
					<?php if( get_sub_field('gallery_intro_text') ): ?>
						<p><?php the_sub_field('gallery_title'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

    <div class="container">
        <div class="row">
            <?php 
            $images = get_sub_field('add_images_gallery');

            if ( $images ) :
                foreach ( $images as $image ) : ?>
                    
                    <div class="col-6 col-lg-3">
                        
                        <a
                            href="<?php echo esc_url( $image['url'] ); ?>"
                            class="gallery-modal-trigger"
                            data-bs-toggle="modal"
                            data-bs-target="#galleryModal"
                            data-image="<?php echo esc_url( $image['url'] ); ?>"
                            data-caption="<?php echo esc_attr( $image['caption'] ); ?>"
                        >
                            <img
                                class="gallery-thumbs"
                                src="<?php echo esc_url( $image['sizes']['news-post'] ); ?>"
                                alt="<?php echo esc_attr( $image['alt'] ); ?>"
                            />
                        </a>

                    </div>

                <?php endforeach;
            endif; ?>
        </div>
    </div>
</div>


<!-- Gallery Modal -->
<div
    class="modal fade"
    id="galleryModal"
    tabindex="-1"
    aria-labelledby="galleryModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content position-relative">

            <div class="modal-header border-0">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body pt-0 text-center position-relative">

                <img
                    id="galleryModalImage"
                    class="img-fluid"
                    src=""
                    alt=""
                >

				<p
                    id="galleryModalCaption"
                    class="mt-3 mb-0"
                ></p>

				<div class="w-100 d-flex justify-content-between text-blue">

				<!-- Previous -->
                <button
                    type="button"
                    class="gallery-modal-prev"
                    aria-label="Previous image"
                >
                    <i class="bi bi-arrow-left"></i>
                </button>

                <!-- Next -->
                <button
                    type="button"
                    class="gallery-modal-next"
                    aria-label="Next image"
                >
                    <i class="bi bi-arrow-right"></i>
                </button>

				</div>

            </div>

        </div>
    </div>
</div>