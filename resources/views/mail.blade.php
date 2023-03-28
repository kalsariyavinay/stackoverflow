<!DOCTYPE html>
<html>
<head>
    <title>Welcome to My Website</title>
</head>
<body>
    <h1>Welcome, {{Auth::user()->name }}!</h1>

    <p>Thank you for registering on our website. We're excited to have you on board!</p>

    <p>If you have any questions, please don't hesitate to contact us.</p>
     
    <img src="{{   $messages->embed(public_path(). '/uploads/companylogo/1676886306.png')}}" alt="My Website Logo">

    {{-- <img path="C:\xampp\htdocs\xampp\stackoverflow\public\uploads\companylogo\1676886306.png" alt="Image">    <p>Best regards,</p> --}}
    <p>The My Website Team</p>
</body>
</html>
