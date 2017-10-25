@extends('admin/_core')

@section('content')
  
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Arthur Villar</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row" id="cards">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-book" aria-hidden="true"></i>
              </div>
              <div class="mr-3"><strong>26</strong> Breaks</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>36</strong> Breakers</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-coffee mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>28</strong> Availabe Articles</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-database mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>153</strong> Subuscriptions</div>
            </div>
          </div>
        </div>
      </div>



      <div class="row mb-5">
        <div class="col-lg-8 col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Breaks
            </div>
            <div class="card-body">
              <canvas id="myBarChart" width="100" height="50" data-color="#06b2b8">
                <div data-month="January" data-count="4"></div>
                <div data-month="February" data-count="2"></div>
                <div data-month="March" data-count="5"></div>
                <div data-month="April" data-count="6"></div>
                <div data-month="June" data-count="5"></div>
              </canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 mx-auto">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Categories
            </div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100">
                <div data-category="Health & Physiology" data-count="15" data-color="#50c4d0"></div>
                <div data-category="Neurobiology" data-count="4" data-color="#f2f2f2"></div>
                <div data-category="Earch & Space" data-count="9" data-color="#c9e1ef"></div>
                <div data-category="Evolution & Behaviour" data-count="23" data-color="#252e3c"></div>
                <div data-category="Plant Biology" data-count="7" data-color="#3f4a5a"></div>
                <div data-category="Microbiology" data-count="6" data-color="#f36e41"></div>
                <div data-category="Maths, Physics & Chemistry" data-count="2" data-color="#ffd55c"></div>
              </canvas>
            </div>

          </div>
        </div>
      </div>
    </div>
@endsection