<footer class="w3l-footer">
        <div class="shape-footer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 280">
                <path fill-opacity="1">
                    <animate attributeName="d" dur="20000ms" repeatCount="indefinite"
                        values="M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z; M0,160L48,181.3C96,203,192,245,288,234.7C384,224,480,160,576,133.3C672,107,768,117,864,138.7C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;												 M0,64L48,74.7C96,85,192,107,288,133.3C384,160,480,192,576,170.7C672,149,768,75,864,80C960,85,1056,171,1152,181.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;
                                             M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;" />

                </path>
            </svg>
        </div>
        <div class="w3l-footer-16 py-5">
            <div class="container">
                <div class="row footer-p">
                    <div class="col-lg-4 pe-lg-5">
                        <h3>Address:</h3>
                        <p class="mt-3">18-12-222 lane no 4 Qaisar colony, behind junior Zakir Hussain school, Aurangabad (MS) 410013, India.</p>
                        <p class="mt-3">Mobile : +91 8767578712 Opens in your application.</p>
                        <p class="mt-3">Email : info@english4000hours.com</p>
                        <div class="columns-2 mt-4 pt-1">
                            
      <?php
// social //-----------------------------

$sql_social = "SELECT * FROM social WHERE id=1";
        $result_social = $conn->query($sql_social);

if ($result_social->num_rows > 0) {
   
    while($row_social = $result_social->fetch_assoc()) {
        
        
        $face_link = $row_social["facebook"];
        $youtube_link = $row_social["youtube"];
        $inesta_link = $row_social["google"];
        $twitter_link = $row_social["twitter"];
        

    }

}else{
    
   
}

// end social //-------------------------
?>
                            <ul class="social">
                                <li><a href="<?php echo $face_link;?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="<?php echo $twitter_link;?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="<?php echo $youtube_link;?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li><a href="<?php echo $inesta_link;?>" target="_blank"><i class="fa fa-instagram "></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-lg-0 mt-5">
                        <div class="row">
                            <div class="col-xl-5 col-6 column">
                                <h3>Quick Link</h3>
                                <ul class="footer-gd-16">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#index">Our Index </a></li>
                                    <li><a href="#membership">Membership</a></li>
                                    <li><a href="#contact">Contact us</a></li>
                                </ul>
                            </div>
                            <div class="col-xl-5 col-6 column">
                                <h3>Quick Link</h3>
                                <ul class="footer-gd-16">
                                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                                    <li><a href="team_and_contion.php">Terms and Conditions </a></li>
                                    <li><a href="refunds.php">Refunds and Returns</a></li>
                                    <li><a href="notes.php">Notes for the members</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-8 column mt-lg-0 mt-4 pl-xl-0">
                        <h3>Newsletter </h3>
                        <div class="end-column">
                            
                            <?php require 'code/subscribe_code.php'; ?>
                            
                            <form action="" class="subscribe" method="post">
                                <input type="email" name="subscribe" placeholder="Email Address" maxlength="100" required="">
                                <button name="subscribesim"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                            </form>
                            <p class="mt-4">Subscribe to our mailing list and get updates to your email inbox.</p>
                        </div>
                    </div>
                </div>
                <div class="below-section text-center pt-lg-4 mt-5">
                    <p style="color: #fff;"> All rights reserved to <a href="index.php" style="color: #fd746c;"><?php echo $site_name;?></a>

                 <br>programmed by <br><a href="https://eg-script.website/" target="_blank" style="font-weight: bold;font-size: 11px;color: #fd746c;"> EG-script.website</a>
                                </p>
                
                </div>
            </div>
        </div>
    </footer>
    