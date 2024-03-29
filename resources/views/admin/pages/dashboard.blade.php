@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Welcome {{ auth()->user()->first_name }}!
        @slot('comment')
          Navigate on the menu to manage the database
        @endslot
      @endcomponent

      <div class="row" id="cards">
          <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 mx-auto d-flex justify-content-center flex-column">
          <div id="card-views" class="card no-border text-white o-hidden h-100 mt-3">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-trophy" aria-hidden="true"></i>
              </div>
              <div class="mr-3"><strong>{{ $total_views }}</strong> Breaks views</div>
            </div>
          </div>
          
          <div id="card-breaks" class="card no-border text-white o-hidden h-100 mt-3">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-book" aria-hidden="true"></i>
              </div>
              <div class="mr-3"><strong>{{ $breaks_count }}</strong> Breaks</div>
            </div>
          </div>
          <div id="card-breakers" class="card no-border text-white o-hidden h-100 mt-3">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>{{ $authors_count }}</strong> Breakers</div>
            </div>
          </div>
          <div id="card-available" class="card no-border text-white o-hidden h-100 mt-3">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-coffee mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>{{ $available_count }}</strong> Availabe Articles</div>
            </div>
          </div>
          <div id="card-subscriptions" class="card no-border text-white o-hidden h-100 mt-3">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-database mr-1" aria-hidden="true"></i>
              </div>
              <div class="mr-5"><strong>{{ $subscription_count }}</strong> Subscriptions</div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 mx-auto pt-3" style="border-top: 1px solid lightgrey">
          <p class="mb-1">Other resources</p>
          <a href="{{ route('admin.download', ['path' => 'breaks/excel/breaks_views.xls']) }}" class="d-block" title="Export as XLS">Number of breaks views (excel)</a>
          @only('managers')
          <a href="{{ route('admin.download', ['path' => 'breakers/excel/breakers_emails.xls']) }}" class="d-block" title="Export as XLS">Breakers emails (excel)</a>
          @endonly
        </div>
      </div>
    </div>
@endsection
