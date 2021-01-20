@if(app()->environment('production'))
<div class="mt-3">
<div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
<br/>
</div>
@endif