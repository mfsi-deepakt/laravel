<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog/public/index.php/feedback">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user-profile',[
                'id' => auth()->id()
                ])}}">My Feedbacks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="/blog/public/index.php/about">About Project</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action = 'feedback/search'>
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>