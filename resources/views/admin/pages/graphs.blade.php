@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Graphs
        @slot('comment')
          See below some useful data from the database
        @endslot
      @endcomponent
      
      <div class="row mb-4 mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto text-center">
          <h6 class="text-muted">See below some useful graphs that describe recent and current activity in the database. The <strong class="text-green">Bar Graph</strong> shows the number of breaks added each month for the past 6 months, and the <strong class="text-green">Pie Graph</strong> shows the number of breaks by category.</h6>
        </div>   
      </div>
      <div class="row mb-4">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Breaks by Month
            </div>
            <div class="card-body">
              <canvas id="myBarChart" width="100" height="50" data-color="#06b2b8">
                @foreach ($records as $record)
                  <div data-month="{{ $record->month }}" data-count="{{ $record->published }}"></div>
                @endforeach
              </canvas>
            </div>
          </div>
        </div>
       </div>
       <div class="row mb-5 align-items-center flex-flip">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Breaks by Category
            </div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100">
                @foreach ($categories as $category)
                  <div data-category="{{ $category->name }}" data-count="{{ $category->articles_count }}" data-color="{{ $colors[$loop->index] }}"></div>
                @endforeach
              </canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <!-- Custom scripts for this page-->
    <script src="{{ asset('js/admin/sb-admin-datatables.min.js') }}"></script>
    <script src="{{ asset('js/admin/sb-admin-charts.js') }}"></script>
@endsection