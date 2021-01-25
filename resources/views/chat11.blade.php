<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .list-group {
            overflow-y: scroll ;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" id="app">

            <div class="col-md-5">
                <li class="list-group-item active">chat room <span class="badge badge-warning badge-pill">@{{ numberOfUsers }}</span></li>

                test
            </div>

            <div class="col-md-7">
            <li class="list-group-item active">chat room <span class="badge badge-warning badge-pill">@{{ numberOfUsers }}</span></li>

            <li v-for="user in username"> @{{user.name}}</li>
                <div class="badge badge-pill badge-primary"> @{{typing}}</div>
                <ul class="list-group" v-chat-scroll>
                    <messages
                    v-for="value,index in chat.message"
                    :key=value.index
                    :color= chat.color[index]
                    :user = chat.user[index]
                    :time = chat.time[index]
                    >
                    @{{value}}
                   </messages>
                </ul>
                <input type="text" class="form-control" placeholder="right your message" v-model='message'
                @keyup.enter='send'>
                {{-- or sending message by button  --}}
                {{-- <button @click="send">send </button> --}}
                <br>
                <a class="btn btn-info btn-sm" @click.prevent='deleteSession()'> delete</a>
            </div>

        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
