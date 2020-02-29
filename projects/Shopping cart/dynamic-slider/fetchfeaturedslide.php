<?php  

$connect = mysqli_connect("host", "user", "password", "database");





$output = '';

 $query = "
 SELECT * FROM books 
 WHERE featured = 'featured'
 LIMIT 1
 ;
  
     
   

";

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
    
 $output .= '
 
      <div class="hero-slider-slide">
       <div class="row">
         <div class="small-12 medium-3 columns">

 ';
 while ($row = mysqli_fetch_array($result))
 {
 
      
  

$output .= '

          <a href="'.$row["url"].'?action=add&tag='.$row["tag"].'  " style="text-decoration : none; color : #000000;">
<object data='.$row["image"].' width="100%"  class="group list-group-image">
    <img src="http://placehold.it/400x250/000/fff" width="100%"/>
  </object>
         </div>
         <div class="small-12 medium-9 columns">
          <div class="hero-slider-slide-content">
            <h3>'.$row["title"].'</h3>
            <p>'.$row["precis"].'</p>
            <div><a href="#?search='.$row["title"].' " class="button hollow"> Learn More ></a></div>
            
       </div>
        </div>
      </div>
     </div>
    </li>         

 ';
      
      
      
      
      
 

}


 echo $output;




}

   

else
{
 echo 'There are currently no featured books';
}

?>  
