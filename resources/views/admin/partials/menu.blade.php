<ul class="bg-default navbar-nav navbar-sidenav" id="exampleAccordion">

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
    <a class="nav-link" href="/admin/dashboard">
      <i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>

{{--   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
    <a class="nav-link" href="/admin/graphs">
      <i class="fa fa-bar-chart" aria-hidden="true"></i>
      <span class="nav-link-text">Graphs</span>
    </a>
  </li> --}}

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Breaks">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#breaks" data-parent="#exampleAccordion">
      <i class="fa fa-book mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Breaks</span>
    </a>
    <ul class="sidenav-second-level collapse" id="breaks">
      <li>
        <a href="/admin/breaks/add">Add new Break</a>
      </li>
      <li>
        <a href="/admin/breaks/xml">Upload XML</a>
      </li>
      <li>
        <a href="/admin/breaks/edit">Edit a Break</a>
      </li>
      @only('managers')
      <li>
        <a href="/admin/breaks/delete">Delete a Break</a>
      </li>
      @endonly
    </ul>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Breakers">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#breakers" data-parent="#exampleAccordion">
      <i class="fa fa-users mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Breakers</span>
    </a>
    <ul class="sidenav-second-level collapse" id="breakers">
      <li>
        <a href="/admin/breakers/add">Add new Breaker</a>
      </li>
      <li>
        <a href="/admin/breakers/edit">Edit a Breaker</a>
      </li>
      @only('managers')
      <li>
        <a href="/admin/breakers/delete">Remove a Breaker</a>
      </li>
      @endonly
    </ul>
  </li>

  @only('managers')
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Team">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#team" data-parent="#exampleAccordion">
      <i class="fa fa-briefcase mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Team</span>
    </a>
    <ul class="sidenav-second-level collapse" id="team">
      <li>
        <a href="/admin/managers/permissions">Permissions</a>
      </li>
      <li>
        <a href="/admin/managers/add">Add new member</a>
      </li>
      <li>
        <a href="/admin/managers/edit">Edit a member</a>
      </li>
      <li>
        <a href="/admin/managers/delete">Remove a member</a>
      </li>
    </ul>
  </li>
  @endonly

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Editor's Picks">
    <a class="nav-link" href="/admin/available-articles">
      <i class="fa fa-coffee mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Available Articles</span>
    </a>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Editor's Picks">
    <a class="nav-link" href="/admin/highlights">
      <i class="fa fa-star mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Highlights</span>
    </a>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Editor's Picks">
    <a class="nav-link" href="/admin/editor-picks">
      <i class="fa fa-heart mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Editor's picks</span>
    </a>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Subscriptions">
    <a class="nav-link" href="/admin/tags">
      <i class="fa fa-tag mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Tags</span>
    </a>
  </li>

  @if(\Staff::check(auth()->user()->email)->role('managers'))
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Subscriptions">
    <a class="nav-link" href="/admin/subscriptions">
      <i class="fa fa-database mr-1" aria-hidden="true"></i>
      <span class="nav-link-text">Subscriptions</span>
    </a>
  </li>
  @endif
</ul>