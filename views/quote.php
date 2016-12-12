<div>
    <?php 
        $price= number_format($values["price"],4);
        print("Price for ". $values["name"]."(".$values["symbol"].")"." is $" .$price);
    ?>
</div>