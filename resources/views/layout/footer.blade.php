<head>
	<link rel="stylesheet" href="https://kit.fontawesome.com/19154f9dea.css" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
	.feet{
	background-color: #0a132c;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
	animation: slidefoot 0.5s ease-in-out forwards;
	color: #ffffff;
   
	}
	@keyframes slidefoot {
		0% {

			transform: translateY(100%);

		}

		100% {

			transform: translateY(0%);

		}
	}

	p{
	font-size: 15px;
	font-weight: 500;
	}
	.sci {
	margin-top: 20px;
	display: flex;
	}

	.sci li {
		list-style: none;
	}

	.sci li a {
		display: inline-block;
		width: 40px;
		height: 40px;
		background: white;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-right: 10px;
		text-decoration: none;
		border-radius: 100%;
	}

	.sci li a:hover {
		background: #020B47;
	}

	.sci li a .fa {
		color: #020B47;
		font-size: 20px;
	}

	.sci li a .fa:hover {
		color: #ffffff;
	}
	.tr	{
		font-size: 25px;
	}
	a{
		color: #ffffff;
		font-size: 14px;
	}
	small{
		color: #ffffff;
		
	}
	.dark-mode .sci li a {
		background: white;
	}

	.dark-mode .sci li a:hover {
		background: #252525;
	}

	.dark-mode .sci li a .fa {
		color: #252525;
	}

	.dark-mode .sci li a .fa:hover {
		color: #ffffff;
	}
	.dark-mode a{
		color: #ffffff;
	}
	.dark-mode small{
		color: #ffffff;
		
	}
	.dark-mode i {
		color: #ffffff;
	}
	.cy{
		text-align: center;
	}
</style>
<body>

<footer>
	<div class="feet">
	<div class="container pt-5">
	<div class="row">
		<div class="col-md-4 pt-3">
			<h5 class="tr">DVoteE</h5>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur accusantium provident dolor, at possimus natus repellat quaerat ea corrupti. Velit repellat possimus.</p>
			<ul class="sci">
				<li><a href="https://instagram.com/dafazan_"><i class="fa fa-brands fa-square-instagram"></i></i></a></li>
				<li><a href="https://twitter.com/Dafazanlbs"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://dafazan.my.id"><i class="fa fa-brands fa-github"></i></a></li>
			</ul>
		</div>
		<div class="col-md pt-3">
			
		</div>
		<div class="col-md pt-3">
			<h5>Useful Links</h5>
			<a href="" style="text-decoration: none;">Karir</a>
				<br>
			<a href="" style="text-decoration: none;">Tentang Kami</a>
				<br>
			<a href="gallery.html" style="text-decoration: none;">Kontak Kami</a>
				<br>
			<a href="" style="text-decoration: none;">Servis</a>
		</div>
		<div class="col-md-3 pt-3">
			<h5>Contact Info</h5>
			<a href=""style="text-decoration: none;"><i class="fa fa-envelope-o" aria-hidden="true"></i> dafazan@outlook.com</a>
			<br>
			<a href="" style="text-decoration: none;"><i class="fa fa-phone" aria-hidden="true"></i> +62 858 6471 4906</a>
			<br>
			<a href="https://dafazan.my.id" style="text-decoration: none;"><i class="fa-solid fa-globe"></i> dafazan.my.id</a>
		</div>
	</div>
	</div>
	<div class="row pt-4">
		<div class="col-md"></div>
		<div class="col-md"><p class="text-center">Copyright &copy; Dafazan 2023 All Rights Reserved</p></div>
		<div class="col-md"></div>
	</div>
	</div>
</footer>
	<script src=" {{ asset('js/bootstrap.min.js') }}"></script>
	<script src=" {{ asset('js/script.js') }}"></script>
	<script src="https://kit.fontawesome.com/19154f9dea.js" crossorigin="anonymous"></script>
</body>