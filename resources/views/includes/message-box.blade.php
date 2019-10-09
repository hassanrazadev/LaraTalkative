<div class="card chat-room small-chat">
    <div class="card-header bg-white d-flex justify-content-between p-2" data-mode="show" id="toggleMessageBox" style="cursor: pointer;">
        <div class="heading d-flex justify-content-start">
            <div class="profile-photo">
                <img src="{{asset('assets/img/user-default.png')}}" alt="avatar"
                     class="avatar rounded-circle mr-2 ml-0">
                <span class="state"></span>
            </div>
            <div class="data">
                <p class="name mb-0"><strong>{{$toUser->name}}</strong></p>
                <p class="activity text-muted mb-0">Active now</p>
            </div>
        </div>
        <div class="icons grey-text">
            <a id="closeButton" class="message-box-close"><i class="fa fa-close mr-2"></i></a>
        </div>
    </div>
    <div class="my-custom-scrollbar message-history" id="message">
        <div class="card-body message-history p-3">
            <div class="chat-message">
                @if(count($messages) != 0)
                    @foreach($messages as $message)
                        @if($message->from_user == auth()->user()->id)
                            {{-- to message --}}
                            <div class="d-flex justify-content-start">
                                <div class="profile-photo message-photo">
                                    <img src="{{asset('assets/img/user-default.png')}}" alt="avatar"
                                         class="avatar rounded-circle mr-2 ml-0">
                                    <span class="state"></span>
                                </div>
                                <div class="card bg-light rounded w-100 mb-2">
                                    <div class="card-body p-2">
                                        <p class="card-text black-text message-text">{{$message->message}}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- from message --}}
                            <div class="d-flex justify-content-start">
                            <div class="card bg-primary rounded w-100 mb-2">
                                <div class="card-body p-2">
                                    <p class="card-text text-white message-text">{{$message->message}}</p>
                                </div>
                            </div>
                            <div class="profile-photo message-photo">
                                <img src="{{asset('assets/img/user-default.png')}}" alt="avatar"
                                     class="avatar rounded-circle ml-2 mr-0">
                                <span class="state"></span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <span class="text-muted d-block text-center">Send your first message to {{$toUser->name}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer text-muted bg-white pt-1 pb-2 px-3">
        <form action="{{route('sendMessage')}}" method="post" id="sendMessage">
            @csrf
            <input type="hidden" name="to_user" value="{{$toUser->id}}">
            <input type="hidden" name="from_user" value="{{auth()->user()->id}}">
            <input type="text"  name="message" class="form-control" placeholder="Type a message...">
        </form>
    </div>
</div>