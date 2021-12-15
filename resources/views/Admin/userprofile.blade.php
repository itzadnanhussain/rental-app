@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>
                    <!-- <p class="card-description">Horizontal bootstrap tab</p> -->
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- profile tab -->
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab"
                                aria-controls="profile-1" aria-selected="true">Profile</a>
                        </li>


                        <!-- booking tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="booking-tab" data-toggle="tab" href="#booking-1" role="tab"
                                aria-controls="booking-1" aria-selected="false">Booking</a>
                        </li>


                        <!-- payment tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment-1" role="tab"
                                aria-controls="payment-1" aria-selected="false">Payment</a>
                        </li>


                        <!-- contact tab -->
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab"
                                aria-controls="contact-1" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- profile tab -->
                        <div class="tab-pane fade show active" id="profile-1" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="media">
                                <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115"
                                    alt="sample image">
                                <div class="media-body">
                                    <h4 class="mt-0">Why choose us?</h4>
                                    <p>
                                        Far curiosity incommode now led smallness allowance. Favour bed assure son
                                        things yet. She consisted
                                        consulted elsewhere happiness disposing household any old the. Widow downs you
                                        new shade drift hopes
                                        small. So otherwise commanded sweetness we improving. Instantly by daughters
                                        resembled unwilling principle
                                        so middleton.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- booking tab -->
                        <div class="tab-pane fade" id="booking-1" role="tabpanel" aria-labelledby="booking-tab">
                            <h4>Contact us </h4>
                            <p>
                                Feel free to contact us if you have any questions!
                            </p>
                            <p>
                                <i class="mdi mdi-phone text-info"></i>
                                +123456789
                            </p>
                            <p>
                                <i class="mdi mdi-email-outline text-success"></i>
                                contactus@example.com
                            </p>
                        </div>

                        <!-- payment tab -->
                        <div class="tab-pane fade" id="payment-1" role="tabpanel" aria-labelledby="payment-tab">
                            <h4>Contact us </h4>
                            <p>
                                Feel free to contact us if you have any questions!
                            </p>
                            <p>
                                <i class="mdi mdi-phone text-info"></i>
                                +123456789
                            </p>
                            <p>
                                <i class="mdi mdi-email-outline text-success"></i>
                                contactus@example.com
                            </p>
                        </div>


                        <!-- contact tab -->
                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                            <h4>Contact us </h4>
                            <p>
                                Feel free to contact us if you have any questions!
                            </p>
                            <p>
                                <i class="mdi mdi-phone text-info"></i>
                                +123456789
                            </p>
                            <p>
                                <i class="mdi mdi-email-outline text-success"></i>
                                contactus@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('admin.footer')

<!-- remove active class from nav -->
<script>
    $(window).on('load', function() {
        $('.nav-item').removeClass('active');
    });
</script>