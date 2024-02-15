
<?php require"partials/header.html.php";?>
<?php require"partials/nav.html.php";?>

<div class="container">
 <h1 class="h1 text-center"><?php echo $heading;?></h1>
 <table>
 	       <span><a href="notes">Go back to notes page ...</a></span>
 	       <tr>
 	       	<th><?=$note['note']?></th>

 	       </tr>
 </table>
 <a href="edit">asdf</a>
 <form method="POST">
                <input type="hidden" name="id" value="<?$_GET['id']?>">
                <input class="text-danger" name="delete" type="submit" value="delete">
            </form>

</div>

<?php require"partials/footer.html.php";?>









