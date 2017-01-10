<form class="form-inline" action="addfunds.php" method="post">
    <fieldset>
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount (in $)</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input autocomplete="off" autofocus class="form-control" id=exampleInputAmount name="amount" placeholder="Amount(Limit:$10k)" type="text"/>
                <div class="input-group-addon">.00</div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                Add Funds
            </button>
        </div>
    </fieldset>
</form>