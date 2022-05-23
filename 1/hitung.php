<?php
                                if(isset($_POST['calculate'])){
                                    $reliabilitywd=0;
                                    $shaped=$_POST['shaped'];
                                    $scaled=$_POST['scaled'];
                                    $timewd=$_POST['timewd'];
                                    
                                 {
                                     $reliabilitywd = exp((-1*pow($timewd/$scaled,$shaped)));
                                    echo $reliabilitywd;
                                 }

                                   } 
                                ?>