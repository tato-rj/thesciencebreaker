<script type="text/javascript">
class ResultFactory
{
  constructor(response, fields, href) {
    this.response = response;
    this.fields = fields;
    this.href = href;
    $('#search-results').append(this.container());
    return $('#search-results > div').last();
  }

  container() {
    let response = this.response;
    let html = '<div><a href="'+this.response[this.href]+'" class="breaker no-a-underline">';
        html += '<div><i class="fa fa-ellipsis-v mr-2 text-muted" aria-hidden="true"></i>';
        this.fields.forEach(function(item) {
          html += response[item]+' ';
        });
        html += '</div></a></div>';
        return html;
  }
}

function reset(box) {
  box.children().remove();
}

class AwesomeSearch
{
  constructor(array) {
    // Define user variables
    this.container = array['container'];
    this.call = array['call'];
    this.fields = array['fields'];
    this.redirect = array['redirect'];
    this.limit = array['limit'];
  }

  init() {
    // Initialization sequence
    this.createSearchBox();
    this.enableSearch();
    this.enableReset();
  }

  createSearchBox() {
    $(this.container).append('<div id="search-results"></div>');
    this.results_box = $('#search-results');
  }

  enableSearch() {
    let call = this.call;
    let fields = this.fields;
    let redirect = this.redirect;
    let limit = this.limit;
    let results_box = this.results_box; 

    $('input[name="awesome-search"]').on('keyup click', function() {
      let input = $(this).val();

      if(input != '') {

        $.post(call, {input: input})
        .done(function(data, status){ 
          reset(results_box);
          $.each(data, function(index, response) {
            new ResultFactory(response, fields, redirect);
          });
          if (data.length == limit) {
            results_box.append('<p><small>Too many results! Narrow your search a bit more...</small></p>');
          }
          results_box.fadeIn('fast');
        })
        .fail(function(error) {
          console.log(error.responseText);
        });

      } else {
        $('#search-group > div').fadeOut('fast', function() {
          reset(results_box);
        });
      }
    });  
  }

  enableReset() {
    let results_box = this.results_box;
    $(document).click(function(event) {
        $(results_box).fadeOut('fast', function() {
          reset($(this));
        });
    });    
  }
}
</script>