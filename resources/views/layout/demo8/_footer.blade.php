<!--begin::Footer-->
<div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
	<!--begin::Container-->
	<div class="{{ theme()->printHtmlClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-muted fw-bold me-1">{{ date("Y") }}&copy;</span>
			<a href="{{ theme()->getOption('general', 'website') }}" rel="noreferrer" target="_blank" class="text-gray-800 text-hover-primary">
                Artisan TMS</a>
		</div>
		<!--end::Copyright-->

		<!--begin::Menu-->
		<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
			<li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Support</a></li>

			<li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Privacy Policy</a></li>

			<li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Terms & Conditions</a></li>
		</ul>
		<!--end::Menu-->
	</div>
	<!--end::Container-->
</div>
<!--end::Footer-->
