<div class="container-fluid my-3 my-lg-5 bg-blue position-relative remove-p-margin">
	<div class="container text-white">
		<div class="row justify-content-center py-5">
			<div class="col-12 col-lg-7 text-center">
				<h2 class="mt-0 mb-3">
					Trusted by Customers Across Scotland
				</h2>
				<p>Read customer reviews, view Cleland Roofing Solutions’ trusted trader profiles, or leave your own feedback.</p>
			</div>
		</div>
	</div>

	<div class="container pb-4">
		<div class="before-after" style="--position: 50%;">

			<!-- Before image -->
			<img
				src="<?php echo get_template_directory_uri(); ?>/assets/img/roof-before.jpg" alt="Cleland Roofing Solutions">"
				alt="Roof before restoration"
				class="before-after__image before-after"
			>

			<!-- After image -->
			<div class="before-after__after">
				<img
					src="<?php echo get_template_directory_uri(); ?>/assets/img/roof-after.jpg" alt="Cleland Roofing Solutions">"
					alt="Roof after restoration"
					class="before-after__image before-after"
				>
			</div>

			<!-- Labels -->
			<span class="before-after__label before-after__label--before">
				Before
			</span>

			<span class="before-after__label before-after__label--after">
				After
			</span>

			<!-- Divider -->
			<div class="before-after__divider"></div>

			<!-- Handle -->
			<div class="before-after__handle">
				<span class="before-after__arrow before-after__arrow--left"></span>
				<span class="before-after__arrow before-after__arrow--right"></span>
			</div>

			<!-- Slider control -->
			<input
				type="range"
				min="0"
				max="100"
				value="50"
				class="before-after__range"
				aria-label="Compare before and after images"
			>

		</div>
	</div>

	<div class="container pb-5">
		<div class="row">
			<div class="col-12 text-center">
				<a class="btn-white mt-2 d-inline-block" href="/our-work/" target="_blank">View our work</a>
			</div>
		</div>
	</div>
</div>


<script>
	document.querySelectorAll('.before-after').forEach(function (comparison) {

	const range = comparison.querySelector('.before-after__range');

	range.addEventListener('input', function () {
		comparison.style.setProperty('--position', range.value + '%');
	});

});
</script>