<style>

  #text 
  {
    color: white;
    text-decoration:  none;
    padding-top: 5px;
  }

  #for_title 
  {
    width: 450px;
  }

</style>    
    
    <x-layout>

    <!-- single blog section -->
    <div class="container">
      <div class="row">
       


        <table>

            <tr>
              <th> 
            <img
            src='{{asset("/storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
   
            />

              

              </th>

            <th id="for_title">
              <div class="col-md-6 mx-auto text-center"><h3 id="text" class="my-3">{{$blog->title}}</h3>
            <div>
            <div id="text">Author - <a id="text" href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div><a href="/?category={{$blog->category->slug}}"><span id="text" class="badge bg-primary">{{$blog->category->name}}</span></a></div>
            <div id="text" class="text-secondry">{{$blog->created_at->diffForHumans()}}</div>
            <div class="trext-secondary">
              <form action="/blogs/{{$blog->slug}}/subscription" method="post">
              @csrf
              @auth
              @if (auth()->user()->isSubscribed($blog))
                <button class="btn btn-danger">Unsubscribe</button>
              @else
                <button class="btn btn-warning">Subscribe</button>
              @endif
              @endauth

              </form>
            </div>
          </div>
              </th>

            
        </tr>

        <tr><th>
              
           
          <p class="lh-md mt-3">
              <b>{!!$blog->body!!}</b>
          </p>

          <p  class="d-inline-flex gap-1">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Leave Comment
        </button>
          </p>
      <div class="collapse" id="collapseExample">
         <div class="card card-body">

          @auth 
          <x-comment-form :blog="$blog"/>
          @else 
          <p class="text-center">Please <a href="/login">Login</a> to comment</p>
          @endauth

        </div>
      </div>
          
        </div>
      </div>
    </div>
    
    <section class="container">
        <div class="col-md-8 mx-auto">
         

        </div>
      
        </th>
          <th id="for_comment">
            
          
         </th>
        </tr>

      </table>

          
        
    </section>

    @if ($blog->comments->count())
      <x-comments :comments="$blog->comments()->latest()->paginate(3)" :user="$user"/>
    @endif

    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
    
</x-layout>
