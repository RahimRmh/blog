<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form</title>

</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <form action="/mail" method="post" >
        @csrf
       
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <input type="submit" value="Send Email">
    </form>
</div>

</body>
</html>
