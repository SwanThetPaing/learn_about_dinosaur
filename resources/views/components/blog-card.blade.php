@props(['blog'])

<style>

  #text2 
  {
    color: black;
    text-decoration: none;
  }

  #card 
  {
    background-color: lightyellow;
  }

</style>

<div id="card" class="card">
            <img
              src='{{asset("/storage/$blog->thumbnail")}}'
              class="card-img-top"
              alt="..."
              width="350px"
              height="350px"
            />
            <div class="card-body">
              <h3 id="text2" class="card-title">{{$blog->title}}</h3>
              <p class="fs-6 text-secondary">
                <a id="text2" href="/?username={{$blog->author->name}}">{{$blog->author->name}}</a>
                <span id="text2"> - {{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-3">
                <a href="/?category={{$blog->category->slug}}"><span id="text2" class="badge bg-warning">{{$blog->category->name}}</span></a>
              </div>
              <p id="text2" class="card-text">
                {{$blog->intro}}
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-dark">Read More</a>
            </div>
          </div>
       