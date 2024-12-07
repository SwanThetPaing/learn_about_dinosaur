<style>

#button
{
    text-decoration: none;
    color: black;
    margin-left: 25px;
}

#buttonbackground
{
    border-radius: 40px;
    background-color: gold;
    margin-top: 10px;
}

#buttonbackground:hover
{
    background-color: limegreen;
}
    
</style>

<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-3">
                <ul class="list-group mt-5">
                    <li class="list-group-item" id="buttonbackground"><a id="button" href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item" id="buttonbackground"><a id="button" href="/admin/blogs/create">Create Blog</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>