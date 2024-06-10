<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php require('inc_header.php');
    $pageName = "index"; ?>
</head>

<body class="BodyDetail">

    <?php require('inc_topmenu.php'); ?>

    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="./images/logo.jpg" alt="">
        </div>

        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="detailwater-ro.php">
                            <img src="./images/ic-left-as.svg" alt="">
                        </a>
                        <img class="ImgDetail-Select" src="./images/ro.gif" alt="">
                        <p class="Text-wt-detail-Select">
                            R.O. Water
                        </p>
                        <div class="BoxCol-Price-Select">
                            <p class="TextPrice-Select-Bath">
                                price
                            </p>
                            <p class="Text-wt-detail me-4 ms-4">
                                5
                            </p>
                            <p class="TextPrice-Select-Bath">
                                bath
                            </p>
                        </div>
                        <p class="Text-Paymentopton">
                            Payment options
                        </p>
                        <div class="Div-Paymentoption">
                            <a href="push.php" class="btn Button-Paymentoption">
                                <img src="./images/coin-as.png" alt="">
                                CASH
                            </a>
                            <a href="qr-code.php" class="btn Button-Paymentoption">
                                <img src="./images/qr-as.png" alt="">
                                Qr CODE
                            </a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    </div>


    <?php require('inc_script.php'); ?>

    <?php require('inc_footer.php'); ?>

</body>

</html>