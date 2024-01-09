    <div class="section1">
        <h4>Featured Products</h4>
    </div>
    <div id="Gallery-images">

        <?php foreach ($rows as $row):

            $Itemid = $row["Item_id"];
            $item_name = $row["item_name"];
            $Price = sprintf("%1.2f", $row["Price"]);
            // $Sale_price = ($row["Sale_price"] == 1) ? true: false;

            $Sale_price = $row["Sale_price"];

            $Description = $row["Description"];
            $Featured = $row["Featured"];


            $PhotoPath = "images/SportsImages/".$row["PhotoPath"];
            // if(file_exists("images\SportsImages" . $row["PhotoPath"]) && strlen($PhotoPath["PhotoPath"]) > 0 )
            // {
            //     $PhotoPath = "images\SportsImages" . $row["PhotoPath"];
            // }

            // if($Featured == 1):
        ?>

        <a href="DisplaySingleItem.php?id=<?= $Itemid ?>"><section class="Products">
        <div class="Item-1">
            <img src="<?=$PhotoPath?>" alt="<?=$PhotoPath?>" width="150" height="150">
            <p><?php if($Sale_price):?><span class="price">$<?=$Sale_price?>.00</span> <?php endif; ?> <br/><span class="was-price"> $<?=$Price?></span></p>
            <section>
                <p class="Txt"><?=$item_name?></p>
            </section>
        </div>
    </section></a>

        <?php
        // endif;
        endforeach;
        ?>

    </div>
