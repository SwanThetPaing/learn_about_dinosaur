@props(['blogs'])

<style>

#menu 
{
  color: white;
  background-color: black;
  padding: 5px;
  width: 100px;
}

#menu:hover
{
  color: white;
  background-color: black;
  padding: 5px;
  width: 100px;
  border-bottom: 2px solid white;
}

#titlename
{
  color: limegreen;
  background-color: light;
}

#options 
{
  color: white;
  margin-left: 50px;
  font-size: 25px;
  border-left: 3px solid white;
}

#options:hover
{
  color: white;
  margin-left: 50px;
  font-size: 25px;
  border-left: 3px solid blue;
}

#menulabels
{
  color: white;
  padding: 25px;
  font-size: 25px;
}

#close_menu 
{
  background-color: white;
  margin-right: 20px;
}

#profile 
{
  padding: 30px 30px 10px 20px;
}

#option_profile
{
  color: white;
  text-decoration: none;
}

#option_profile:hover
{
  color: white;
  border-bottom: 1px solid white; 
  text-decoration: none;
}

#hr 
{
  color: white;
}

#username 
{
  color: orange;
  margin-top: 19px;
}

#search_bar
{
  margin-right: 300px;
}

</style>

<nav class="navbar">
      <div class="container">
        <a id="titlename" class="navbar-brand" href="/">Learn About Dinosaur</a>
        
        <div class="d-flex">
    
        <x-menu/>

        </div>
      </div>
    </nav>