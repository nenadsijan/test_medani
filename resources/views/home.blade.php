@extends('layouts.app')
   
@section('content')

<!-- details card section starts from here -->
<section class="details-card">
    <div class="container">
        <div class="row">
        @foreach($posts as $post)    
            <div class="col-md-4 pb-4">
                <div class="card-content" style="min-height: 452px;">
                    <div class="card-img">
                        <img src="/img/nature-380px.jpeg" alt="{{$post->title}}">
                        @if(Auth::user()->is_admin == 0)  
                          <span>
                              <input type="hidden" id="post_id{{$post->id}}" name="post_id{{$post->id}}" value="{{$post->id}}">
                              @if($post->likes->isEmpty())
                                     <a href="#" style="color: white; display: block;" id="empty-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                                     <a href="#" style="color: red; display: none;" id="full-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                              @else
                                  @foreach($post->likes as $like) 
                                        @if($like->liked == null)
                                          <a href="#" style="color: white; display: block;" id="empty-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                                          <a href="#" style="color: red; display: none;" id="full-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                                        @else
                                          <a href="#" style="color: red; display: block;" id="full-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                                          <a href="#" style="color: white; display: none;" id="empty-like{{$post->id}}" class="like{{$post->id}}"> <i class="fas fa-heart"></i></a>
                                        @endif  
                                  @endforeach
                              @endif 
                          </span>
                       @endif   
                    </div>
                    <div class="card-desc">
                        <h3 class="text-center">{{$post->title}}</h3>
                           <p> {{ \Illuminate\Support\Str::limit($post->text, 120, '...') }}</p>
                        <div class="text-center">
                           <a href="{{ route('show.post', ['slug' =>  $post -> slug ]) }}" class="btn-card ">Read</a>
                        </div>    
                    </div>
                    <div class="text-center">
                       <p>Number of likes: <span id="total-number-of-likes{{$post->id}}">{{$post->getTotalLikesAttribute()}}</span></p>
                    </div> 
                </div>
            </div>
        @endforeach    
        </div>
    </div>
</section>
@endsection
@section('js-script')
<script type="text/javascript">
    @foreach($posts as $post)   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.like{{$post->id}}',function(){
              var post_id = $("#post_id{{$post->id}}").val();
              if($(this).attr('id') == 'full-like' + post_id) {
                var liked = false;   
              }else{
                var liked = true;
              }
              $.ajax({
                 type:'POST',
                 url:'/like',
                 data:{liked:liked, post_id: post_id},
                 beforeSend: function() {

                  },
                 success:function(response){
                    if(response.data.liked == true){
                      $("#full-like"+response.data.post_id).css('display', 'block');
                      $("#empty-like"+response.data.post_id).css('display', 'none');
                      $("#total-number-of-likes"+response.data.post_id).empty().append(response.numberOfPostLikes);


                    }else{
                      $("#full-like"+response.data.post_id).css('display', 'none');
                      $("#empty-like"+response.data.post_id).css('display', 'block');
                      $("#total-number-of-likes"+response.data.post_id).empty().append(response.numberOfPostLikes);
                    }
                 }

              });
        });
    @endforeach       
</script>  
@endsection