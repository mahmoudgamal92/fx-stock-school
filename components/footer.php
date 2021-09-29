<footer class="footer-bg footer-p pt-100 pb-80 ">
        <div class="footer-top pb-30">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="logo mb-35">
                                <a href="#">
                                    <p>
                                    FX Stock School
                                   </p>
                                </a>
                            </div>
                            <div class="footer-text mb-20">
                                <p><?php echo $lang['company_vision'];?></p>
                            </div>
                            <div class="footer-social">
                                <p><?php echo $lang['follow'] ?></p>
                                <a href=" <?php echo get_setting('facebook');?>" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="<?php echo get_setting('youtube');?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                                </a>

                                <a href="<?php echo get_setting('instagram');?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="<?php echo get_setting('telegram');?>" target="_blank"><i class="fab fa-telegram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h5><?php echo $lang['company_news'];?></h5>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="#"><?php echo $lang['partners'];?></a></li>
                                    <li><a href="#"><?php echo $lang['about_us'];?></a></li>
                                    <li><a href="#"><?php echo $lang['reviews'];?></a></li>
                                    <li><a href="#"><?php echo $lang['t&c'];?></a></li>
                                    <li><a href="#"><?php echo $lang['help'];?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h5><?php echo $lang['useful_links'];?></h5>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="#"><?php echo $lang['home'];?></a></li>
                                    <li><a href="#"><?php echo $lang['about_us'];?></a></li>
                                    <li><a href="#"><?php echo $lang['services'];?></a></li>
                                    <li><a href="#"><?php echo $lang['latest_blog'];?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                                <h5><?php echo $lang['payment_methods'];?></h5>
                            </div>
                            <div class="footer-social">
                                <p><?php echo $lang['avlible_payment_methods'] ?></p>

                                <a href="https://www.mastercard.com" target="_blank">
                                    <img src="img/payment/master.png" style="width:70px"/>
                                </a>
                               

                                <a href="https://paymob.com" target="_blank">
                                    <img src="img/payment/paymob.png" style="width:70px"/>
                                </a>

                                <a href="https://visa.com" target="_blank">
                                    <img src="img/payment/visa.png" style="width:70px"/>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text">
                            <p><?php echo $lang['rights']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>