@extends('layouts.front')

@section('title') {{$contactsetting->meta_title}} @endsection
@section('meta') {{$contactsetting->meta_description}} @endsection


@section('content')
  
  

   <div class="banner-section" data-background-image-url="{{$contactsetting->banner_img ? $contactsetting->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$contactsetting->banner_title!!}</h1>
            <p class="banner-desc">{!!$contactsetting->banner_desc!!}</p>

            @if($contactsetting->banner_btn_text)
                <div class="service-details-link">
                    <a href="{{$contactsetting->banner_btn_link}}" target="_self" class="btn btn-slider"><span>{{$contactsetting->banner_btn_text}}</span>  <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
                </div>
            @endif
        </div>
        
       
   </div>


  <div class="iframe-contact">
    <div class="container">
      <div class="row">
         
         <div class="col-md-6">
          
            <div class="row">
              <div class="col-md-6">
                  <div class="contact-element-wrapper">
                    <div class="contact-element">
                      <div class="content">
                        <h3 class="title">{!!$contactsetting->box_title3!!}</h3>
                        {!!$contactsetting->box_html3!!}
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col-md-6">
                    <div class="contact-element-wrapper">
                      <div class="contact-element">
                        <div class="content">
                          <h3 class="title">{!!$contactsetting->box_title2!!}</h3>
                          {!!$contactsetting->box_html2!!}
                        </div>
                      </div>
                    </div>
               </div>
            </div>
            
            <div class="contact-element-wrapper phone-numbers">
                <div class="contact-element">
                  <div class="content">
                    <h3 class="title">{!!$contactsetting->box_title1!!}</h3>
                    {!!$contactsetting->box_html1!!}
                  </div>
                </div>
            </div>

            <div class="description-contact">
                <h4>{!!$contactsetting->box_icon1!!}</h4>
            </div>
        

         </div>
         

        <div class="col-md-6">

              <h3>{!!$contactsetting->form_title!!}</h3>

              @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                      <strong>{{ $message }}</strong>
                  </div>
              @endif

              {!! NoCaptcha::renderJs() !!}

              

              <form method="POST" action="{{route('contactPost')}}">
                 
                 @csrf
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder=" {!!$contactsetting->form_input_name!!} ">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                              placeholder="{!!$contactsetting->form_input_email!!}">
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input name="phone" type="text" class="form-control" id="phone" aria-describedby="name" placeholder="{!!$contactsetting->form_input_budget!!}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                          <input name="budget" type="text" class="form-control" id="budget" aria-describedby="emailHelp"
                              placeholder="{!!$contactsetting->form_input_phone!!}">
                          <span class="text-danger">{{ $errors->first('budget') }}</span>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <textarea name="comment" placeholder="{!!$contactsetting->form_message!!}" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                </div>



             
                {!! NoCaptcha::display() !!}

                @if ($errors->has('g-recaptcha-response'))
                  <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif


                <button type="submit" class="btn btn-style1">{!!$contactsetting->button_text!!}</button>
            </form>
        
        </div>


      </div>
    </div>

    <div class="contact-map">
        {!!$contactsetting->iframe_txt!!}
    </div>

  </div>

 




@endsection

