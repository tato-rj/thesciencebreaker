@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Graphs
        @slot('comment')
          See below some useful data from the database
        @endslot
      @endcomponent

      <div class="row mb-4 align-items-center">
        <div class="col-lg-4 col-md-4 offset-lg-1 p-4">
          <h6 class="text-muted">This <strong>Bar Graph</strong> will show the number of Breaks added each month. It takes into account the past 6 months.</h6>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-12">
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
        <div class="col-lg-4 col-md-6 col-sm-12 offset-lg-1">
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
        <div class="col-lg-6 col-md-6 col-sm-12 p-4">
          <h6 class="text-muted">This <strong>Pie Graph</strong> shows the number of Breaks in each category, where its easy to visualize proportionally how the Breaks are distributed among the sections.</h6>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <!-- Custom scripts for this page-->
    <script src="{{ asset('js/admin/sb-admin-datatables.min.js') }}"></script>
    <script src="{{ asset('js/admin/sb-admin-charts.js') }}"></script>
@endsection