<?php 
	session_start();
	include ("libs/quantri.php");
	include ("libs/dbcon.php");
	include ("libs/libs.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<base href="http://localhost:81/gtmart.vna/"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>gtmart</title>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/styleslide.css" />

        <?php
        if (!class_exists('lessc')) {
            include ('./libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('less/style.less', 'css/style.css');
        ?>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script>
            $(document).ready(function () {
				
                $("#thanhtoan").click(function () {
                    $(".info-buy").show();
                });
				$("#yk_kh").click(function(){
					$("#ykkh").show();
				});
            });
			
		
        </script>

    </head>
    <body>
        <div class="container">
			<?php 
				include ("blocks/header.php");
			?>

                <!--:: CONTENT ::-->
                <div class="content">
                    <div class="col3">
                        <div class="cont-sideLeft">
                            <div class="categorise">
                                <?php 
									include ("blocks/category_product.php");
								?>
                            </div>
                            <div class="search">
                                <?php 
									include ("blocks/search.php");
								?>
                            </div>
						<?php 
							$detail_video=detail_table('video',1);
							$src = str_replace( "https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $detail_video[1] )
						?>
                            <iframe width="100%" height="auto" src="<?php echo $src ?>" frameborder="0" allowfullscreen></iframe>
                            <div class="banner_pr">
								<?php 
									include ("blocks/suport_online.php");
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col9">
                        <div class="cont-main">
                            <div class="slideShow">
                                <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
                                <?php 
									include ("blocks/slide_show.php");
								?>
                                <!-- End WOWSlider.com BODY section -->
                            </div>
                            <div class="main">
                                <div class="col10">
                                    <!--:: LIST SP ::-->
									<?php 
									
									$url = $_SERVER['REQUEST_URI'];
									$mang = explode('/', $url);
									
									$detail=detail_ten_kd($mang[2]);
								
									$id_menu=$detail[0];
									
									if(empty($id_menu)){
										$page=0;			
									}else if($id_menu>7 ){
										$page=2;
									}
									else{
										$page=$id_menu;
									}
									$id_menu = detail_ten_kd($mang[2]);
									if($mang[3] != "" && $id_menu == 3){
										$page = 3;
									}
								
									if($mang[3] !=""){
										$page =10;
									}
									
									if($mang[2] == "Tin-Tuc"){
										$page=3;
									}
									
									if($mang[2]== "Tin-Tuc" || is_numeric($mang[3])){
										$page=3;
									}
									if($mang[2] == "Tin-Tuc" && $mang[3]!="" && !is_numeric($mang[3]) ){
										$page=11;
									}
									if($mang[2] != "Tin-Tuc" && is_numeric($mang[3])){
										$page=2;
									}									
									if($mang[2] == "Sp-moi"){
										$page=15;
									}else if($mang[2] == "Sp-Nb"){
										$page=14;
									}
									if($mang[2] == "Gio-Hang"){
										$page=13;
									}else if($mang[2]== "Add-Gio-Hang"){
										$page= 12;
									}
									if($mang[2] == "search"){
										$page=17;
									}
									//echo $page;
									switch ($page){
									case 1:
										include 'pages/page_Intro.php';
										break;
									case 2:
										include 'pages/page_product.php';
										break;
									case 3:	
										include 'pages/page_News.php';
										break;
									case 4:	
										include 'pages/page_Intro.php';
										break;
									case 5:	
										include 'pages/page_Intro.php';
										break;
									case 6:	
										include 'pages/page_Intro.php';
										break;
									case 7:	
										include 'pages/page_Contact.php';
										break;
									case 10:	
										include('pages/page_Detailpro.php');
										
										break;
									case 11:	
										include('pages/page_DetailNews.php');
										break;
									case 12:
										include ('pages/add_cart.php');
										break;
									case 13:
										include ('pages/page_Cart.php');
										break;
									case 14:
										include ('pages/plus_hightline.php');
										break;
									case 15:
										include ('pages/product_new.php');
										break;
									case 16:
										include ('pages/product_page2.php');
										break;
									case 17:
										include ('pages/list_search.php');
										break;
									
									default:									
										include ('pages/page_index.php');
										break;
								}	
							/* end content list */	
									?>
                                    <!--:: END LIST SP ::-->
                                </div>
                                <div class="col2">
                                    <div class="listNews">
                                        <h1 id="h1">TIN TỨC</h1>
										<?php 
											include ("blocks/list_news.php");
										?>
                                    </div>
							<div class="support_infos">
								<h1 id="h1">HỖ TRỢ TRỰC TUYẾN</h1>
								<div class="cont_support">
									<h2>
										Hotline:<strong> 0909 345 789</strong>
									</h2>
								</div>
							</div>
                                    <?php 
										include ("blocks/suport_online.php");
									?>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="slide_dt">
                                <span>Đối tác</span>
								<?php
									include ("blocks/partner.php");
								?>
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <!--:: END CONTENT ::-->

                <!--:: FOOTER ::-->
                <footer>
                    <?php 
						include ("blocks/footer.php");
					?>
                </footer>
                <!--:: END FOOTER ::-->
            </div>
        </div>

        <script src="js/alertbuy.js" type="text/javascript"></script>
    </body>

</html>