<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student' Website</title>
    <!-- Core CSS - Include with every page -->
    <link href="/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/css/font-awesome.css" rel="stylesheet" />
    <link href="/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
      <link href="/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back" style = "background-color:gray;" >

    <div class="container" >
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
               
              
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>  
                    <div class="panel-body">
                   
               
                  
                      @if(count($errors) > 0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                             <strong>Error !</strong> 
                             {{$error}}
                        @endforeach
                         </div>
                    @endif

                        <form action ="/" method="POST">
                        {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                     <input class="form-control" type="text" placeholder ="Username" name = "log-usr" required autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder = "Password" name = "log-pwd" required autocomplete="off"/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                             
                            </fieldset>
                               <!-- Change this to a button or input when using this as a form -->
                                <button type ="submit"  class="btn btn-lg btn-success btn-block"/>Login</button>
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="/plugins/jquery-1.10.2.js"></script>
    <script src="/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
