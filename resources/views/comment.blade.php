
  @if($comment !=null)
    <li class="clearfix">
      <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
      <div class="post-comments">
          <p class="meta">{{$comment->created_at->format('d M, Y H:i')}} <a href="#">{{$comment->user->name}}</a> says : <i class="pull-right"></i></p>
          <p>
              {{$comment->text}}
          </p>
      </div>
    </li>
  @endif  
