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
                        <a class="btn ButtonClose" href="index.php">
                            <img src="./images/ic-close.svg" alt="">
                        </a>
                        <img class="ImgDetail" src="./images/ro.gif" alt="">
                        <p class="Text-wt-detail">
                            Oxygen Water
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            น้ำดื่มออกซิเจน
                            คือน้ำดื่มที่มีค่าออกซิเจนที่ละลายอิ่มตัวในน้ำสูงกว่าน้ำดื่มทั่วไป ด้วยวิธี Micro Nanobubble Technology เพิ่มปริมาณก๊าช
                            Oxygen ในเลือด ช่วยเติมความสดชื่น กระปรี้กระเปร่า ช่วยเพิ่มการไหลเวียนของโลหิต ลดความอ่อนเพลียจากการทำงานหนัก
                        </p>
                    </div>
                    <div class="ColPrice">
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <input type="number" class="input-box TextNumber" value="1" min="1" max="10">
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>

                        <a href="select-payment.php" class="btn ButtonDone">
                            DONE
                        </a>
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