<?php
include 'config.php';
session_start();
$_SESSION['isonline'] = true;
$word = $_GET['word'];
$page = $_GET['p'];
if($page == ''){
    $page = "1";
}
if($page < 1){
    $page = "1";
}

$return = aceload('heji','page='.$page,$key);
$logintype = getrightstr($return,'|2|');
if($logintype == 'true'){
    $islogin = true;
}else{
    $islogin = false;
}
$out = getleftstr($return,'|1|');
$allpage = getsubstr($return,'|1|','|2|');
?>


<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/f0baf676-33ba-471b-924f-e44b5f785849.css">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/8c916c1b-e8f6-4763-981f-e625d6e5dbef.css">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/a1391abf-76a1-49b6-9228-9476fdfd38cd.css">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/a13571d2-b16e-47b8-b61d-c05187d68f4a.css">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/4c048fb3-a59c-48de-b451-05d6e77b6aa3.css">
        <link rel="stylesheet" href="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/c124fe51-e7f2-479a-bc7d-2f8b9ebb4bcf.css">
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/299d2b07-893e-44f6-9db9-a45aae1fa4b0.js"></script>
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/b684ebcb-49ef-47b1-b72d-d835be9a2ebe.js"></script>
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/f358e569-a291-4f4d-9f34-719c4cf5e6db.js"></script>
        <script src="js/mainn.js"></script>

        <!--
        <link rel="stylesheet" href="css/myPagination.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="js/myPagination.js"></script>
        -->
        <style type="text/css">
            .nav{
                font-size:medium;
                display: inline-block;
                padding:10px;
                text-align: center;
                border: 1px solid #fff;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>

        <div class="content-bg"></div>
        <div class="bg-overlay"></div>

        <!-- SITE TOP -->
        <div class="site-top">
            <div class="site-header clearfix">
                <div class="container">
                    <a href="<?php echo $homeurl; ?>" class="site-brand pull-left"><span style="color: #fff;"><strong><?php echo $webname; ?></strong></span></a>
                    <div class="social-icons pull-right">
                        <ul>
                            <li><a href="<?php echo $homeurl; ?>" class="nav">主页</a></li>
                            <li><a href="<?php echo $homeurl.'/category-28.html'; ?>" class="nav">合集专区</a></li>
                            <?php  
                            if($islogin !== true){
                                echo '<li><a href="https://www.hcw3.cn" class="nav" target="_blank">登录/注册</a></li>';
                            }else{
                                echo '<li><a href="user.php" class="nav">个人中心</a></li>';
                                echo '<li><a href="javascript:loginout();" class="nav">退出登录</a></li>';
                            }
                                
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div> <!-- .site-header -->
            <div class="site-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 text-center">
                        <h2>合集专区</h2>
                        </div>
                    </div>
                </div>
            </div> <!-- .site-banner -->
        </div> <!-- .site-top -->
        
        <!-- MAIN POSTS -->
        <div class="main-posts">
            <div class="container">
                <div class="row">
                    <div class="blog-masonry masonry-true">
                        
                         <?php echo $out; ?>

                    </div>
                    <div id="pagination" class="pagination" style="width: 100%;text-align: center;padding: 10px;border-radius: 15px;"></div>
                </div>
            </div>
        </div>
        
        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="container">
                <div class="row" id="about">
                <?php echo $about; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-behance"></a></li>
                                <li><a href="#" class="fa fa-dribbble"></a></li>
                                <li><a href="#" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="copyright-text"><?php echo $footerinfo; ?></p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/3a24b2ac-41b1-48a3-9348-9011afd50a55.js"></script>
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/c223845b-e192-4192-9e93-eb82532e7d88.js"></script>
        <script src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-ee2812fe-fc7d-4f54-b018-bc3c01aff9c1/a096ab1d-c2e7-4719-bdec-07dd80be673f.js"></script>
        <!--
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/min/plugins.min.js"></script>
        <script src="js/min/main.min.js"></script>
        -->
        <!-- Preloader -->
        <script>
            window.onload = function () {
                new myPagination(
                    {id:'pagination',
                    curPage:<?php echo $page; ?>,
                    pageTotal:<?php echo $allpage; ?>,
                    pageAmount:21,
                    dataTotal:null,
                    pageSize:5,
                    //showPageTotalFlag:true,
                    showSkipInputFlag:true,
                    getPage:function (page)
                         {
                             <?php
                                echo 'window.location.href="?p="+page;'; 
                             ?>
                         }
            })
            }
        </script>
        <script type="text/javascript">
            $(window).load(function() { // makes sure the whole site is loaded
                $('#loader').fadeOut(); // will first fade out the loading animation
                    $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y':'visible'});
            });
        </script>
    </body>
</html>