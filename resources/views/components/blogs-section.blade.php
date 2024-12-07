@props(['blogs'])

<section class="container text-white text-center" id="blogs">
      <h1 id="text" class="display-5 fw-bold mb-4"><b style="color: green;">D</b><b style="color: purple;">ino</b><b style="color: red;">saurs</b> <b style="color: blue;">Spe</b><b style="color: red;">cie</b><b style="color: yellow;">s</b></h1>
      <div class="">

        <x-category-dropdown />

        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
          <option value="">Filter by Tag</option>
        </select> -->
      </div>
      <form action="" method="GET" class="my-3">
        <div class="input-group mb-3">
          

        @if(request('category'))
          <input
            name="category"
            type="hidden"
            value="{{request('category')}}"
          />
        @endif

        @if(request('username'))
          <input
            name="username"
            type="hidden"
            value="{{request('username')}}"
          />
        @endif
        
          <input
            name="search"
            type="text"
            value="{{request('search')}}"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
          />

          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>

        </div>
      </form>
        <div class="row">

            @forelse($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <x-blog-card :blog="$blog"/>
                </div>
            @empty
            <p id="text" class="text-center">Blogs Not Found</p>
            @endforelse
            {{$blogs->links()}}
        </div>
        
      </div>
    </section>