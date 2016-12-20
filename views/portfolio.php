<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>SYMBOL</th>
            <th>NAME</th>
            <th>SHARES</th>
            <th>PRICE</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody align="left">
        <?php
            foreach($positions as $position)
            {
                print("<tr>");
                print("<td>".$position["symbol"]."</td>");
                print("<td>". $position["name"] ."</td>");
                print("<td>". $position["shares"] ."</td>");
                print("<td>"."$". number_format($position["price"],2)."</td>");
                $total=$position["price"] * $position["shares"];
                print("<td>"."$". number_format($total,2) ."</td>");
                print("</tr>");
                
            }
            
        ?>
        <tr>
            <td colspan="4">CASH</td>
            <?php 
                print("<td>"."$". number_format($balance,2) . "</td>");
            ?>
        </tr>
        </tbody>
    </table>
      
</div>
