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
                            Alkiline Water
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            น้ำดื่มอัลคาไลน์ (Alkiline Water)
                            น้ำอัลคาไลน์ หรือน้ำด่าง น้ำดื่มที่มีค่าความเป็นด่าง รวมถึงมีแว่ธาตุที่ร่างกายต้องการผสมอยู่อย่างมากมาย น้ำอัลคาไลน์เป็น
                            น้ำที่มีโมลกุลขนาดล็ก ทำให้ง่ายที่ร่างกายจะทำการดูดซึมน้ำเข้าไปใช้ประโยขน์ยังส่วนต่างๆ จึงทำให้น้ำด่างมีประโยชน์ต่อสุขภาพมากกว่าน้ำธรรมดา อีกทั้งยังมีความเป็นกรดค่างที่ให้สมดุล พอเหมาะกับร่างกายของมนุษข์ จึงเข้าไปช่วยป้องกันร่างกาย
                            จากการทำลายของกรดส่วนเกินที่เป็นต้นเหตุของโรคร้ายต่างๆ และช่ายฟื้นฟูร่างกายด้วยการชะล้างของเสียลงลึกถึงระดับเซลล์
                            ช่วยต่อต้านอนุมูลอิสระ ทำให้ร่างกายสร้างภูมิคุ้มกันได้ง่ายและแเข็งแรงมากขึ้นนั่นเอง
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