@include('admin.header')

<div class="content-wrapper">

</div>

@include('admin.footer')


<!-- remove active class from nav -->
<script>
    $(window).on('load', function() {
        $('.nav-item').removeClass('active');
    });
</script>