<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Verify Business</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 40px;
    }

    .header {
      background-color: #f66a00;
      padding: 20px;
      text-align: center;
    }

    .header h1 {
      color: #ffffff;
      margin: 0;
      font-size: 36px;
    }

    .header img {
      width: 100px;
      height: auto;
      margin-bottom: 20px;
    }

    .content {
      background-color: #ffffff;
      padding: 20px;
      text-align: left;
    }

    .content h2 {
      font-size: 24px;
      color: #333333;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 18px;
      color: #555555;
      margin-bottom: 20px;
      line-height: 1.5;
    }

    .content img {
      width: 200px;
      height: auto;
      display: block;
      margin: 0 auto;
      margin-bottom: 20px;
    }

    .btn {
      display: inline-block;
      background-color: #f66a00;
      color: #ffffff;
      padding: 12px 24px;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 20px;
    }

    .footer {
      background-color: #f66a00;
      padding: 10px;
      text-align: center;
      color: #ffffff;
      font-size: 14px;
    }

    .footer a {
      color: #ffffff;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>TopJobs</h1>
  </div>
  <div class="content">
    <h2>Kính Gửi, {{$details['name']}}</h2>
    <p>{{$details['Description']}}</p>
    <!-- <a href="#" class="btn">Button</a> -->
  </div>
  <div class="footer">
    <p>Copyright © Your Company {{date("Y")}}</p>
    <a href="#">Contact Us</a>
  </div>
</body>

</html>