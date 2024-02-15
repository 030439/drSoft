
<?php require"partials/header.html.php";?>
<?php require"partials/nav.html.php";?>

<div class="container">
 <h1 class="h1 text-center"><?php echo $heading;?></h1>
 <p><?php flash("success"); flash(FLASH_ERROR);?></p>
 <table>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1"> Note</label>
        <input type="text" class="form-control" name="note" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
       
        <small id="emailHelp" class="form-text text-danger"><?php flash('note');?></small>
   
      </div>
      
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
 </table>

</div>

<?php require"partials/footer.html.php";?>









