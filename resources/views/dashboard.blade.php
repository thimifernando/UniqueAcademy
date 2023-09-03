@extends('layouts.app') 
 @section('title', 'Dashboard') 
<head>


</head>



@section('content')
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f2f2f2;">

  <header style="background-color: #333; color: #fff; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
 
    <h1 style="margin: 0;"></h1>
    <nav>
      <ul style="list-style-type: none; margin: 0; padding: 0; display: flex;">
        
      </ul>
    </nav>
    
  </header>
  
  <main style="padding: 20px; max-width: 800px; margin: 0 auto;">

 
  <h2 style="color: #358C0B; font-size: 50px; text-align: center;">Welcome to Unique Academy</h2>

    <!-- <p>Here you can access all of your Classes, Assignments, and grades in one place.</p> -->

    <pre>
    <style>
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}
		
		.box {
			flex: 1 0 200px;
			height: 250px;
			margin: 10px;
			background-color: #ccc;
			text-align: center;
			line-height: 300px;
			font-size: 24px;
			border-radius: 10px;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      width: 900px;
      height: 400px;
      border: 1px solid blue;
		}
		
		.box:nth-child(odd) {
			background-color: #eee;
		}

  
    
	</style>
</head>
<body>
	<div class="container">
  <div class="box" style="background-image: url('assets/img/DB.jpg');">

</div>
	
	</div>

  
</body>
</pre>
    
    <!-- <iframe src="https://calendar.google.com/calendar/embed?src=yourcalendar%40gmail.com&ctz=America%2FNew_York" style="border: 0" width="300" height="300" frameborder="0" scrolling="no"></iframe> -->
  </main>
        
  
  <footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; font-size: 25px;">
   <!-- Footer Start -->

   <footer style="background-color: #333; color: #fff; text-align: center; padding: 20px;">
  <div style="display: flex; justify-content: space-between; align-items: center;">
    <div class="text-left">
      <p style="margin: 0;">Contact us:</p>
      <li style="display: flex; align-items: center;">
  <img src="{{'assets/img/email.png'}}" width="20" height="20" style="margin-right: 10px;">
  <span style="font-size: 20px;">uniqueacademy@gmail.com</span>
</li>

<li style="display: flex; align-items: center;">
	<img src="{{'assets/img/phone.png'}}" width="20" height="20" style="margin-right: 10px;">
	<span style="font-size: 20px;">0375678387</span>
</li>

<li style="display: flex; align-items: center;">
	<img src="{{'assets/img/location.png'}}" width="20" height="20" style="margin-right: 10px;">
	<span style="font-size: 20px;">Pallandeniya, Kurunegala</span>
</li>

      </ul>
    </div>
    <div>
      <p style="margin: 0;">Follow us:</p>
      <ul style="list-style: none; display: flex; padding-left: 0;">
      <li style="margin-right: 10px;">
	<a href="https://www.facebook.com/" style="color: #fff; text-decoration: none;">
		<img src="{{'assets/img/fb.png'}}" alt="Facebook" width="60" height="60">
	</a>

	<a href="https://www.instagram.com/" style="color: #fff; text-decoration: none;">
		<img src="{{'assets/img/ins.png'}}" alt="Instagram" width="50" height="50">
	</a>

<a href="https://www.linkedin.com/" style="color: #fff; text-decoration: none;">
		<img src="{{'assets/img/link.png'}}" alt="linkedin" width="50" height="50">
	</a>

      </ul>
    </div>
  </div>
  <p style="margin: 10px 0 0 0;">&copy; 2023.Sllit.G8</p>

 <!-- Back to Top 
 <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a> -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
  
  
</body>



@endsection