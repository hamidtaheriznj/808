<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>تزبار</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        .form-control { margin-bottom: 10px; }
        .navbar       { border-radius:0; }
    </style>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <a class="navbar-brand"><i class="glyphicon glyphicon-bullhorn"></i> Vue Events Board</a>
    </div>
</nav>

<div class="container" id="events">

    <div class="jumbotron">
        <h2>Events Website</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cumque earum libero maxime minima necessitatibus nesciunt officiis quae repellendus! Adipisci aspernatur consectetur excepturi fugit ipsum laborum nihil provident recusandae, tempora?</p>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add an Event</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <input type="text" class="form-control" placeholder="Event Name" v-model="event.name">
                        <textarea class="form-control" placeholder="Event Description" v-model="event.description"></textarea>
                        <input type="date" class="form-control" v-model="event.date">
                        <button class="btn btn-primary" @click="addEvent">submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="list-group">
                <a href="#" class="list-group-item" v-for="event in events">
                    <h4 class="list-group-item-heading"><i class="glyphicon glyphicon-bullhorn"></i>@{{ event.name }}</h4>
                    <h5 v-if="event.date"><i class="glyphicon glyphicon-calendar"></i>@{{ event.date}}</h5>
                    <p class="list-group-item-text" v-if="event.description">@{{ event.description }}</p>
                    <button class="btn btn-xs btn-danger" @click="deleteEvent(event)">delete</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
<script src="/js/app.js"></script>
</body>
</html>