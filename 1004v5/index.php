<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/newcss.css" rel="stylesheet" >
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link href="css/newcss.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <title>Makan Express</title>

</head>

<body>
    
	<?php 
	
		/*	
			THe bugged HTTPS portion
		
            if (empty($_SERVER['HTTPS'])) 
			{
                header('Location: index.php');
            }	
		*/
	
        require_once('../../../protected/team11/config_grp.php');
		
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);;
        
		$error = mysqli_connect_error();
        if($error != null)
		{
            $output = "<p>Unable to connect to database 2<p>".$error;
            exit($output);
        }
        
		include 'header.inc.php';  
		include 'login_modal.inc.php';
		include 'cart_modal.inc.php';
		include 'profile_modal.inc.php';
		include 'ForgetPW_modal.inc.php';
		include 'menu_modal.inc.php';
		include 'ResetPW_modal.inc.php';
		include 'feedbk_modal.inc.php'; 
	?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
					<div class = "carousel" align="center">
                         <?php
                            $sql = "SELECT * FROM `chef`";    
                            if($result = mysqli_query($connection, $sql))
							{
                            	while($row = mysqli_fetch_assoc($result))
								{
                                	echo '<div><img class="img-responsive full-img1" data-lazy="'.$row['imgDir'].'"></div>';
                           		}  
                         	}
                         ?>
					</div>

                    <div id="SitCafe"></div>
                    
                    <h2 class="brand-before">
                        <small>
                        	Welcome to
						</small>
                    </h2>
                    
                    <h1 class="brand-name">
                    	Makan Express
                    </h1>
                    
                    <hr class="tagline-divider">
                    
                    <h2>
                        <small>
                        	By
                            <strong>
                            	Group Eleven
                            </strong>
                        </small>
                    </h2>
                    
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                        <h2  class="intro-text text-center brand-name">
                            Order your Food From SiT's iCafe Selections<br>
                        </h2>
                    <hr>
                        <div class="col-lg-12 text-center">
                            <div class = "carousel" align="center">
						<?php
                            
							$sql = "SELECT * FROM `menu` WHERE canteen = 'sutd'";    
                            
							if($result = mysqli_query($connection, $sql))
							{
								while($row = mysqli_fetch_assoc($result))
								{
									echo '<div><img class="img-responsive full-img" data-lazy="'.$row['imgDir'].'" alt="'.$row['menuID'].'"></div>';
								}  
							}    
						?>
							</div>
                    <hr class="visible-xs">
                </div>
            </div>
        </div>
    </div>
         <div id="SutdCanteen"></div>
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center brand-name">Order your Food FROM SUTD's Canteen<br></h2>
                    <hr>
                        <div class="col-lg-12 text-center">
                            <div class = "carousel">
						<?php
							
							$sql = "SELECT * FROM `menu` WHERE canteen = 'sit'";    
                            
							if($result = mysqli_query($connection, $sql))
							{
                            	while($row = mysqli_fetch_assoc($result))
								{
									echo '<div><img class="img-responsive full-img" data-lazy="'.$row['imgDir'].'" alt="'.$row['menuID'].'"></div>'; 
								}  
                         	}
						?>
                              </div>
                   
                    
                    <hr class="visible-xs">
                </div>
            </div>
        </div>
    </div>
        
    </div>
    <!-- /.container -->
    
    <?php include 'footer.inc.php';?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').slick({
                autoplay: false,
                dots: true,
                lazyLoad: 'ondemand',
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplaySpeed: 5000
            });
        });
    </script>
    <script>

$('.full-img').click(function() {
        var src = $(this).attr('src');
        var alt = $(this).attr('alt');
       var data = alt;
      
     //  alert(alt);
         //$('.showPic').attr('src', src);
        //$('.showPic').attr('alt', alt);
         // $('.tb1').attr('value', alt);
        //    $('#myModal1').modal('show');
          $.ajax({
              type: 'post',
              url: 'do_menu.php',
              data: 'id='+ alt,
              success: function(data){
              if(data){
            //  alert(data);
            //  $('body').append(data);    
              $("#myModal1").modal('show'); 
              $(".test").show().html(data);
          }
              },
              error: function(){
                  alert("fail");
              }
          });
     });
</script>

<?php


if(isset($_SESSION['error'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#loginModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['error']);
}

if(isset($_SESSION['forgetPWErr'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#ForgetPwModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['forgetPWErr']);
}


if(isset($_SESSION['recovery'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['recovery']);
}


if(isset($_SESSION['changepwsuccess'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['changepwsuccess']);
}


if(isset($_SESSION['changepwfail'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['changepwfail']);
}

if(isset($_SESSION['invoice'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['invoice']);
}

if(isset($_SESSION['noLogin'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['noLogin']);
}

if(isset($_SESSION['noCart'])){
echo '<script type="text/javascript">';
echo '$(window).load(function(){';
echo "$('#feedbackModal').modal('show');";
echo "});";
echo "</script>";
unset($_SESSION['noCart']);
}
?>

</body>

</html>
