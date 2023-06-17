
        <div class="chat_navbar">
            <header class="chat_header d-flex justify-content-between align-items-center p-1">
                <div class="vs-con-items d-flex align-items-center">
                    <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                    <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                        <img src="{{asset('images/user/'. @$massages->user->image)}}" alt="{{@$massages->user->name}}" height="40" width="40">
                        <span class="avatar-status-busy"></span>
                    </div>
                    <h6 class="mb-0">{{@$massages->user->name}}</h6>
                </div>
                <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
            </header>
        </div>
        <div class="user-chats ps scroll" style="    overflow-y: auto !important; width: 90%;overflow-x: scroll !important;">
            <div class="chats">
                <div class="chat">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                            <img src="{{asset('images/user/'. @$massages->user->image)}}" alt="{{@$massages->user->name}}" height="40" width="40">
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>{{@$massages->message}}</p>
                        </div>
                    </div>
                </div>
                @foreach(@$massages->child as $itam)

                <div class="chat    @if($itam->email_reply ==! null)chat-left        @endif scroll">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="admin" height="40" width="40">
                        </a>
                    </div>
                    <div class="chat-body"
{{--                         style="    width: fit-content;"--}}
                    >
                        <div class="chat-content">
                            <p style="width: min-content;">{{$itam->message}}</p>

                        </div>

                    </div>
                </div>
                @endforeach

            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; left: -7px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        <div class="chat-app-form" style="width: 90%">
            <form class="chat-app-input d-flex"
            id="test">
                <input type="hidden" class="id" name="id" value="{{@$massages->id}}">
                <input type="hidden" class="email" name="email" value="{{@$massages->email}}">
                <input type="text" class="form-control valMassage message mr-1 ml-50" value="" name="massage" id="iconLeft4-1" placeholder="Type your message">
                <button type="button"  class="btn btn-primary send save-massage waves-effect waves-light" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
            </form>
        </div>

<script>
    $('#test').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
