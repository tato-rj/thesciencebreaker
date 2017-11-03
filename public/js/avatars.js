$('#tab-bar a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('.avatar').on('click', function(event) {
  event.stopPropagation();
  resetAvatars();
  $(this).toggleClass('border-color-green').children('.about').toggle();
});

$(window).click(function() {
  resetAvatars();
});

function resetAvatars ($elements) {
  $('.avatars .avatar').removeClass('border-color-green').children('.about').hide();
}