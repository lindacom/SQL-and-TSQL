How to
=======
Connect to a database in PHP
-----------------------------

$connect = mysqli_connect("database", "account", "password", "database table");

Query a database in php
-----------------------
 $query = "
 SELECT * FROM table ORDER BY id ASC

";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
    
 $output .= '

 ';
 
 while ($row = mysqli_fetch_array($result))
 {  
$output .= '

      <div>


<a href="'.$row["url"].'?action=add&tag='.$row["tag"].'  " style="text-decoration : none; color : #000000;">
  
<object data='.$row["image"].' width="100%"  class="group list-group-image">
    <img src="#" width="100%"/>
  </object>
   
  <h2><a href="#">'.$row["title"].'</a></h2>
  
  <span>'.$row["precis"].'</span>
  
  <span>'.$row["price"].'</span><span>'.$row["price"].'</span></a>
      
   </div>   

 '; 
      
}


 echo $output;

}

   

else
{
 echo 'Data Not Found';
}

?> 

Use Ajax to display database query results from fetch.php file into div with the id result
--------------------------------------------------------------------------------------------

   <script>
$(document).ready(function(){
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 });
    </script>

Create hyperlink to add a row from database to a url on click
-------------------------------------------------------------

<a href="http://website.com?action=add&title='.$row["title"].' ">'.$row["title"].'</a>

Tutorials
==========

Instant search with pagination in PHP, MySQL, Jquery and Ajax

https://www.webslesson.info/2020/02/instant-search-with-pagination-in-php-mysql-jquery-and-ajax.html

Javascript shopping cart

https://www.youtube.com/watch?v=YeFzkC2awTM

Breadcrumb navigation with CSS triangles

https://css-tricks.com/triangle-breadcrumbs/

Shopping cart in nav example

https://codepen.io/codyhouse/pen/gvqJa

Designing a product page layout with flexbox

https://css-tricks.com/designing-a-product-page-layout-with-flexbox/

List and grid display

https://codepen.io/ajaypatelaj/pen/zIBjJ

Intro to Vue.js - event handling

https://www.vuemastery.com/courses/intro-to-vue-js/event-handling/

Resources
=========

JSLocalSearch - Javascript file - a small and fast jQuery client-side filter plugin which can be used to filter and search a list of elements you provide. 

https://www.jqueryscript.net/other/filter-search-list-local.html
