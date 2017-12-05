<script type="text/javascript">
function awesomeSearch(call, array, link) {

$(document).click(function(event) {
    $('#search-group > div').fadeOut('fast', function() {
      $('#search-results > div').not('.d-none').remove();
    });
    $('#search-results').find('> p').remove();
});

$('#search-group input[name="search"]').on('keyup click', function() {
  let output = array;
  let destination = link;

  $search_container = $('#search-group > div');
  $input = $(this).val();
  
  if($input != '') {
    $.post(call,
    {
      input: $input
    },
    function(data, status){
        $container = $('#search-results');
        $container.find('> div').not('.d-none').remove();
        $container.find('> p').remove();
        $.each(data, function(index, response) {
          $result_box = $container.find('.d-none').clone().removeClass('d-none');
          $breaker = $result_box.find('.breaker');
          output.forEach(function(item) {
            $breaker.find('> div').append(response[item]+' ');
          });
          $breaker.attr('href', response[destination]);
          $container.append($result_box);
        });
        if (data.length == 10) {
          $container.append('<p><small>Too many results! Narrow your search a bit more...</small></p>');
        }
        $container.fadeIn('fast');
    });
  } else {
    $('#search-group > div').fadeOut('fast', function() {
      $('#search-results > div').not('.d-none').remove();
    });
  }
});  
}
</script>