 <div class="top-container">

            <!--SLIDESHOW --> 

           <div class="showcase">
           <h1>Books library</h1> 
   
      <!--slider controls-->
      <div class="ecommerce-hero-slider-small orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <ul class="orbit-container">
    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    
        <!--html active slide --> 
        
    <li class="is-active orbit-slide">
          <div class="hero-slider-slide">
       <div class="row">
         <div class="small-12 medium-3 columns">
           <img src="../images/book.jpg"/>
         </div>
         <div class="small-12 medium-9 columns">
          <div class="hero-slider-slide-content">
            <h3>Featured books</h3>
            <p>Take a look at our featured books.  Enjoy reading and discover new adventures.</p>
            <div><a href="#" class="button hollow"> Learn More ></a></div>
           
          </div>
        </div>
      </div>
     </div>
    </li>

    <!--dynamic slides (N.b not possible to make the active slide dynamic as it breaks the carousel) using fetch files -->
    
<li class="orbit-slide" id="dynamic_slides">
    <li class="orbit-slide" id="dynamic_slides2">
    <li class="orbit-slide" id="dynamic_slides3">
    
    </ul>
 
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Third slide details.</span></button>
  </nav>
</div>
  <!--end of slider-->
                     </div> 
  
   <script>
$(document).ready(function(){
load_slides(1)
load_slides2(1)
load_slides3(1)

    });
    </script> 
  
<script>
  // separately pulls in a dynamic slide based on records in db marked as featured and limited to first, second and third record
    function load_slides(page, query = '')
    {
      $.ajax({
        url:"fetchfeaturedslide.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_slides').html(data);
        }
      });
    }

    function load_slides2(page, query = '')
    {
      $.ajax({
        url:"fetchfeaturedslide2.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_slides2').html(data);
        }
      });
    }

    function load_slides3(page, query = '')
    {
      $.ajax({
        url:"fetchfeaturedslide3.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_slides3').html(data);
        }
      });
    }
    </script> 
    
    <script>
      $(document).foundation();  
      
      </script> 
 
          </body>
  </html>
