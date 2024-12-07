<style>

#option_profile
{
  color: white;
  text-decoration: none;
}

</style>

<button id="menu" style="margin-left: 5px;" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Show Profile
</button>

<table>

    <tr>
        <th>
            
        </th>
    </tr>

</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
  @auth 

@if (auth()->user() || auth()->user()->is_admin)
  <div id="profile">

    <table>
        <tr>
          <th><img src="{{auth()->user()->avatar}}" style="margin-left: 185px" alt="" width="50" height="50" class="rounded-circle"></th>
        </tr>
        <tr>
          <th><p style="color: black; margin-left: 50px;" href="" class="nav-link">Username</p></th>
          <th>
            
          <p style="margin-left: 0px;">{{auth()->user()->name}}</p>
          

          </th>
          
        </tr>
        <tr>
          <th><p style="color: black; margin-left: 50px;" href="" class="nav-link">Email</p></th>
            <th><p>{{auth()->user()->email}}</p></th>
        </tr>
    </table>
  
  </div>
@endif

@endauth

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <x-edit_profile/>
        
      </div>
    </div>
  </div>
</div>