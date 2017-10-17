 <!--:: HEADER ::-->
            <div id="gtmartvn">
                <header>
                    <div class="banner">
                        <img src="images/bn.png" alt=""/>
                        <a href="Gio-Hang/" id="span">
                            <i class="fa fa-shopping-cart"></i>
                            Giỏ hàng: <b>
							<?php
									$ok=1;
									if(isset($_SESSION['cart']))
									{
										foreach($_SESSION['cart'] as $k=>$v)
										{
											if(isset($k))
											{
											$ok=2;
											}
										}
									}

									if ($ok != 2)
									{
										echo '0';
									} else {
										$items = $_SESSION['cart'];
										echo count($items);
									}
								?>
							
							</b> sản phẩm
                        </a>
                    </div>
                    <nav class="header-menu">
                        <ul>
                            <li class="menu-li"><a href="index.html">trang chủ</a></li>
							<?php
								$menu = menu(0);
								while($row = mysql_fetch_array($menu)){
							?>
								<li class="menu-li">
								<?php
										$menu1 = menu($row[0]);
										$test1 = mysql_num_rows($menu1);	
										if($test1==0){
								?>
									<a href="<?php echo $row[2];?>/"><?php echo $row[1];?></a>
								<?php 
										}else{
										echo "<a >".$row[1]."</a>";
										}
								?>
									<?php
										
										if($test1 >0){ 
											echo "<ul id='menu-drop'>";
												while($row1 = mysql_fetch_array($menu1)){
													echo "<li><a href='".$row1[2]."/'>".$row1[1]."</a>";
													//menu 3 cấp
													$menu2 = menu($row1[0]);
													$test2 = mysql_num_rows($menu2);
													if($test2 >0){ 
														echo "<ul>";
															while($row2 = mysql_fetch_array($menu2)){
																echo "<li><a href='".$row2[2]."/'>".$row2[1]."</a></li>";
															}
														echo "</ul>";
														
													}
													// end menu 3 cấp
													echo "</li>";
												}
											echo "</ul>";
										}
									?>
								</li>
							<?php
								}
							?>
                        </ul>
                    </nav>
                </header>
                <!--:: END HEADER ::-->