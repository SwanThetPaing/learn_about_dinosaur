@props(['comment','user'])

<!-- 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


<x-card-wrapper class="d-flex" style="width: 400px; background-color: gray;">
            <div class="d-flex" style="background-color: black; color: white; padding: 5px; border-radius: 20px;">
                <div>
          
                      
                  
                      <img 
                    src='{{asset("https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg")}}'
                    width="50"
                    height="50"
                    class="rounded-circle"
                    alt="">
                    
                  </a>
                  
                </div>
                <div class="ms-3">
                    <h6>{{$comment->author->name}}</h6>
                    <p clas="text-secondary">{{$comment->created_at->format("F j, Y, g:i a")}}</p>
                </div>

                <div style="margin-left: 134px;">
                    @auth 
                    @if($comment->author->id == auth()->user()->id)
                    
                        <form action="/admin/blogs/{{$comment->id}}/delete" method="post">
                        @csrf
                        @method('DELETE')

                        <!-- Button trigger modal -->
<button type="button" style="border-radius: 20px; border: 1px dotted lightgray;" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
&#9747;
</button>

<!-- Modal -->
<div class="bg-dark modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 160px">
    <div class="modal-content" style="background-color: black; border-radius: ">
      <div class="modal-header" style="background-color: black;">
        <h1 class="badge bg-warning  modal-title fs-5" id="staticBackdropLabel" style="color: black;">Warning &#9757;</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="bg- modal-body" style="color: ;">
        Are you sure you want to delete your comment ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" id="delete" class="btn btn-outline-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
            
                        </form>
                    @endif
                    @endauth
                </div>

</x-card-wrapper>
        <p class="mt-1" style="padding: 7px; background-color: black; border-radius: 20px; color: lightblue;">
           {{$comment->body}}
        </p>
</div>