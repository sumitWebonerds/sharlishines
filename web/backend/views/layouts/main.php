<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        Yii::UrltoRoute()
</script>

</head>
<body>
<?php $this->beginBody() ?>
<div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo-name">
                             <a href="<?php Yii::$app->homeUrl ?>">
                                <h1>Sharlishines</h1>
                            </a> 
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="header-right">                     
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img"><img src="images/p1.png" alt=""> </span>
                                            <div class="user-name">
                                                <p>Hello,</p>
                                                <span>Administrator</span>
                                            </div>
                                            <i class="fa fa-angle-down lnr"></i>
                                            <i class="fa fa-angle-up lnr"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                        <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                                        <li>                                             
                                            <?php
                                            if (Yii::$app->user->isGuest) {
                                            ?>
                                             <a href="<?php echo Url::toRoute('site/login'); ?>"><i class="fa fa-sign-out"></i> Login</a> 
                                            <?php
                                            }else{
                                                echo Html::beginForm(['/site/logout'], 'post')
                                                . Html::submitButton(
                                                    'Logout (' . Yii::$app->user->identity->username . ')',
                                                    ['class' => ' btn btn-link logout fa fa-sign-out']
                                                )
                                                . Html::endForm();
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="inner-block">
                   
                   <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    
                </div>
                <div class="copyrights">
                    <p>&copy; Sharlishines <?= date('Y') ?> All Rights Reserved | Design by <a href="http://webingeer.com/" target="_blank">www.webingeer.com</a> </p>
                </div>
            </div>
        </div>
        <!--slider menu-->
        <div class="sidebar-menu">
            <div class="logo">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
                <a href="#"> <span id="logo"></span>
                    <!--<img id="logo" src="" alt="Logo"/>-->
                </a>
            </div>
            <div class="menu">
                <ul id="menu">
                    <li id="menu-home"><a href="<?php echo Url::toRoute('site/index'); ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fa fa-cogs"></i><span>Components</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>
                            <li><a href="grids.html">Grids</a></li>
                            <li><a href="portlet.html">Portlets</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo Url::toRoute('site/index'); ?>"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li>
                    <li><a href="<?php echo Url::toRoute('site/index'); ?>"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul id="menu-academico-sub">
                            <li id="menu-academico-avaliacoes"><a href="inbox.html">Inbox</a></li>
                            <li id="menu-academico-boletim"><a href="inbox-details.html">Compose email</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo Url::toRoute('site/index'); ?>"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul id="menu-academico-sub">
                            <li id="menu-academico-avaliacoes"><a href="<?php echo Url::toRoute('security-tokens/index'); ?>">404</a></li>
                            <li id="menu-academico-boletim"><a href="<?php echo Url::toRoute('site/index'); ?>">Blank</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo Url::toRoute('placed-orders/index'); ?>"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul id="menu-academico-sub">
                            <li id="menu-academico-avaliacoes"><a href="<?php echo Url::toRoute('product/index'); ?>">Product</a></li>
                            <li id="menu-academico-boletim"><a href="price.html">Price</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
<?php $this->endBody() ?>
<script>
    var toggle = true;
    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset = $(".header-main").offset().top;
        $(window).scroll(function() {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".header-main").addClass("fixed");
            } else {
                $(".header-main").removeClass("fixed");
            }
        });
    });
</script>
<!-- /script-for sticky-nav -->
<script>
    var barChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "jul"],
        datasets: [{
            fillColor: "#FC8213",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "#337AB7",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]

    };
    new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>
                                       
                              
</body>
</html>
<?php $this->endPage() ?>
