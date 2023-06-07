
@if(isset($mainBanner))
@if(isset($model->type_id) && $model->type_id != 2)
<section  class="{{getClassAttribute($model->type_id)}}" style="overflow-x: hidden;">
    <div class="home-slider-section" style="background-image: url('/website/assets/img/slider-backgound.png');">
        <div class="slider-blur"></div>
        <div class="home-slider">
            <div class="container  full-width-responsive-cont">
                <div class="slider_1">
                    @foreach($mainBanner as $Banner)
                    <a href="{{ $Banner->translate(app()->getlocale())->Redairect_link }}" target="_blank" class="slider-item">
                         <div class="slider-item-flex">
                            <div class="slider-img">
                                <img src="{{ image($Banner->thumb) }}" alt="avatar">
                            </div>
                            <div class="name_00_box">
                                <h1>{{ $Banner->translate(app()->getlocale())->title }}</h1>
                                <span>{{ $Banner->translate(app()->getlocale())->location }}</span>
                                
                                <div class="rank_stars">
                                    @php $rating = $Banner->additional['rank_stars']; @endphp  

                                    @foreach(range(1,5) as $i)
                                        <span class="fa-stack" style="width:1em">
                                            <i class="far fa-star fa-stack-1x"></i>
                        
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                <span> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.667" height="20" viewBox="0 0 21.667 20">
                                                        <path id="Polygon_11" data-name="Polygon 11" d="M9.916,2.119a1,1,0,0,1,1.835,0l1.877,4.334a1,1,0,0,0,.836.6l4.773.389A1,1,0,0,1,19.8,9.2l-3.582,3a1,1,0,0,0-.33,1l1.088,4.5a1,1,0,0,1-1.479,1.1L11.34,16.362a1,1,0,0,0-1.013,0L6.171,18.805a1,1,0,0,1-1.479-1.1l1.088-4.5a1,1,0,0,0-.33-1l-3.582-3a1,1,0,0,1,.561-1.763L7.2,7.052a1,1,0,0,0,.836-.6Z" fill="#e5bc62"/>
                                                    </svg> 
                                                </span>
                                                @else
                                                <span> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.667" height="20" viewBox="0 0 21.667 20">
                                                        <path id="Polygon_11" data-name="Polygon 11" d="M9.916,2.119a1,1,0,0,1,1.835,0l1.877,4.334a1,1,0,0,0,.836.6l4.773.389A1,1,0,0,1,19.8,9.2l-3.582,3a1,1,0,0,0-.33,1l1.088,4.5a1,1,0,0,1-1.479,1.1L11.34,16.362a1,1,0,0,0-1.013,0L6.171,18.805a1,1,0,0,1-1.479-1.1l1.088-4.5a1,1,0,0,0-.33-1l-3.582-3a1,1,0,0,1,.561-1.763L7.2,7.052a1,1,0,0,0,.836-.6Z" fill="##808080"/>
                                                    </svg> 

                                                    </span>
                                                @endif
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                    @endforeach
                                  
                                </div>
                            </div>
                            <div class="text">
                               {!! $Banner->translate(app()->getlocale())->desc !!}
                            </div>
                            <div class="see-all">
                                <span> {{__('website.See_All')}}</span>
                            </div>
                         </div>
                    </a>
                    @endforeach 
                </div>
            </div>
        </div>
        <div class="left-arrow">
            <span> 
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="23.83" viewBox="0 0 14 23.83">
                    <g id="right-arrow_1_" data-name="right-arrow (1)" transform="translate(115.478 23.83) rotate(-180)">
                      <g id="Group_213" data-name="Group 213" transform="translate(101.478)">
                        <path id="Path_140" data-name="Path 140" d="M115.1,10.985l-10.6-10.6a1.306,1.306,0,0,0-1.844,0l-.781.781a1.305,1.305,0,0,0,0,1.844l8.905,8.905-8.915,8.915a1.307,1.307,0,0,0,0,1.844l.781.781a1.306,1.306,0,0,0,1.844,0L115.1,12.835a1.316,1.316,0,0,0,0-1.85Z" transform="translate(-101.478 0)" fill="#e5bc62"/>
                      </g>
                    </g>
                </svg> 
            </span>
        </div>
        <div class="right-arrow">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="23.83" viewBox="0 0 14 23.83">
                    <g id="right-arrow_1_" data-name="right-arrow (1)" transform="translate(115.478 23.83) rotate(-180)">
                      <g id="Group_213" data-name="Group 213" transform="translate(101.478)">
                        <path id="Path_140" data-name="Path 140" d="M115.1,10.985l-10.6-10.6a1.306,1.306,0,0,0-1.844,0l-.781.781a1.305,1.305,0,0,0,0,1.844l8.905,8.905-8.915,8.915a1.307,1.307,0,0,0,0,1.844l.781.781a1.306,1.306,0,0,0,1.844,0L115.1,12.835a1.316,1.316,0,0,0,0-1.85Z" transform="translate(-101.478 0)" fill="#e5bc62"/>
                      </g>
                    </g>
                </svg> 
            </span>
        </div>
    </div>
</section>
@else
@endif
@endif