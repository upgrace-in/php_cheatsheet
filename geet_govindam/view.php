<?php

require 'html/header.html';

?>     
    <div class="col-md-12 cn mx-auto text-center main_page">
        <div class="col-md-9 mx-auto text-left" style="padding: 40px;">
            <?php
                require_once 'db_scripts/connect_to_db.php';
                $sno = $_GET['part'];
                mysqli_set_charset( $con, 'utf8');
                $retrieve = mysqli_query($con, "SELECT * FROM sno WHERE part='$sno'");
                if (mysqli_num_rows($retrieve) > 0) {
                    $i=0;     
                    while($row = mysqli_fetch_array($retrieve)) {
                        echo '<h1>Part '.$row['part'].'</h1><hr><Br>';
            ?>
            <audio controls="" preload="auto">
                <source src="<?php echo $row['music']; ?>"> 
            </audio>
            <?php
                        // music ---> https://drive.google.com/uc?id=1dTNJvLDeR_HwJ4MLMJaNfLkOG-x_cnov
                        // file ---> https://drive.google.com/uc?id=15LO75khFzIya5Og7eIms0vi6zirkEVp
                        echo '<br><Br><br><div class="bhajan mx-auto text-left"><p style="font-family: "Baloo 2 !important;"">'.nl2br(stripslashes($row['bhajan'])).'</p></div>';
                        $i++;
                    }
                }
                else{
                    echo "No Data";
                }
            ?>
        </div>
    </div>
<?php

    require 'html/footer.html';

?>