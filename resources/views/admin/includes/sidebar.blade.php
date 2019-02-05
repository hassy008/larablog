<div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu active">
                  <a class="" href="{{ url('/dashboard') }}">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="sub-menu">
                  <a href="#">
                      <i class="icon-book"></i>Category
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/add-category') }}">Add Category</a></li>
                      <li><a class="" href="{{ url('/manage-category') }}">Manage Category</a></li>
                  </ul>
              </li>
               <li class="sub-menu">
                  <a href="#">
                      <i class="icon-book"></i>Blog
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/add-blog') }}">Add Blog</a></li>
                      <li><a class="" href="{{ url('/manage-blog') }}">Manage Blog</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a href="#">
                      <i class="icon-fire"></i>Social Contact
                      <span class="fa arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{ url('/social') }}">Social Contact</a></li>
                  </ul>
              </li>

         
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-trophy"></i>
                      <span>Gallery</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a href="{{ url('/add-gallery') }}" class=""> Add Gallery</a></li>
                      <li><a href="{{ url('/manage-gallery') }}" class="">Manage Gallery</a></li>
                  </ul>
              </li>
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>Maps</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a href="vector_map.html" class="">Vector Maps</a></li>
                      <li><a href="google_map.html" class="">Google Map</a></li>
                  </ul>
              </li>
              
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-glass"></i>
                      <span>Extra</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="lock.html">Lock Screen</a></li>
                      <li><a class="" href="invoice.html">Invoice</a></li>
                      <li><a class="" href="pricing_tables.html">Pricing Tables</a></li>
                      <li><a class="" href="search_result.html">Search Result</a></li>
                      <li><a class="" href="faq.html">FAQ</a></li>
                      <li><a class="" href="404.html">404 Error</a></li>
                      <li><a class="" href="500.html">500 Error</a></li>
                  </ul>
              </li>

              <li>
                  <a class="" href="login.html">
                    <i class="icon-user"></i>
                    <span>Login Page</span>
                  </a>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
        </div>