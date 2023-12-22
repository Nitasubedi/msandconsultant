<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>About Us</h4>
                    <p>
                        {{ companyInfo()->description }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>Contact Us</h4>
                    <p>

                    <p class="number">
                        {{companyInfo()->phone_no}} <br>
                        {{companyInfo()->mobile_no}}
                    </p>
                </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send offers, not a single spam.</p>

                </div>
            </div>
        </div>
        <div class="footer-bottom row">
            <p class="footer-text m-0 col-lg-6 col-md-12">

                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | Powered by <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://nctbutwal.com.np/" target="_blank">NCT</a>

            </p>
            <div class="footer-social col-lg-6 col-md-12">
                <a href="{{facebookLink()->link}}" target="new"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>