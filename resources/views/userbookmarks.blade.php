<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />


        <!-- Styles -->
   
    </head>
    <body>
  
    <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
        
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#">ورود به سیستم </a>
                        <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                            <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                                <div>
                                       
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                            @if (!Auth::check())
                                            <li class="uk-active"><a href="/login">Login</a></li>
                                            <li class="uk-active"><a href="/register">Register</a></li>
                                      
                                          @else
                                          <li class="uk-active"><a href="/logout">logout</a></li>
                                    <li class="uk-active"><a href="addedbookmarks/{{Auth::id()}}">added bookmarks</a></li>
                                          @endif
                                           
                                      
                                      
                                    </ul>
                                </div>
                                <div>
                                     
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                           
                                     
                                   
                                    </ul>
                                   
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
        
            </div>
        
        </nav>
        <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-right">
            
                    <ul class="uk-navbar-nav">
                           
                            
                               
                     
                        <li>
                                <div class="uk-flex uk-flex-center">
                                        <h2>سامانه جامع عمران و معماری 808</h2>
                                    </div>
                           
                         
                        </li>
                    </ul>
            
                </div>
            
            </nav>
     <div class="container">
        <div class="flex-center position-ref full-height">
            
            </div>
           
                <ul class="uk-thumbnav" uk-margin>
                    @if($bookmarks)
                    @foreach ( $bookmarks as $item )
                  
                <div  class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                   
                            <div class="uk-card-media-left uk-cover-container">
                                   
                            <img src="{{$item['picture']}}" data-sizes="(min-width: 650px) 650px, 100vw" uk-img alt="" uk-cover>
                                <canvas width="600" height="400"></canvas>
                               
                            </div>
                         
                                <div class="uk-card-body">
                                <h3 class="uk-card-title">{{$item['title']}}</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                    <p uk-margin>
                                    <button class="uk-button uk-button-primary">  <div class="item"  data-id="{{$item['nid']}}" >Bookmark me!</div></button>
                                            <button class="uk-button uk-button-default"> <div class="item1"  data-id="{{$item['nid']}}" >UnBookmark me!</div></button>
                                        
                                        </p>
                                   
                                     
                                  
                                   
                                </div>
                            </div>
                        </div>
                        
                     
                    @endforeach    
                    @endif                  
                        
                    </ul>
               
                        
            </div>
        </div>
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.item').click(function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
              type: "POST",
              url: "setbookmark",
              data: { id: id , _token: '{{csrf_token()}}'}
            }).done(function( msg ) {
              alert( "Data Saved: " + msg );
            });
        });
        $('.item1').click(function(){
                    let id = $(this).data('id');
                
                    $.ajax({
                        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                      type: "POST",
                      url: "unsetbookmark",
                      data: { id: id , _token: '{{csrf_token()}}'}
                    }).done(function( msg ) {
                      alert( "Data Saved: " + msg );
                    });
                });

    });
    </script>

    </body>
</html>
