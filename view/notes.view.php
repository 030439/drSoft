
<?php require"partials/header.html.php";?>
<?php require"partials/nav.html.php";?>

<div class="container">
 <h1 class="h1 text-center"><?php echo $heading;?></h1>
 <p><?php flash(FLASH_SUCCESS);?></p>
 <p class="text-center pt-2"><a class="btn btn-primary" href="note/create-note">Create Note</a></p>
 <table>
 	    <?php if(!empty($notes)): foreach($notes as $n=> $note):?>
 	       <tr>
 	       	<th><a href="note?id=<?php echo $note['id']?>"><?=$note['note']?></a></th>
 	       </tr>
        <?php  endforeach; endif;?>
 </table>

</div>

<?php require"partials/footer.html.php";?>









