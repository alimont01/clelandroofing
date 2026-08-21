<div class="container-fluid bg-light-grey mb-4 mb-lg-5">
  <div class="container py-3">
    <div class="row">
      <div class="col-12">

        <div class="project-types d-flex flex-wrap align-items-center gap-2">

          <span class="me-2">
            Filter by project type:
          </span>

          <a
            href="<?php echo esc_url( get_permalink( get_page_by_path( 'our-work' ) ) ); ?>"
            class="btn btn-sm <?php echo is_page( 'our-work' ) ? 'btn-dark' : 'btn-outline-dark'; ?>"
          >
            All
          </a>

          <?php
          $project_types = get_terms( array(
            'taxonomy'   => 'project_type',
            'hide_empty' => true,
          ) );

          if ( ! is_wp_error( $project_types ) ) :

            foreach ( $project_types as $project_type ) :

              $is_active = is_tax( 'project_type', $project_type->term_id );
              ?>

              <a
                href="<?php echo esc_url( get_term_link( $project_type ) ); ?>"
                class="btn btn-sm <?php echo $is_active ? 'btn-dark' : 'btn-outline-dark'; ?>"
              >
                <?php echo esc_html( $project_type->name ); ?>
              </a>

            <?php endforeach; ?>

          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>
</div>