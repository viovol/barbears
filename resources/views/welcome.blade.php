<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <div class="bakcground-wrap">
          <div class="embed-responsive embed-responsive-16by9">
            <video id="video-bg-element" autoplay loop muted preload="auto">
              <source  src="{{asset('video\video1.mp4')}}" type="video/mp4">
            </video>
          </div>

        </div>
      </div>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <h1>Welcome to barber shop</h1>
          <a href="{{route('home')}}"  class="btn btn-default ">Start Shopping</a>
        </div>
      </div>
    </div>


  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
