@extends('admin/_core')

@section('content')
  
    <div class="container-fluid">
      
      @component('admin/snippets/page_title')
          Graphs
        @slot('comment')
          See below some useful data from the database
        @endslot
      @endcomponent

      <div class="row mb-5">
        <div class="col-lg-8 col-md-8 mx-auto">
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
        <div class="col-lg-4 col-md-8 mx-auto">
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