<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<title>@yield('title')</title>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{url('assets/css/global-header.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/global-footer.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/accesibility.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/index.css')}}">
	<link rel="stylesheet" href="./assets/css/contact-page.css" />
</head>
<body class="scroll-bar">
	<div id="loader">
		<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
			<path fill="#d4af37" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
				<animateTransform 
					attributeName="transform" 
					attributeType="XML" 
					type="rotate"
					dur="1s" 
					from="0 50 50"
					to="360 50 50" 
					repeatCount="indefinite" />
		</path>
		</svg>
	</div>
   <header>
      <div class="header-container">
         <nav class="header-nav-bar">
				<div class="">
					<h1><a class="header-nav-link" href="{{route('home')}}">Lestari Kost</h1></a>
				</div>
				<ul class="header-nav-lists">
					<li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{route('pesan')}}">Pesan</a></li>
				</ul>
            
            <div class="header-hamburger-icon">
               <div class="header-hamburger-line-1"></div>
               <div class="header-hamburger-line-2"></div>
               <div class="header-hamburger-line-3"></div>
            </div>
         </nav>
      </div>
	</header>

	@yield('content')

	
	<footer class="footer">
		<div class="footer-container">
			<nav class="footer-nav">
				<div class="footer-description">
					<h3 class="footer-description-title">Lestari Kost</h3>
					<p>Kenyamanan adalah semboyan kami</p>
				</div>
				<div class="footer-contact-us">
					<h3 class="footer-description-title">Kontak Kami</h3>
					<p class="footer-description-detail">
						<img src="./assets/img/phone.svg" class="footer-description-icon" alt="star hotels phone number"> 
						<span>
					 082118480955</span></p>
					<p class="footer-description-detail">
						<img src="./assets/img/mail.svg" class="footer-description-icon" alt="star hotels email">
						<span>lestarikost@gmail.com</span> </p>
				</div>
				<div class="footer-follow-us">
					<h3 class="footer-description-title">Ikuti Kami</h3>
					<ul class="footer-follow-us-lists">
						<li class="follow-us-list">
							<a href="">
								<img src="{{url('assets/img/facebook.svg')}}" alt="star hotels facebook page">
							</a>
						</li>
						<li class="follow-us-list">
							<a href="">
								<img src="{{url('assets/img/twitter.svg')}}" alt="star hotels twitter page">
							</a>
						</li>
						<li class="follow-us-list">
							<a href="">
								<img src="{{url('assets/img/instagram.svg')}}" alt="star hotels instagram page">
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</footer>
	<script defer async>
		(() => {
			const loader = document.getElementById('loader');
			const scrollBar = document.getElementsByClassName('scroll-bar')[0];
			window.addEventListener('load', () => {
				loader.classList.add('none');
				scrollBar.classList.remove('scroll-bar')
			});
		})();
	</script>
	<script  defer async src="{{url('assets/js/toggleHamburger.js')}}"></script>
</body>
</html>