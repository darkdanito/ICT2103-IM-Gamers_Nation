<?php require_once('../../../protected/team11/config_grp.php');
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                    $error = mysqli_connect_error();
                    if($error != null){
                        $output = "<p>Unable to connect to database<p>".$error;
                        exit($output);
                            }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

