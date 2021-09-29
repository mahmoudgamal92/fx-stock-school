<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
body {
  text-align: center;
  font-family: Oswald;
  margin-top: 50px;
}

.main-container {
  width: 500px;
  margin: 0 auto;
  border: 1px solid lightgrey;
  border-radius: 5px;
  background-color: #f0f0f0;
}

.top-container {
  height: 280px;
  background-color: #000026;
}

i.bigger-size {
  font-size: 280px;
  color: white;
}

.bottom-container {
  margin-top: 30px;
}

button {
  font-family: Roboto;
  background-color: #f0f0f0;
  border-radius: 15px;
  padding: 15px;
  border: 3px solid #000026;
  color: #555;
  margin-bottom:40px;
  margin-top:40px

}

button:hover {
  background-color: #000026;
  color: white;
  cursor: pointer;
}



p {
  font-size: 20px;
  color: #555;
}
    </style>
<div class="main-container">
  <div class="top-container">
    <i class="fa fa-check-circle-o bigger-size" aria-hidden="true"></i>
  </div>

  <div class="bottom-container">
    <h3>لقد تم اشتراكك بنجاح في الباقة المجانية</h3>

    <button onclick="location.href='index.php'"> 
        <span>
        العودة للصفحة الرئيسية
        </span>
    </button>
  </div>
</div>