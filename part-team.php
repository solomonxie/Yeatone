        <!-- 
        ================================================== 
            Team Section Start
        ================================================== -->
        <section id="team">
            <div class="container">
                <div class="row">
                    <h2 class="subtitle text-center">我们的团队</h2>
<?php 
// ***********开始循环***************
$users = get_field('team', '46');
// echo '<h1>'.count($users).'</h1>'
$anime_delay = 0;
foreach ($users as $u):
    $anime_delay += 0.3;
    $uid    = $u['ID'];
    $name   = $u['nickname'];
    // $titles = $u['titles'];
    $email  = $u['user_email'];
    $intro  = get_field('intro', 'user_'.$uid);
    $img    = get_field('profile-picture', 'user_'.$uid);
// ***********开始循环***************
?>
                    <!-- Start a team member -->
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-delay="<?php echo $anime_delay; ?>s" data-wow-duration="500ms">
                            <div class="team-img">
                                <img src="<?php echo $img; ?>" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name"><?php echo $name; ?></h3>
                            <!-- <p class="team_designation">  </p> -->
                            <p class="team_text"><?php echo $intro; ?></p>
                            <!-- <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p> -->
                        </div>
                    </div>
                    <!-- End of A team member -->
<?php 
// **********结束循环***********
    endforeach;
// **********结束循环***********
?>
                </div>
            </div>
        </section>