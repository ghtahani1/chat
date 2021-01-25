<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat2.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">

    <div class="row" id="app">

        {{-- right section --}}
    <div class="col-md-3">

        <div class="panel"  style="height: 100%;background: #f8f9fa;display:flex;">
        	<!--Heading list -->
    		<div class="panel-heading" >
    			<div class="panel-control w-100 d-flex">
    				<div class="btn-group">
                        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
    					<button type="button" class="btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i></button>
    					<ul class="dropdown-menu dropdown-menu-right">
                            <li><a  class="dropdown-item" href="#" @click.prevent='deleteSession()'>مسح الدردشة</a></li>
                            <li class="divider"></li>

                            <li >
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
    						{{-- <li><a id="demo-connect-chat" href="#" class="disabled-link" data-target="#demo-chat-body">Connect</a></li>
    						<li><a id="demo-disconnect-chat" href="#" data-target="#demo-chat-body">Disconect</a></li> --}}
                        </ul>
                    </div>
                    <small style="color:#adb5bd; top: 21px;right: 26%;  position: absolute;">المتصلين الآن :  @{{ numberOfUsers }}   </small>

                </div>
                <div v-chat-scroll class="user-bar" id="demo-chat-body">
                <ul    class="list-unstyled w-100 pl-4" style="margin-top: 6rem;">
                    <li>
                        <div class="has-search" style="
                        position: relative;
                        top: 7px;
                        height: 38px;
                        ">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control">
                          </div>
                    </li>
                    <li  class="user-list" v-for="user in username">
                    {{-- <img :src=" 'img/'+ user.img  " /> --}}
                    <img src="img/user1.png" class=" img-sm ml-2"  alt="Profile Picture">
                        @{{user.name}}
                    </li>
               </ul>
            </div>


                        </div>
       </div>
    </div>
    {{-- end right section  --}}

    {{-- left section --}}
    <div class="col-md-9 col-lg-9">
        <div class="panel">
        	<!--Heading-->
                <div class="media p-3">
                    <img class="align-self-center img-sm  mr-3" src="img/users.png" class="img-sm ml-2">
                    <div class="media-body mt-2 mr-2">
                      <h5 class="mb-0">الدردشة </h5>
                        {{-- <small style="color:#adb5bd; top: 38px; position: absolute; ">المتصلين الآن :  @{{ numberOfUsers }}   </small> --}}
                        <div class="badge badge-pill badge-primary p-1" style="background:rgb(102, 93, 254);"> @{{typing}}</div>
                    </div>
                  </div>
            </div>

    		<!--Widget body-->
    		{{-- <div id="demo-chat-body" class="collapse in> --}}
                <div class="chat-body">
    					<ul class="list-unstyled media-block" v-chat-scroll>
                            <messages
                            v-for="value,index in chat.message"
                            :key=value.index
                            :color= chat.color[index]
                            :float = chat.float[index]
                            :user = chat.user[index]
                            :time = chat.time[index]
                            >
                            @{{value}}
                           </messages>
                        </ul>
                    <br>

                </div>

                <div class="pannel-footer" style="height:20vh">
                    <div style="
                height: 100%;
                padding: 2.75rem 2.25rem;
                border-top:solid 1px #eeecec ; ">
<div class="form-row">
    <div class="col">
                    <input type="text" class="form-control" placeholder="اكتب رسالتك ... " v-model='message'
                    @keyup.enter='send'>
    </div>
    <div class="col-auto">
        <button style="background: #665dfe; color:white;
        border: none;
        border-radius: 50%;
        padding: 8px 14px;" @click="send" ><i class="fa fa-arrow-left"></i></button>
    </div>
</div>
                    </div>
                </div>


    	</div>
    </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
