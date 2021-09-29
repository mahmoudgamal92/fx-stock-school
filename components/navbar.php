    <!-- header -->
    <header class="header-area">
        <div id="header-sticky" class="menu-area">
            <div class="container-fluid">
                <div class="second-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                      <a href="index.php">
                                        <img src="./img/logo.png" 
                                        style="width:120px;height:90px;border-radius:15px" 
                                        alt="logo">
                                        </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8">
                            <div class="responsive">
                            <i class="icon dripicons-align-right"></i></div>
                            <div class="main-menu text-right text-xl-center">

                                 <nav id="mobile-menu">
                                    <ul>
                                    <li></li>
                                        <li><a href="#" >
                                        <?php  echo $lang['charts']; ?>
                                        </a></li>         
                                        <li><a href="#">
                                        <?php  echo $lang['signals']; ?>
                                        </a>
                                        </li>
                                        <li>
                                        <a href="dashboard/economy.php">
                                        <?php  echo $lang['economy']; ?>
                                        </a>
                                        </li>
                                        <li><a href="news.php">
                                        <?php  echo $lang['news']; ?>
                                        </a></li>
                                        <li><a href="dashboard/tutorials.php">
                                        <?php  echo $lang['tutorials']; ?>
                                        </a></li>
                                        <li><a href="dashboard/indicators.php">
                                        <?php  echo $lang['indicators']; ?>
                                        </a></li>
                                        <li><a href="contact.php">
                                        <?php  echo $lang['contact']; ?>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" id="auth_a">
                                        </a>
                                    </li>

                                    <li id="lang_a" style="text-align:center;width:100%">

                              <?php
                                if($_SESSION['lang'] == "en")
                                {
                                ?>
                                <a href="index.php?lang=ar">
                                    <img src="img/egypt.png" width="50px" height="50px"
                                        style="border: 2px solid #000026;border-radius: 50%;padding:1px" />      
                                </a>
                                <?php
                                }
                                else{

                                    ?>

                                   <a href="index.php?lang=en">
                                    <img src="img/eng.png" width="50px" height="50px"
                                        style="border: 2px solid #000026;border-radius: 50%;padding:1px" />
                                   </a>

                                   <?php
                                        }
                                    ?>

                                    </li>

                                    </ul>
                                
                                </nav>                
                            </div>
                                 
                        </div>

                        <div class="col-xl-2 col-lg-1 col-sm-12 text-right">
                            <div class="header-btn second-header-btn">
                              <?php
                                if(isset($_SESSION['user_id']))
                                {
                                ?>				
                                <a class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user-circle"></i>
                               <?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?>
                              
                                </a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="dashboard/">
                                <?php  echo $lang['dashboard']; ?>
                                </a>
                                <a class="dropdown-item" href="dashboard/profile.php">
                                <?php  echo $lang['profile']; ?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                <?php  echo $lang['sign_out']; ?>
                                </a>
                                </div>

                                <?php
                                }
                                else
                                {
                                ?>

                                <a onclick="document.getElementById('id01').style.display='block'" class="btn">
                                <?php  echo $lang['signin']; ?>
                                </a>
                                <?php
                                 }
                                 ?>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-1 text-right d-xl-block" id="switch_lang">
                            <div class="header-btn second-header-btn">
                            <?php
                        if($_SESSION['lang'] == "en")
                        {
                        ?>


                                <a href="index.php?lang=ar">
                                    <img src="img/egypt.png" width="50px" height="50px"
                                        style="border: 2px solid #000026;border-radius: 50%;padding:1px" />
                                </a>

                                <?php
                                }
                                else{

                                    ?>

                                   <a href="index.php?lang=en">
                                    <img src="img/eng.png" width="50px" height="50px"
                                        style="border: 2px solid #000026;border-radius: 50%;padding:1px" />
                                   </a>

                                   <?php
                                        }
                                    ?>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->