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
    <body >
    <?php
    


    use Illuminate\Support\Facades\Auth;
    $data='https://ed808.com:92/latin/intern?parameter[page]=0&parameter[sort]=last';
    $users = json_decode(file_get_contents($data),true);
    
    //$test=$user['contents'][0]['nid'];
    //$tests=(object)$user;
   // dd($user);
   $items = $users['contents'];
 
    ?>
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
                                        <a href="#">سامانه جامع عمران و معماری 808</a>
                                    </div>
                           
                         
                        </li>
                    </ul>
            
                </div>
            
            </nav>
     <div id="app">
     
        
        <div v-for="post in posts">
              
            <div  class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                   
                    <div class="uk-card-media-left uk-cover-container">
                           
                    <img src="" data-sizes="(min-width: 650px) 650px, 100vw" uk-img alt="" uk-cover>
                    <canvas width="600" height="400"></canvas>
                       
                    </div>
                 
                        <div class="uk-card-body">
                        <h3 class="uk-card-title">@{{post.title}}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <p uk-margin>
                                    @{{post.id}}
                            <button class="uk-button uk-button-primary">  <div class="item"  data-id="" @click="addbookmark(post)" >Bookmark me!</div></button>
                                    <button class="uk-button uk-button-default"> <div class="item1"  data-id="" @click="deletebookmark(post)" >UnBookmark me!</div></button>
                                
                                </p>
                        </div>
                    </div>
                </div>
     </div>
                    <ul class="uk-pagination uk-flex-center" uk-margin>
                            <li><a href="#"><span uk-pagination-previous></span></a></li>
                            <li><a href=".">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            
                            <li><a href="#"><span uk-pagination-next></span></a></li>
                        </ul>
                        
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
<script src="https://unpkg.com/vue"></script>

<script>
new Vue({
  el: '#app',
  data () {
    return {
      
      posts: [],
      post : { id : '', title : '' }

    }
  },

  mounted () {
    let obj = this;
    axios
      .get('https://jsonplaceholder.typicode.com/posts')
      .then((function (resp) {
          
                    obj.posts = resp.data;
                    
                }))
  },
  methods : {
        
        addbookmark : function (post) {
            if(post.id) {
                $.post('api/posts' , {
                    id :post.id,

                }).done(function (response) {
                alert(response);
                }.bind(this));
            }
        },
        deletebookmark: function (post) {
            if(confirm("Are You Sure You Want to Delete This Bookmark ?")) {
                $.post('api/post/' + post.id , {
                   
                }).done(function (response) {
                   alert(response);
                }.bind(this));
            }
        }
    }
})

        </script>
\

 

    </body>
</html>
