
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">


        <!-- Styles -->
   
    </head>
    <body>
            <div id="app">
              <div class="panel panel-default">
                <div class="panel-heading">posts</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>userid</th>
                            <th>id</th>
                            <th>title</th>
                            <th>id</th>
                            <th width="100">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="post  in posts">
                            <td>@{{ post.userid }}</td>
                            <td>@{{ post.id }}</td>
                            <td>@{{ post.title }}</td>
                            <td>@{{ post.id }}</td>
                            <td>
                                
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                  </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>
<script src="https://unpkg.com/vue"></script>

  
<script>
new Vue({
  el: '#app',
  data () {
    return {
      posts: []
    }
  },

  mounted () {
    let obj = this;
    axios
      .get('https://jsonplaceholder.typicode.com/posts')
      .then((function (resp) {
          
                    obj.posts = resp.data;
                    console.log( obj.posts);
                }))
  }
})

        </script>
    </body>
</html>
