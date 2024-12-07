<button id="menu" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Menu</button>

<div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

  @auth 

    @if (auth()->user() || auth()->user()->is_admin)
      <div id="profile">

        <table>
            <tr>
              <th><img src="{{auth()->user()->avatar}}" alt="" width="50" height="50" class="rounded-circle"></th>
              <th><p id="username" href="" class="nav-link">{{auth()->user()->name}}</p></th>
              <th>

              <div class="offcanvas-body">

          

              </th>
              
            </tr>
        </table>
      
      </div>
    @endif

  @endauth
    

    <hr id="hr">
    
    <div class="offcanvas-header">

    <h5 class="offcanvas-title" id="menulabels">Menu</h5>
    
    <button type="button" id="close_menu" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    
  </div>

    <a href="/#blogs" id="options" class="nav-link">Blogs</a>
    

    @auth

    @can('admin')
      <a href="/admin/blogs" id="options" class="nav-link">Dashboard</a>
    @endcan

  
  <form action="/logout" method="POST"> @csrf
      <button type="submit" id="options" class="nav-link btn btn-link">Logout</button>
  </form>
    @else
      <a href="/register" id="options" class="nav-link">Register</a>
      <a href="/login" id="options" class="nav-link">Login</a>
    @endauth
    

  </div>
</div>