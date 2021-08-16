<div class="form-row">
<div class="input-group col-3 pl-0">
  <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
  <input required type="text" value="{{ $date ?? old($name) }}" name="{{$name}}" class="form-control datepicker" data-provide="datepicker" id="{{$name}}" placeholder="Month/Day/Year" autocomplete="off">
</div>
@isset($time)
<div class="input-group col-3">
  <div class="input-group-addon"><i class="fa fa-clock" aria-hidden="true"></i></div>
  <select class="form-control" name="{{$name}}_time">
    @foreach(\App\Article::hours() as $hour)
    <option value="{{$hour}}" {{$time == $hour ? 'selected' : null}}>{{$hour}}</option>
    @endforeach
  </select>
</div>
@endisset
</div>