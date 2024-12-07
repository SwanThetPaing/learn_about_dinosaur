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

    <h3 class="text-center text-white">Users Informations</h3>
    <p class="text-danger">Be careful to not accidentally delete Users</p>
    
    <x-card-wrapper id="polish_color" style="background-color: black; border: 1px solid white; width: 970px; border-radius: 20px;">

    <table id="polish_color" style="background-color: black;" id="table" class="table">
  <thead id="polish_color">
    <tr style="color: white; background-color: black;">
      <h5 class="mv-3 text-secondary">

        @if($users->count() > 1)

        {{$users->count()}} Users using this Website.

        @else 

        {{$users->count()}} User using this Website.

        @endif
        
      </h5>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Id</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Name</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Username</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Email</th>
      <th style="color: white;  background-color: black;" id="header_title" scope="col">Created At</th>
      
      <th style="color: white; background-color: black; float: left;" id="header_title" scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody id="polish_color">


  @foreach ($users as $user)
  
      <tr id="polish_color">
      
      <td  style="color: white; background-color: black;"><a style="color: white; background-color: black;" id="text" target="_blank">{{$user->id}}</a></td>

      
       
           <td  style="color: white; background-color: black;"><a style="color: white; background-color: black;" id="text" target="_blank"><img src='{{asset("/storage/{$user->avatar}")}}' alt="" width="50" height="50" class="rounded-circle">{{$user->name}}</a> 
            @auth 
                @if($user->is_admin)
                    (<b style="color: lightblue;">Admin</b>)
                @elseif(!$user->is_admin)
                    (<b style="color: gold;">User</b>)
                @endif
            @endauth

            </td>
        
           <td style="color: white; background-color: black;" id="intro">{{$user->username}}</td>
       
          <td style="color: white; background-color: black;" id="intro">{{$user->email}}</td>
          <td style="color: white; background-color: black;" id="intro">{{$user->created_at->diffForHumans()}}</td>
          
          <td style="color: white; background-color: black;" id="delete">
              <form action="/admin/users/{{$user->id}}/delete" method="post">
                  @csrf
                  @method('DELETE')
                  
                  <button type="submit" id="delete" class="btn btn-outline-danger"> &#10007;</button>
              </form>
          </td>
      </tr>   

    @endforeach

        
  </tbody>
</table>
    {{$users->links()}}
    </x-card-wrapper>

</x-admin-layout>