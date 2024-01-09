
<div class="DivDeskSection">
    <nav class="DivSecHide">
        <ul>
    <?php foreach ($rows as $row):
        $id = $row["Category_Id"];
        $name = $row["Category_name"];
     ?>
            <li class="NavItem1"><a href="home.php?id=<?=$id?>"> <?=$name?></a></li>
         <?php endforeach; ?>
     </ul>
 </nav>
</div>
