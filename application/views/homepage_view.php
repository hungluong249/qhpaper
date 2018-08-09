<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section id="fullpage">
	<div class="section" id="cover">

		<div id="giant-round-square"></div>

		<div class="container">
			<div class="row">
				<div class="left col-md-4 col-xs-12">
					<h4 class="sub-heading">Quoc Hung Paper</h4>
					<h1 class="big-heading">
						Khám phá<br/>các loại<br/>giấy mỹ thuật<br/>cao cấp
					</h1>
				</div>

				<div class="right col-md-8 col-xs-12">
					<img src="<?php echo site_url('assets/img/') ?>" alt="cover image">
				</div>
			</div>

		</div>
	</div>

	<div class="section" id="about">
		<div class="container-fluid">
			<div class="row">
				<div class="left col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 col-xs-12">
							<img src="<?php echo site_url('assets/img/logo.png') ?>" class="center-block" alt="Quoc Hung Paper Logo" width="100">
							<p class="paragraph">
								<b>Được thành lập từ năm 2012, Quốc Hưng Paper đã phát triển từ cửa hàng giấy nhỏ để trờ thành một đại lý giấy với nhiều mẫu mã và chủng loại.</b>
							</p>
							<p class="paragraph">
								Sự thành công của Quốc Hưng Paper bắt đầu từ chất lượng. Ngoài những dịch vụ đi theo Quốc Hưng Paper mang đến cho khách hàng, Quốc Hưng Paper làm việc với các khách hàng trong mọi giai đoạn của một dự án, ý tưởng ban đầu của họ và lựa chọn màu sắc với độ dày chính xác, kết cấu và trọng lượng của giấy mong muốn của họ để mang đến những sản phẩm hoàn hảo. Mọi thứ đều có thể.
							</p>
							<p class="paragraph">
								"Tại Quốc Hưng Paper, chúng tôi cam kết cung cấp dịch vụ đặc biệt cho tất cả khách hàng của chúng tôi. Để đạt được điều này, chúng tôi cam kết làm việc chặt chẽ với khách hàng của chúng tôi và liên tục tìm cách cải thiện chất lượng của giấy cũng như dịch vụ của chúng tôi để cung cấp cho khách hàng những gì tốt nhất."
							</p>
						</div>
					</div>
				</div>

				<div class="right col-sm-6 col-xs-12" style="background-image: url('https://images.unsplash.com/photo-1523742810066-4e36f7952bd2?ixlib=rb-0.3.5&s=83c30310f365d72e7b30124d469d0f11&auto=format&fit=crop&w=1351&q=80')">
					<div class="overlay"></div>
					<div class="information">
						<div class="row">
                            <?php

                            $value = array(
                                array( "04" , "Loại giấy"),
                                array( "43" , "Định lượng"),
                                array( "57" , "Khách hàng"),
                                array( "100%" , "Hài lòng")
                            );

                            ?>

                            <?php for ($key = 0; $key < count($value); $key++ ) { ?>
								<div class="item col-md-3 col-xs-6">
									<h1 class="big-heading"><?php echo $value[$key][0] ?></h1>
									<h4 class="sub-heading"><?php echo $value[$key][1] ?></h4>
								</div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section" id="product">
		<div class="slide">
			<div class="container">
				<div class="row">
					<div class="left col-sm-4 col-xs-6">
						<div class="head">
							<h1 class="big-heading">
								Wove Natural
							</h1>
						</div>
						<div class="body">
							<div class="item">
								<h4 class="sub-heading">
									Tính chất
								</h4>
								<ul>
									<li>
										<div class="square"></div>
										<p>Sần</p>
									</li>
									<li>
										<div class="square"></div>
										<p>Không bóng</p>
									</li>
								</ul>
							</div>

							<div class="item">
								<h4 class="sub-heading">
									Màu sắc
								</h4>
								<ul>
									<li>
										<div class="square"></div>
										<p>White</p>
									</li>
									<li>
										<div class="square"></div>
										<p>Ivory</p>
									</li>
								</ul>
							</div>

							<div class="item">
								<h4 class="sub-heading">
									Định lượng
								</h4>
								<ul>
									<li>
										<p>180gsm</p>
									</li>
									<li>
										<p>250gsm</p>
									</li>
									<li>
										<p>300gsm</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slide">
			<div class="container">
				<div class="row">
					<div class="left col-sm-4 col-xs-6">
						<h1 class="big-heading">
							Wove
							Natural
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section" id="application">
		<div class="container">
			<div class="row head">
				<div class="left col-sm-6 col-xs-12">
					<h1 class="big-heading">
						Ứng dụng từ giấy<br/>mỹ thuật cao cấp
					</h1>
				</div>

				<div class="right col-sm-6 col-xs-12">
					<p class="paragraph">
						"Tại Quốc Hưng Paper, chúng tôi cam kết cung cấp dịch vụ đặc biệt cho tất cả khách hàng của chúng tôi. Để đạt được điều này, chúng tôi cam kết làm việc chặt chẽ với khách hàng của chúng tôi và liên tục tìm cách cải thiện chất lượng của giấy cũng như dịch vụ của chúng tôi để cung cấp cho khách hàng những gì tốt nhất."
					</p>
				</div>
			</div>

			<div class="row body">
				<div class="owl-carousel">
					<?php for ($i = 0; $i < 7; $i++){ ?>
					<div class="item">
						<div class="inner">
							<div class="mask">
								<img src="https://images.unsplash.com/photo-1487700066891-e2af21f110b1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=16552383ed13dc1b76de49299c0ae478&auto=format&fit=crop&w=634&q=80" alt="application 01">

								<div class="content">
									<h3>
										Application
									</h3>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section" id="contact">
		<div class="container">
			<div class="row map">
				<div class="col-xs-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1861.8435094098506!2d105.7986044516348!3d21.045205598482745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b63f772a1%3A0x407979e25665fa63!2zMTQgSG_DoG5nIFPDom0sIE5naMSpYSDEkMO0LCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1533785364197" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>

			<div class="row body">
				<div class="left col-md-4 col-sm-6 col-xs-12">
					<h3 class="title">
						Liên hệ với chúng tôi
					</h3>

					<address>
						<strong>Địa chỉ</strong> <br>
						14 Hoàng Sâm - Nghĩa Đô - Cầu Giấy - Hà Nội
					</address>

					<address>
						<strong>Điện thoại</strong> <br>
						<a href="tel:84 24 3791 7941">84 24 3791 7941</a>
					</address>

					<address>
						<strong>Hotline</strong> <br>
						<a href="tel:84 902 257 472">84 902 257 472</a> (Chị Hạnh)
					</address>

				</div>

				<div class="right col-md-8 col-sm-6 col-xs-12">
					<h3 class="title">
						Yêu cầu tư vấn về giấy mỹ thuật cao cấp
					</h3>

                    <?php
                    echo form_open_multipart('homepage/get_data_to_send_mail', array('class' => 'form-horizontal'));
                    ?>

					<div class="row">
						<div class="form-group col-md-6 col-xs-12">
                            <?php
                            echo form_error('register_name');
                            echo form_input('register_name', set_value('register_name'), 'class="form-control" id="register_name" placeholder="Họ và tên (*)"');
                            ?>
						</div>

						<div class="form-group col-md-6 col-xs-12">
                            <?php
                            echo form_error('register_address');
                            echo form_input('register_address', set_value('register_address'), 'class="form-control" id="register_address" placeholder="Địa chỉ (*)"');
                            ?>
						</div>

						<div class="form-group col-md-6 col-xs-12">
                            <?php
                            echo form_error('register_mail');
                            echo form_input('register_mail', set_value('register_mail'), 'class="form-control" id="register_mail" placeholder="Nhập Email của bạn (*)"');
                            ?>
						</div>

						<div class="form-group col-md-6 col-xs-12">
                            <?php
                            echo form_error('register_phone');
                            echo form_input('register_phone', set_value('register_phone'), 'class="form-control" id="register_phone" placeholder="Nhập số điện thoại của bạn (*)"');
                            ?>
						</div>

						<div class="form-group col-xs-12">
                            <?php
                            echo form_error('register_message');
                            ?>
							<textarea class="form-control" rows="4" id="register_message" placeholder="Để lại lời nhắn đến với chúng tôi ..."></textarea>
						</div>

						<div class="col-xs-12">
                            <?php echo form_submit('submit', 'Gửi đăng ký',  'class="btn btn-primary"'); ?>
						</div>
					</div>
                    <?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

