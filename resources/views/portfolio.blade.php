@extends('layouts.front')


@section('title') {{$portfoliosettings->meta_title}} @endsection
@section('meta') {{$portfoliosettings->meta_description}} @endsection


@section('content')
  
    
    <div class="banner-section" data-background-image-url="{{$portfoliosettings->banner_img ? $portfoliosettings->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$portfoliosettings->banner_title!!}</h1>
            <p class="banner-desc">{!!$portfoliosettings->banner_desc!!}</p>
            <div class="service-details-link">
               <a href="{{$portfoliosettings->banner_btn_link}}" target="_self" class="btn btn-slider"><span>{{$portfoliosettings->banner_btn_text}}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
            </div>
        </div>
         
       
   </div>



   <div class="portfolio-section-filters">
      <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="filters">
                    <div class="filter active" data-filter="all"><span>{{clean( trans('niva-backend.all') , array('Attr.EnableID' => true))}}</span></div>
                    @foreach($project_categories as $category)
                      <div class="filter" data-filter="{{$category->name}}"><span>{{$category->name}}</span></div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12">
                  <div class="projects projects-page row">

                      @foreach($projects as $project)
                      <div class="project col-md-4" data-filter="{{$project->project_category->name}}">
                        <div class="project-inner">
                            <div class="project-thumbnail">
                              <a href="{{URL::to('/')}}/project/{{$project->slug}}" title=""><img width="400" height="250" src="{{$project->photo ? '/public/images/media/' . $project->photo->file : '/public/img/200x200.png'}}"  class="img-fluid" alt="{{$project->title}}"></a>
                              </div>
                              <h4 class="entry-details-title"> <a href="{{URL::to('/')}}/project/{{$project->slug}}">{{$project->title}}</a></h4>
                              <h5 class="project-category">{{$project->project_category->name}}</h5>
                        </div>
                      </div>
                      @endforeach

                  </div>
            </div>

        </div>
      </div>
   </div>

 

@endsection





