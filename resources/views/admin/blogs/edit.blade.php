<x-admin-layout>

    <h3 class="my-3 text-center text-white">Blog Edit Form</h3>
        <x-card-wrapper style="width: 434px; height: 1400px; margin: 0 auto; background-color: black;">
            <form enctype="multipart/form-data" action="/admin/blogs/{{$blog->slug}}/update" method="post" style="width: 400px; height: 600px;">
            @csrf
            @method('patch')

            <x-form.input name="title" value="{{$blog->title}}" />
            <x-form.input name="slug" value="{{$blog->slug}}" />
            <x-form.input name="intro" value="{{$blog->intro}}" />
            <x-form.textarea name="body" value="{{$blog->body}}" />
            <x-form.input name="thumbnail" type="file" value="{{$blog->thumbnail}}" />
            <img src='{{asset("/storage/$blog->thumbnail")}}' width="100px" height="100px" alt="" srcset="">

            <x-form.input-wrapper>

            <x-form.label name="category"/>
                    <select name="category_id" id="category" class="form-control" style="color: white; background-color: black;">

                    @foreach ($categories as $category)

                        <option {{$category->id==old('category_id', $blog->category->id) ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach    

                    </select>
                    <x-error name="category_id" />
                
            </x-form.input-wrapper>

            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </x-card-wrapper>

</x-admin-layout>