<?php
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
$new = 0;
if(isset($_SESSION['cart'])){
    
    $new = count($_SESSION['cart']);
}

?>
 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-fixed-top" style="opacity:0.8;" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Makan Express</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1"  >
                <ul class="nav navbar-nav ">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#SutdCanteen">SUTD</a>
                    </li>
                    <li>
                        <a href="#SitCafe">SIT</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="<?php if(empty($_SESSION["login"])) echo '#loginModal' ?><?php if(isset($_SESSION["login"])) echo '#profileModal' ?>"> 
                            <?php if(empty($_SESSION["login"])) echo 'Login' ?><?php if(isset($_SESSION["login"])) echo 'Profile' ?></a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#CartModal">Cart<span class="badge"><?php echo $new ?></span></a>
                    </li>
                    </form>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>