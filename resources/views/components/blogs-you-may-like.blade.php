<style>

#blogs_you_may_like 
{
    padding-bottom: 10px;
    border-bottom: 2px solid white;
}

</style>

<section class="blogs_you_may_like">
        <div class="container">
            <h3 id="blogs_you_may_like" class="text-center text-white my-4 fw-bold">Blogs You May Like</h3>

                <div class="row text-center">

                    @foreach($randomBlogs as $blog)
                    <div class="col-md-4 mb-4">
                        <x-blog-card :blog="$blog"/>
                    </div>
                    @endforeach 

                </div>

        </div>
      </div>
    </section>