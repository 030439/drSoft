
<script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/rc-pos.min.js"></script>
  </body>
</html>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div  style="font-family:'Poppins',sans-serif !important;" class="modal  fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content p-3" style="border-radius:20px">
      <div class=" mt-3 p-3">
        <h3 class="modal-title text-left ml-3" id="exampleModalLongTitle" >Password Required</h3>
       
      </div>
      <div class="modal-body ">
      <form>
        <div class="form-group">
          <input class="form-control p-4" id="password" type="password" autocomplete="off" placeholder="Password ">
        </div>
        <p class="text-right "><a href="#" class="text-secondary">Forget Password?</a></p>
       <div class="text-center pb-3">
       <button type="button text-center " disabled='disabled' class="pl-5 enableOnInput pt-2 pb-2 pr-5 btn btn-info">Click </button>
       </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Bill Cancellation -->
<div  style="font-family:'Poppins',sans-serif !important;" class="modal  fade" id="billcancellation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content p-3" style="border-radius:20px">
      <div class=" mt-3 p-3">
        <h3 class="modal-title text-left ml-3" id="exampleModalLongTitle" >Password Required</h3>
       
      </div>
      <div class="modal-body ">
      <form>
        <div class="form-group">
          <input class="form-control p-4" type="password" id="bpassword" autocomplete="off" placeholder="Password ">
        </div>
        <p class="text-right "><a href="#" class="text-secondary">Forget Password?</a></p>
       <div class="text-center pb-3">
       <button type="button text-center " disabled='disabled' class="pl-5 benableOnInput pt-2 pb-2 pr-5 btn btn-info">Click </button>
       </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- operation setting -->
<div  style="font-family:'Poppins',sans-serif !important;" class="modal  fade" id="btn-operation-setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content p-3" style="border-radius:20px">
      <div class=" mt-3 p-3">
        <h3 class="modal-title text-left ml-3" id="exampleModalLongTitle" >Password Required</h3>
       
      </div>
      <div class="modal-body ">
      <form>
        <div class="form-group">
          <input class="form-control p-4" type="password" id="opassword" autocomplete="off" placeholder="Password ">
        </div>
        <p class="text-right "><a href="#" class="text-secondary">Forget Password?</a></p>
       <div class="text-center pb-3">
       <button type="button text-center " disabled='disabled' class="pl-5 oenableOnInput pt-2 pb-2 pr-5 btn btn-info">Click </button>
       </div>
      </form>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
    $(function () {
        $('#password').keypress(function () {
            if ($(this).val() == '') {
                $('.enableOnInput').prop('disabled', true);
            } else {
                $('.enableOnInput').prop('disabled', false);
            }
        });
    });
    $(".enableOnInput").on("click",function(e){
      e.preventDefault();
      password=$("#password").val();
        
        if(password!=''){
          $.ajax({
            url:"auth",
            method:"POST",
            data:{
              password:password,action:"admin"
            },
            success:function(res){
             if(res=="ok"){
              window.location.href="dashboard";
             }
            }
          })
        }
        else{
          alert("enter password");
        }
    })
</script>



<script type='text/javascript'>
    $(function () {
        $('#bpassword').keypress(function () {
            if ($(this).val() == '') {
                $('.benableOnInput').prop('disabled', true);
            } else {
                $('.benableOnInput').prop('disabled', false);
            }
        });
    });
    $(".benableOnInput").on("click",function(e){
      e.preventDefault();
      password=$("#bpassword").val();
        
        if(password!=''){
          $.ajax({
            url:"auth",
            method:"POST",
            data:{
              password:password,action:"admin"
            },
            success:function(res){
             if(res=="ok"){
              window.location.href="bill-cancellation";
             }
            }
          })
        }
        else{
          alert("enter password");
        }
    })
</script>
<script type='text/javascript'>
    $(function () {
        $('#opassword').keypress(function () {
            if ($(this).val() == '') {
                $('.oenableOnInput').prop('disabled', true);
            } else {
                $('.oenableOnInput').prop('disabled', false);
            }
        });
    });
    $(".oenableOnInput").on("click",function(e){
      e.preventDefault();
      password=$("#opassword").val();
        
        if(password!=''){
          $.ajax({
            url:"auth",
            method:"POST",
            data:{
              password:password,action:"admin"
            },
            success:function(res){
             if(res=="ok"){
              window.location.href="operation-setting";
             }
            }
          })
        }
        else{
          alert("enter password");
        }
    })
</script>