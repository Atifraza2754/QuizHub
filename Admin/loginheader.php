 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AMS</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="/bootstrap-5.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="user_style.css">
  
<style>
  /* Basic styling */
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url(banner.png);
    width: 100%;
    height:100vh;
    justify-content: space-around;
    background-position: cover;
    background-repeat: no-repeat;
  }
  .header {
    background-color: #333;
    color: #fff;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .logo {
    font-size: 20px;
    margin-left: 20px;
  }
  .title {
    flex-grow: 1; /* Allows the title to grow and center itself */
    text-align: center;
  }

    .text-center{
        padding: 50px;
        background-color: greenyellow;

    }
  /* Custom styles for footer */
  .footer {
      background-color: #343a40;
      color: #ffffff;
      padding: 20px 0;
      width: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
      transition: transform 0.3s ease-out; /* Add transition for smooth movement */
      z-index: 9999; /* Ensure footer stays on top of other content */
    }

    /* Centering text */
    .footer p {
      text-align: center;
      margin-bottom: 0; /* Remove default margin */
    }

    /* Ensure content doesn't hide behind footer */
    body {
      padding-bottom: 70px; /* Adjust height based on footer height */
    }

    .footer-hidden {
      transform: translateY(100%); /* Move footer out of viewport */
    }

</style>
</head>
<body>

<div class="header">
  <div class="logo"> <img src="AMS.png"  width="60px" height="60px" style="border-radius:40px 40px"></div>
  <div class="title"><h2>Attendance Management System</h2></div>

</div>


</body>
</html>
