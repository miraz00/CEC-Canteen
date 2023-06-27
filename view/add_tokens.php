<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="number" name="amount" min="0">
    <input type="hidden" name="action" value="token_submit">
    <button type="submit" value="Add">Add</button>
</form>