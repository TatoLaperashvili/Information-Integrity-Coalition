<div class="sidebar sidebar-right d-flex flex-row-auto flex-column" id="kt_sidebar">
	<!--begin::Aside Secondary Header-->
	<div class="sidebar-header flex-column-auto pt-9 pb-5 px-5 px-lg-10">
		<!--begin::Toolbar-->
		<div class="d-flex">
			<!--begin::Desktop Search-->
			<div class="quick-search quick-search-inline flex-grow-1" id="">
				<!--begin::Form-->
				<form class="quick-search-form" action="/{{app()->getLocale()}}/search" method="POST">
				@csrf
					<div class="input-group rounded" style="background-color: #ffffff;">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<span class="svg-icon svg-icon-lg svg-icon-primary">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#606062" fill-rule="nonzero"/>
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#606062" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
						</div>
						<input type="text" class="form-control form-control-primary h-45px search-txt search-input" placeholder="ძებნა..." name="text" />

					</div>
				</form>
				<!--end::Form-->
				<!--begin::Search Toggle-->
				<div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
				<!--end::Search Toggle-->
				<!--begin::Dropdown-->
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-anim-up">
					<div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
				</div>
				<!--end::Dropdown-->
			</div>
			<!--end::Desktop Search-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Aside Secondary Header-->
	<!--begin::Aside Secondary Content-->
	<div class="sidebar-content flex-column-fluid pb-10 pt-1 px-5 px-lg-10">
		<!--begin::List Widget 1-->
		@if(isset($birthdayBanner) && (count($birthdayBanner) > 0))
		<div class="card card-custom card-shadowless gutter-b" style="background-color: #FFCB08;">
				<!--begin::Header-->
				<div class="card-header border-0">
					<div class="card-header  pb-4" style="padding-left: 0px!important;background-color: #FFCB08;">
						<div class="card-title">
							<span class="card-icon">
								<span class="icon-cake yellow-icon-cake"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
							</span>
							<h3 class="fs-18 medium gray sidebar-title">იუბილარები</h3>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Item-->
					@foreach($birthdayBanner as $key => $employe)
					<div class="d-flex align-items-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50 symbol-light mr-4">
							<span class="symbol-label br-2">
								<span class="svg-icon svg-icon-xl svg-icon-primary">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
									
									@if (isset(auth()->user()->photo))
										<img src="../uploads/profile/{{auth()->user()->photo}}" alt="" class="b-day-photo">
									@else
										<span class="icon-user fs-24 t-2"><span class="path1"></span><span class="path2"></span></span>
									@endif
									<!--end::Svg Icon-->
								</span>
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Text-->
						<div class="d-flex flex-column font-weight-bold">
							<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg  gray up medium" style="font-feature-settings: 'case' on !important;">{{$employe->title}}</a>
							<span class="gray top-5">{{$employe->position}}</span>
						</div>
						<!--end::Text-->
					</div>
					@endforeach
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
		@endif
		<!--end::List Widget 1-->
		<!--begin::Timeline-->
		@foreach($mainBanner as $key => $banner)
		<a href="{{$banner->translate(app()->getLocale())->slug}}" target="_blank">
		<div class="d-flex flex-column flex-center shadow-hover" @if($key> 0) style="margin-top: 30px;" @endif >
			<!--begin::Image-->
				<div class="bgi-no-repeat bgi-size-cover min-h-142px w-100" style="background-image: url({{ image($banner->thumb) }});"></div>
		
			<!--end::Image-->
		</div>
		</a>
		@endforeach
		<!--end::Timeline-->
	</div>
	<!--end::Aside Secondary Content-->

</div>