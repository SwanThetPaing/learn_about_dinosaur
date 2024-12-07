<style>

#table 
{
  border: 1px solid white;
  width: 910px;
  height: 100%;
  background-color: white;
  border-radius: 35px;
}

#header_title 
{
  color: white;
}

#text 
{
  color: black;
  text-decoration: none;
}

#released_date
{
  color: black;
}

#edit 
{
  margin-top: 16px;
  float: left;
}


#delete 
{
  border-radius: 50%;
  float: left;
}

#polish_color
{
  color: white; 
  background-color: black;
}

</style>

<x-admin-layout>

    <h3 class="text-center text-white">Blogs Informations</h3>
    <p class="text-danger">Be careful to not accidentally delete blogs</p>
    
    <x-card-wrapper id="polish_color" style="background-color: black; border: 1px solid white; width: 970px; border-radius: 20px;">

    <table id="polish_color" style="background-color: black;" id="table" class="table">
  <thead id="polish_color">
    <tr style="color: white; background-color: black;">

    <h5 class="mv-3 text-secondary">

      @if($blogs->count() > 1)

      {{$blogs->count()}} blogs available on this Website.

      @else 

      {{$blogs->count()}} blog available on this Website.

      @endif
        
    </h5>

      <th style="color: white;  background-color: black;" id="header_title" scope="col">Title</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Intro</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Body</th>
      <th style="color: white; background-color: black; float: left;" id="header_title" scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody id="polish_color">


  @foreach ($blogs as $blog)

      <tr id="polish_color">
          <td  style="color: white; background-color: black;"><a style="color: white; background-color: black;" id="title" href="/blogs/{{$blog->slug}}" target="_blank">{{$blog->title}}</a></td>
          <td style="color: white; background-color: black;" id="slug">{{$blog->slug}}</td>
          <td style="color: white; background-color: black;" id="intro">{{$blog->intro}}</td>
          <td style="color: white; background-color: black;" id="edit"><a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-outline-warning">&#10002;</a></td>
          <td style="color: white; background-color: black;" id="delete">
            <form action="/admin/blogs/{{$blog->slug}}/delete1" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" id="delete" class="btn btn-outline-danger">
                  &#10007;
                  </button>
              </form>
          </td>
      </tr>   

    @endforeach

        
  </tbody>
</table>
    {{$blogs->links()}}
    </x-card-wrapper>

</x-admin-layout>