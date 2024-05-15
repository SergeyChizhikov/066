<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Вход / Регистрация</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Главная</a></li>
						<li class="breadcrumb-item active" aria-current="page">Вход / Регистрация</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Еще не завели аккаунт?</h4>
						<p>Зарегистрируйтесь сегодня и получите приветственные бонусы</p>
						<a class="button button-account" href="/register">Регистрироваться</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Вход в кабинет</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Вспомните пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Вспомните пароль'">
						</div>
						<p id="info" style="color: red;"></p>
						<div class="col-md-12 form-group">
							<button type="submit" class="button button-login w-100">Авторизоваться</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->

<!-- Модальное окно -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Успешная авторизация.</h5>
			</div>
			<div class="modal-body">Вы будете перенаправлены на страницу личного кабинета через 3 секунды.</div>
			<div class="modal-footer">Удачных покупок!</div>
		</div>
	</div>
</div>
<!-- Модальное окно -->

<script>
	async function sendForm(form) {
		let formData = new FormData(form);

		let response = await fetch("authUser", {
			method: "POST",
			body: formData,
		});
		let message = await response.json();
		if (message.result == "denied") {
			info.innerText = "Неверный логин или пароль";
		} else if (message.result == "ok") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "/users/profile";
			}, 3000);
		} else {
			alert("Неизвестная ошибка");
		}
	}
</script>
