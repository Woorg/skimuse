jQuery(function ($) { // use jQuery code inside this to avoid "$ is not defined" error
  $('.loadmore').click(function () {

    var button = $(this),
      data = {
        'action': 'load_posts_by_ajax',
        'query': load_more.posts, // that's how we get params from wp_localize_script() function
        'page': load_more.current_page,
        'security': load_more.security
      };

    $.ajax({ // you can also use $.post here
      url: load_more.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend: function (xhr) {
        button.text('Loading...'); // change the button text, you can also add a preloader image
      },
      success: function (data) {
        if (data) {
          button.text('More posts').prev().children('.swiper-wrapper').append(data); // insert new posts
          load_more.current_page++;

          if (load_more.current_page == load_more.max_page)
            button.remove(); // if last page, remove the button

          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
});
