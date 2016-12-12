<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Type</th>
            <th>Symbol</th>
            <th>Date/Time</th>
            <th>Price</th>
            <th>Shares</th>
        </tr>
        </thead>
        <tbody align="left">
        <?php
            foreach($positions as $position)
            {
                print("<tr>");
                print("<td>".$position["type"]."</td>");
                print("<td>". $position["symbol"] ."</td>");
                print("<td>". date_format(date_create($position["time"]),"d-M-Y h:i")  ."</td>");
                print("<td>"."$". number_format($position["price"],2)."</td>");
                print("<td>". $position["shares"] ."</td>");
                print("</tr>");
                
            }
            
        ?>

        </tbody>
    </table>
      
</div>
