@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Graphs
        @slot('comment')
          Useful data from the database
        @endslot
      @endcomponent
      {{-- <div class="row">
        <div class="col-12">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-area-chart"></i> Area Chart Example</div>
              <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
              </div>
            </div>
          </div>
        </div> --}}
       <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12 mx-auto">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i> Breaks by Category
              </div>
              <div class="card-body pl-5 pr-5">
                <canvas id="myPieChart" width="100%" height="100">
                  @foreach ($categories as $category)
                    <div data-category="{{ $category->name }}" data-count="{{ $category->articles_count }}" data-color="{{ $colors[$loop->index] }}"></div>
                  @endforeach
                </canvas>
              </div>
            </div>        
        </div>
        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 mx-auto">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i> Breaks added by Month
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

    </div>
@endsection

@section('scripts')
    <!-- Custom scripts for this page-->
    <script src="{{ asset('js/admin/sb-admin-datatables.min.js') }}"></script>
    <script src="{{ asset('js/admin/sb-admin-charts.js') }}"></script>
@endsection