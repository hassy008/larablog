@extends('frontEnd.master')
@section('title')
Home
@endsection
@section('mainContent')

<!--****************[Facebook code Began]*******************-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2212930935432839&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--****************[Facebook code END]*******************-->
 
<div class="templatemo_post_wrapper">
  
  <div class="templatemo_post">
   
      <div class="post_title">{{ $blog_info->blog_title }}</div>
      <div class="post_info">
      	Posted by {{ $blog_info->author_name }}, {{ $blog_info->created_at }}, in <a href="#">Player.</a>
      </div>
      
      <div class="post_body">
        <p>{{ $blog_info->blog_short_description }}</p>
          <img src="{{ asset( $blog_info->blog_image ) }}" border="1" height="200" width="100%" />
        <p>{{ $blog_info->blog_long_description }}</p>
    </div>

    <div class="post_comment">
    	<a href="#">No Comment</a>
    </div>
     <div class="content-grid-info">
      @guest
      <h4>You've to <a href="{{ url('/login') }}">Login</a> for comment any post.<br>Please Login First.</h4>
      @else
    <!-- [Own Code]-->  
      <h3>Post Your Comment Here</h3>
      <table >
       <tr>
         <td>
           <textarea name="" rows="4" cols="55" placeholder="Write your comment here"></textarea>
         </td>
       </tr>
       <tr>
        <br>
         <td>
           <input type="submit" name="" cols="55" value="Post Your Comment" />
         </td>
       </tr>
      </table>
  <!-- [Own Code]-->

  <!-- [Faccebook comments]-->
{{--       <div class="fb-comments" data-href="https://localhost:8000" data-numposts="5"></div>
 default code--}}     
        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
  <!-- [Faccebook comments]-->      


<!-- ***************************[DISQUS COMMENTS]-->
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://larablog-14.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
{{-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> --}}
                            

<!--End Disqus-->

  @endguest
    </div>

  </div>
</div> <!-- End of a post-->



@endsection                