<!-- Core Js Files -->
<script src='{{ URL::asset('js/core/jquery.3.2.1.min.js') }}'></script>
<script src='{{ URL::asset('js/core/popper.min.js') }}'></script>
<script src='{{ URL::asset('js/core/bootstrap.min.js ') }}'></script>
<script src='{{ URL::asset('js/plugins/perfect-scrollbar.jquery.min.js') }}'></script>
<script src='{{ URL::asset('js/plugins/moment.min.js') }}'></script>
<!-- Bootstrap Switch -->
<script src='{{ URL::asset('js/plugins/bootstrap-switch.js') }}'></script>
<!-- Sweet Alert -->
<script src='{{ URL::asset('js/plugins/sweetalert2.min.js') }}'></script>
<!-- Bootstrap tagsinput -->
<script src='{{ URL::asset('js/plugins/bootstrap-tagsinput.js') }}'></script>
<!-- Bootstrap tagsinput -->
<script src='{{ URL::asset('js/plugins/bootstrap-tagsinput.js') }}'></script>
<!-- Bootstrap selectpicker -->
<script src='{{ URL::asset('js/plugins/bootstrap-selectpicker.js') }}'></script>
<!-- Bootstrapdatetimepicker -->
<script src='{{ URL::asset('js/plugins/bootstrap-datetimepicker.min.js') }}'></script>
<!-- Bootstrap dataTable -->
<script src='{{ URL::asset('js/plugins/jquery.dataTables.min.js') }}'></script>
<!-- Bootstrap jasny --) }}'><!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src='{{ URL::asset('js/plugins/jasny-bootstrap.min.js') }}'></script>
<!-- Plugin for full calendar -->
<script src='{{ URL::asset('js/plugins/fullcalendar.min.js') }}'></script>
<!-- Plugin for sliders -->
<script src='{{ URL::asset('js/plugins/nouislider.min.js') }}'></script>
<!-- Plugin for full calendar -->
<script src='{{ URL::asset('js/plugins/buttons.js') }}'></script>
<!-- Sharre -->
<script src='{{ URL::asset('js/presentation-page/jquery.sharrre.js') }}'></script>
<!-- Dashboard -->
<script src='{{ URL::asset('js/now-ui-dashboard.min.js') }}'></script>
<!-- TinyMCE -->
<script src='{{ URL::asset('https://cloud.tinymce.com/stable/tinymce.min.js') }}'></script>

<script>
  $(document).ready(function(){
    $().ready(function(){
        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
        //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
        //         $('.fixed-plugin .dropdown').addClass('show');
        //     }
        //
        // }

        $('.fixed-plugin a').click(function(event){
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if($(this).hasClass('switch-trigger')){
                if(event.stopPropagation){
                    event.stopPropagation();
                }
                else if(window.event){
                   window.event.cancelBubble = true;
                }
            }
        });

        $('.fixed-plugin .background-color span').click(function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if($sidebar.length != 0){
                $sidebar.attr('data-color',new_color);
            }

            if($full_page.length != 0){
                $full_page.attr('filter-color',new_color);
            }

            if($sidebar_responsive.length != 0){
                $sidebar_responsive.attr('data-color',new_color);
            }
        });

        $('.fixed-plugin .img-holder').click(function(){
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if( $sidebar_img_container.length !=0 && $('.switch-sidebar-image input:checked').length != 0 ){
                $sidebar_img_container.fadeOut('fast', function(){
                   $sidebar_img_container.css('background-image','url("' + new_image + '")');
                   $sidebar_img_container.fadeIn('fast');
                });
            }

            if($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0 ){
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function(){
                   $full_page_background.css('background-image','url("' + new_image_full_page + '")');
                   $full_page_background.fadeIn('fast');
                });
            }

            if( $('.switch-sidebar-image input:checked').length == 0 ){
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image','url("' + new_image + '")');
                $full_page_background.css('background-image','url("' + new_image_full_page + '")');
            }

            if($sidebar_responsive.length != 0){
                $sidebar_responsive.css('background-image','url("' + new_image + '")');
            }
        });

        $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function(){
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if($input.is(':checked')){
                if($sidebar_img_container.length != 0){
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image','#');
                }

                if($full_page_background.length != 0){
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image','#');
                }

                background_image = true;
            } else {
                if($sidebar_img_container.length != 0){
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                }

                if($full_page_background.length != 0){
                    $full_page.removeAttr('data-image','#');
                    $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function(){
          var $btn = $(this);

          if(sidebar_mini_active == true){
              $('body').removeClass('sidebar-mini');
              sidebar_mini_active = false;
              nowuiDashboard.showSidebarMessage('Sidebar mini deactivated...');
          }else{
              $('body').addClass('sidebar-mini');
              sidebar_mini_active = true;
              nowuiDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function(){
              window.dispatchEvent(new Event('resize'));
          },180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function(){
              clearInterval(simulateWindowResize);
          },1000);
        });
    });
  });
</script>