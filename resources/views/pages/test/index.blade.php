<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    #test{color: red;font-size: 30px}
  </style>
</head>
<body>
  <div>
    <p id="test" >
      hello
    </p>
    <button id="getData_btn">GetData</button>
  </div>
    <script>
      $('#getData_btn').click(()=>{
        $.ajax({
                type: "GET",
                url: `https://jsonplaceholder.typicode.com/posts/1`,
                data: '',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result)=>{
                  $('#test').html(result.body)
                  console.log(result)
                }
            });
      })
      
  </script>
</body>
</html> 
 
