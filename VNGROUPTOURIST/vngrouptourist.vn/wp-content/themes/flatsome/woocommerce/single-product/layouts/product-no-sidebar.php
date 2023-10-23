<div class="product-container">
<div class="product-main">
<div class="row content-row mb-0">



	<div class="product-gallery large-<?php echo flatsome_option('product_image_width'); ?> col">
<?php 
$_product = wc_get_product( get_the_ID() ); // GET meta tour
// $giasale_format = number_format_i18n( $_product->get_sale_price() );
$giagoc_format = number_format_i18n( $_product->get_regular_price() );
?>
<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
	?>
	<br />
	<div class="dat-tour row">
		<h1 class="product-title entry-title tour-title"> <?php the_title(); ?></h1>
		<ul class="thong-tin-dau">
			<li class=" trai">
				<p><span class="tour-time">Thời gian</span> <?php echo get_post_meta(get_the_ID(),'wpcf-ngay-dem',true); ?></p>
				<p><span class="tour-time">Các Tháng Có Tour</span><?php echo get_post_meta(get_the_ID(),'wpcf-cac-thang-co-tour',true); ?></p>
			</li>
			<li class=" phai phai-update">
			    <p class="ngay-kh"><span class="tour-time">Khởi hành ngày</span> <?php echo date('d-m-Y',get_post_meta(get_the_ID(),'wpcf-ngay-tour',true)); ?></p>
		    </li>
			</ul>
		<div class="clearfix"></div>
		<ul class="thong-tin-sau">
		    <li>
		        <div class="plan-div">
		            <div id="printListTour">
    		            <i class="fa-solid fa-print"></i> In Lịch Trình Tour
    		        </div>
    		        <div id="downloadPdf">
    		            <i class="fa-solid fa-download"></i> Download Lịch Trình Tour
    		        </div>
		        </div>
		    </li>
		    <li>
		        <div class="product-short-description short-tour-des">
                	<!--<p> Mô tả ngắn: </p>-->
                	<?php echo htmlspecialchars(get_the_excerpt()); ?>
                </div>
		    </li>
		    <li>
		        <p class="giatiennn"><?php echo $giagoc_format; ?></p>
		    </li>
			<!--<li class=""><p class="gia-giam"><span class="tien"><?php //echo $giasale_format; ?></span><span> đồng</span></p><p class="gia-goc"><span style="color: red; font-weight: bold;">Giá gốc:</span> <?php //echo $giagoc_format; ?> <span> đồng</span></p></li>-->
			<!--<li class="">-->
			<!-- Trigger/Open The Modal -->
			<div style="display:none" class="fancybox-hidden">
			    <div id="contact_form_pop">
			        <?php echo do_shortcode('[contact-form-7 id="568" title="FORM"]'); ?>
			    </div>
			</div>

			</li>
		</ul>
		<div class="tuvan-zone"><p class="button-dat-tour"><a href="#contact_form_pop" class="fancybox fancy-single">Nhận Tư Vấn</a></p></div>
	</div><br>
	
	
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>
	</div>

	<div class="product-info summary col-fit col entry-summary <?php flatsome_product_summary_classes();?>">
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<?php 
			
			$contenttour = apply_filters( 'the_content', get_the_content() );

		 	$khoihanh = date('d-m-Y',get_post_meta(get_the_ID(),'wpcf-ngay-tour',true));
		 	$thoigian = get_post_meta(get_the_ID(),'wpcf-ngay-dem',true);
		 ?>
		 <?php
            $meta_value = get_post_meta( get_the_ID(), '', true);
            $prefix = 'lich-khoi-hanh_'; // Tiền tố cần lọc

            $filtered_meta = array_filter($meta_value, function($key) use ($prefix) {
                return strpos($key, $prefix) === 0;
            }, ARRAY_FILTER_USE_KEY); // Lọc các meta data có tiền tố là $prefix
            
            $result = [];
            
            foreach ($filtered_meta as $key => $value) {
                  if (preg_match("/^lich-khoi-hanh_(\d+)_ngay-di$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    // $result[$id]["ngay_di"] = DateTime::createFromFormat("Ymd", $value[0])->format("Y/m/d");
                    $result[$id]["ngay_di"] = $value[0];
                  }
                  if (preg_match("/^lich-khoi-hanh_(\d+)_ngay-ve$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    $result[$id]["ngay_ve"] = DateTime::createFromFormat("Ymd", $value[0])->format("Y/m/d");;
                  }
                  if (preg_match("/^lich-khoi-hanh_(\d+)_chuyen-bay-di$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    $result[$id]["chuyen_bay_di"] = $value[0];
                  }
                  if (preg_match("/^lich-khoi-hanh_(\d+)_chuyen-bay-ve$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    $result[$id]["chuuyen_bay_ve"] = $value[0];
                  }
                  if (preg_match("/^lich-khoi-hanh_(\d+)_khach-san$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    $result[$id]["khach_san"] = $value[0];
                  }
                  if (preg_match("/^lich-khoi-hanh_(\d+)_gia$/", $key, $matches)) {
                    $id = $matches[1];
                    $result[$id]["id"] = $id;
                    // $result[$id]["gia"] = number_format($value[0], 0, ',', '.') . ' VND';
                    $result[$id]["gia"] = str_replace("&nbsp;", "<br />", $value[0]);
                  }
            }
            
            $result = array_values($result); // Re-index the array with numerical keys
            
            $lich_khoi_hanh = json_decode(json_encode($result), false);

        ?>
		<?php echo do_shortcode('[tabgroup]
    [tab title="Chương trình Tour"]
    <div id="printEl" class="printEl">'. get_the_content() .'</div>
    [/tab]
    [tab title="thông tin"]
    	<div class="thongtintour">
    		<p><i class="fa fa-paper-plane" aria-hidden="true"></i> Ngày khởi hành: '.$khoihanh.'</p>
    		<p><i class="fa fa-history" aria-hidden="true"></i> Thời gian: '.$thoigian.'</p>
    	</div>
    [/tab]
    [tab title="lưu ý"] <div style="font-weight: 300;
    font-size: 20px;
    margin-bottom: 20px;
    color: #2d9ad9;">Lưu ý</div>
    <p>Khi đăng ký tour, vui lòng quý khách xuất trình các giấy tờ tùy thân như: Hộ Chiếu (Passport), Giấy Khai Sinh (trẻ em đi cùng), Visa Việt Nam (hộ chiếu nước ngoài), Giấy Khám Sức Khỏe dành cho người lớn tuổi (trên 70 tuổi) và phụ nữ mang thai (dưới 30 tuần).</p>

    <p>Do tính chất là đoàn ghép khách lẻ, công ty du lịch sẽ có trách nhiệm nhận khách cho đủ đoàn (15 khách người lớn trở lên) thì đoàn sẽ khởi hành đúng lịch trình. Nếu số lượng đoàn dưới 15 khách, Công Ty sẽ có trách nhiệm thông báo cho khách trước ngày khởi hành 4 ngày và sẽ thỏa thuận lại ngày khởi hành mới, hoặc hoàn trả lại toàn bộ số tiền khách đã đăng ký trước đó.</p>

    <p>Đối với khách hàng từ 70 tuổi đến dưới 75 tuổi yêu cầu ký cam kết sức khỏe với Công Ty chúng tôi trước khi đi tour. Khuyến khích có người thân dưới 60 tuổi (đầy đủ sức khoẻ) đi cùng.</p>

    <p>Bảo hiểm du lịch không áp dụng cho khách hàng từ 75 tuổi trở lên (không có bảo hiểm tử vong do tai nạn, bệnh nền, bệnh tiềm ẩn, v.v...) nên yêu cầu khách hàng phải có giấy xác nhận đầy đủ sức khoẻ để đi du lịch nước ngoài do bác sĩ cấp và giấy cam kết sức khỏe với Công Ty chúng tôi trước khi đi tour. Khuyến khích có người thân dưới 60 tuổi (đầy đủ sức khoẻ) đi cùng. Nếu có bất cứ sự cố nào xảy ra trên tour, công ty du lịch sẽ không chịu trách nhiệm dưới mọi tình huống.</p>
    
<p>Trường hợp quý khách đăng ký tour trọn gói nhưng không khởi hành bay cùng đoàn chặng đi (no-show 1 chiều) thì sẽ không sử dụng được chặng về cùng với đoàn. Mà phải đặt lại vé mới hoàn toàn.</p>

<p>Trường hợp quý khách bị dương tính Covid tại Thái Lan cần phải nhập viện điều trị, quý khách vui lòng thanh toán trước, sau đó giữ lại toàn bộ hóa đơn bệnh viện, bảo hiểm sẽ chi trả lại. Bảo hiểm không chi trả cho trường hợp quý khách tự ý cách ly tại khách sạn và tự điều trị.</p>

<p>Đối với khách Việt Kiều, khách nước ngoài phải có visa tái nhập Việt Nam nhiều lần hoặc miễn thị thực mang đi theo tour.</p>

<p>Quý khách có nhu cầu cần xuất hóa đơn VAT vui lòng cung cấp thông tin xuất hóa đơn cho nhân viên bán tour khi ngay khi đăng ký hoặc trước khi thanh toán hết, không nhận xuất hóa đơn sau khi tour đã kết thúc.</p>

<p>Quý khách vui lòng đọc kỹ chương trình, giá tour, các khoản bao gồm cũng như không bao gồm trong chương trình, các điều kiện hủy tour trên biên nhận đóng tiền.</p>

<p>Chương trình tour là du lịch trọn gói kết hợp tham quan mua sắm, quý khách không tự ý tách đoàn dưới bất kỳ hình thức nào, các dịch vụ không sử dụng sẽ không được hoàn lại. Tùy vào từng trường hợp tách đoàn, quý khách phải báo trước với công ty ngay tại thời điểm đăng ký tour để được xem xét và chịu phí theo quy định (phí này sẽ không được hoàn lại) Trường hợp quý khách không được xuất cảnh hay nhập cảnh vì lý do cá nhân hoặc do cơ quan hải quan sở tại từ chối xuất cảnh hay nhập cảnh. Công ty du lịch sẽ không chịu trách nhiệm và sẽ không hoàn trả tiền tour. Quý khách dưới 18 tuổi phải có Bố Mẹ hoặc người nhà trên 18 tuổi đi cùng. Trường hợp đi với người nhà phải nộp kèm giấy ủy quyền được chính quyền địa phương xác nhận (do Bố Mẹ ủy quyền dắt đi tour). Khách mang quốc tịch Đài Loan, khi xin visa thái cấp tại sân bay Thái Lan vui lòng mang đầy đủ hồ sơ sau: vé máy bay khứ hồi SGN – BKK – SGN và vé máy bay trở về Đài Loan, 02 tấm hình hình 4x6cm (phông trắng), sao kê ngân hàng 03 tháng tài khoản cá nhân gần nhất, tờ khai xin visa Thái Lan. Các trường hợp bất khả kháng công ty không chịu trách nhiệm trước khách hàng về những thay đổi hoặc hủy bỏ vì những lý do khách quan và chủ quan như: Động đất, núi lửa, bão gió, chiến tranh, đình công, biểu tình, khủng bố, rối loạn chính trị, dịch bệnh..Các giải pháp hoặc đền bù (nếu có) sẽ phụ thuộc vào Nhà cung cấp dịch vụ liên quan.</p>
[/tab]
[/tabgroup]'); ?>
        
	</div><!-- .summary -->
	<div class="lich-khoi-hanh">
            <br />
            <h3 class="lich-khoi-hanh-tk"><i class="fa-solid fa-plane"></i> LỊCH KHỞI HÀNH THAM KHẢO</h3>
            <div class="table-lkh">
                <table>
                <tr>
                    <th>Ngày đi</th>
                    <th>Ngày về</th>
                    <th>Chuyến bay đi</th>
                    <th>Chuyến bay về</th>
                    <th>Khách sạn</th>
                    <th>Giá</th>
                </tr>
                <?php
                    if ($lich_khoi_hanh && count($lich_khoi_hanh) > 0) {
                        foreach($lich_khoi_hanh as $item) {
                            echo "<tr>";
                            echo "<td>". $item->ngay_di . "</td>";
                            echo "<td>". $item->ngay_ve . "</td>";
                            echo "<td>". $item->chuyen_bay_di . "</td>";
                            echo "<td>". $item->chuuyen_bay_ve . "</td>";
                            echo "<td>". $item->khach_san . "</td>";
                            echo "<td class='gia-tour-lkh'>". $item->gia . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            </div>
        </div>
	<div id="product-sidebar" class="mfp-hide">
		<div class="sidebar-inner">
			<?php
				do_action('flatsome_before_product_sidebar');
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				if (is_active_sidebar( 'product-sidebar' ) ) {
					dynamic_sidebar('product-sidebar');
				} else if(is_active_sidebar( 'shop-sidebar' )) {
					dynamic_sidebar('shop-sidebar');
				}
			?>
		</div><!-- .sidebar-inner -->
	</div>

</div><!-- .row -->
</div><!-- .product-main -->

<div class="product-footer">
	<div class="container">
		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div><!-- container -->
</div><!-- product-footer -->
</div><!-- .product-container -->
