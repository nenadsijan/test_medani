@extends('layouts.app')
@section('content')

<div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="/img/nature.jpeg" alt="{{$post->title}}">
                        </div>
                        <div class="article-title">
                            <h6><a href="#">Post</a></h6>
                            <h2>{{$post->title}}</h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label>{{$post->user->name}}</label>
                                    <span>{{$post->created_at->format('d M Y')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p>{{$post->text}}</p>
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">Laravel</a>
                            <a href="#">Web Design</a>
                            <a href="#">PHP</a>
                            <a href="#">Javascript</a>
                            <a href="#">HTML</a>
                            <a href="#">CSS</a>
                        </div>
                    </article>

                    <div class="contact-form article-comment">
                        <h4>Comments</h3>
                        <div class="col-lg-12 text-center" id="wait-contact" style="display:none;">
                            <img src="{{URL::asset('/img/loading.gif')}}">
                        </div>
                        <div class="container bootstrap snippets bootdey">
                            <div class="blog-comment">
                                    <hr/>
                                <ul class="comments" id="comments-list">
                                     
                                     @foreach($comments as $comment)  
                                        <li class="clearfix">
                                          <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                                          <div class="post-comments">
                                              <p class="meta">{{$comment->created_at->format('d M, Y H:i')}} <a href="#">{{$comment->user->name}}</a> says : <i class="pull-right"></i></p>
                                              <p>
                                                  {{$comment->text}}
                                              </p>
                                          </div>
                                        </li>
                                     @endforeach
                                    
                                </ul>
                             </div>
                        </div>  
                        <form id="comment-form" name="comment-form" data-name="comment Form"  action="{{route('store.comment')}}" method="post">
                         <h4>Leave a Reply</h4>   
                         {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" value="{{Auth::user()->name}}" class="form-control" type="text" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" value="{{Auth::user()->email}}" class="form-control" type="email" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="comment" id="comment" placeholder="Your comment *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6>Hello, I'm<br> Nenad Šijan</h6>
                                </div>
                            </div>
                            <p>This is test task, used technologies are : Laravel, PHP, JQUERY, JAVASCRIPT, CSS, HTML, etc.</p>
                        </div>
                    </div>
                    <!-- End Author -->

                    <!-- End Trending Post -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                        @foreach($posts as $news)    
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="{{ route('show.post', ['slug' =>  $news -> slug ]) }}">{{$news->title}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="{{ route('show.post', ['slug' =>  $news -> slug ]) }}">
                                            {{$post->user->name}}
                                        </a>
                                        <a class="date" href="{{ route('show.post', ['slug' =>  $news -> slug ]) }}">
                                            {{$post->created_at->format('d M Y')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="{{ route('show.post', ['slug' =>  $news -> slug ]) }}">
                                        <img src="/img/nature-200px.jpeg" alt="{{$post->title}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach    
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Latest Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Laravel</a>
                                <a href="#">Web Design</a>
                                <a href="#">PHP</a>
                                <a href="#">Javascript</a>
                                <a href="#">HTML</a>
                                <a href="#">CSS</a>
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-script')
<script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#comment-form").submit(function(e) {
              e.preventDefault();
              var name = $("#name").val();
              var email = $("#email").val();
              var comment = $("#comment").val();
              var post_id = {!! json_encode($post->id, JSON_HEX_TAG) !!};  
              $.ajax({

                 type:'POST',
                 url:'/comment-store',
                 data:{name:name, email:email, comment:comment, post_id:post_id},
                 beforeSend: function() {
                       $('#comment-form').css("display", "none");
                       $("#wait-contact").css("display", "block");
                  },
                 success:function(data){
                      $("#wait-contact").css("display", "none");
                      $('#comments-list').prepend(data);             
                 }

              });

        });
</script>  
@endsection