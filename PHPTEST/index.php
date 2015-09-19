<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<body>

    <div class="container">
      

      <div class="jumbotron">
        <h1>Enter Product name</h1>
        
          <div class="col-lg-8">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search product by name">
          </div>
          <div class="col-lg-4">
              <button id="submit" class="btn  btn-success">Search</button>
          </div>
 
      </div>

      <div class="row">
          <div class="col-lg-6">
              <h1>User Friendly result</h1>
              <div id="display_result"></div>
                  
          </div>
        
     

        <div class="col-lg-6">
               <h1>JSON Result</h1>
            <div id="json-result">
            </div>
         
        </div>
      </div>

      <footer class="footer">
          <input type="hidden" id="njson">
        <p>Developer by osama bari for php test</p>
      </footer>

    </div> <!-- /container -->

<!--js include-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/custom.js" type="text/javascript">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</html>
