
<fieldset>
    <form action="sell.php" method="post">
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option disabled selected value=" ">Symbol</option>
                <?php
                  
                  foreach ($symbols as $symbol)
                  {
                      print("<option value=". $symbol["symbol"].">");
                      print($symbol["symbol"]);
                      print("</option>");
                  }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-usd"></span>
                SELL
            </button>
        </div>
    </form>
</fieldset>
