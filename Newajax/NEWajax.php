<?php
include('header.php');
?>
<style>
    #modal{
    background: rgba(0,0,0,0.7);
    position: fixed;
    left: 0;
    top:0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#modal-form{
    background: #fff;
    margin: auto;
    width: 60%;
    position:relative;
    /* top:20%; */
    left:calc(50%-15%);
    padding: 15px;
    border-radius: 4px;
}
#close{
    background:red;
    color: white;
    width: 30px;
    height:30px;
    text-align: center;
    line-height: 30px;
    border-radius: 50%;
    position: absolute;
    padding: 0px;
    top: -15px;
    right: -15px;
    cursor:pointer;
}
</style>
 <div class="container-fluid  col-10" style="box-shadow:20px 10px 10px;padding:10px">
    <h4 style="text-align:center">Record show</h4>
    <form id="reset">
   Name <input type="text" name="name"id="name" class="form-control"><br>
    Email<input type="email" name="email"id="email" class="form-control"><br>
    <label for="">Gender</label>
        <input type="radio" name="gender" id ="gender" value="male"> Male
      <input type="radio" name="gender" id ="gender" value="female"> Female
        <div class="form-group">
          <label class="form-check-label">Sports</label><br>
          cricket: <input type="checkbox" name="" id="sports" value="cricket" ><br>
          bollyball  :  <input type="checkbox"  name="" id="sports" value="bollyball"  ><br>
          hocky:   <input type="checkbox"  name="" id="sports" value="hocky" ><br>
        </div>
        <div class="form-group">
          <label for="">Details</label>
          <textarea class="form-control" name="" id="details" rows="2"></textarea>
        </div>
    </form>
    <div id="error-m"></div>
    <div id="success"></div>
    <button type="button" class="btn btn-primary" id="submit" style="float:right">submit form</button>
    <div id="record"></div>

    <table class="table">
        <thead>
            <tr>
                <th>id </th>
                <th>name </th>
                <th>email </th>
                <th>gender</th>
                <th>sports</th>
                <th>details</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody id="data">
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table><br><br>
    <div id="modal">
    <div id="modal-form">
        <h2>edit</h2>
       <table>

       </table>
<button type='button' class='btn btn-info' id='close'>X</button>

    </div>
</div>
</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
function load(){
$.ajax({
    url:'select.php',
    type:'post',
    success:function(data){
        $('#data').html(data);
    }
});
}
load();
$(document).on('click','.delete',function(e){
 var id=$(this).data('id1');
 $.ajax({
        url:'delete.php',
        type:'post',
        data:{id:id},
        success:function(data){
            $('#record').html(data);
            load();
        }
});
});
$(document).on('click','.edit',function(e){
    $('#modal').show();
    var id=$(this).data('id');
    $.ajax({
    url:"update.php",
    type:'post',
    data:{id:id},
    success:function(data){
        $('#modal-form table').html(data)
    }
   });
});
$(document).on('click','.update',function(){
    var fid = $('#fid').val();
    var fname = $('#fname').val();
    var femail = $('#femail').val();
    var fgender = $('#fgender').val();
    var fsports = $('#fsports').val();
    var fdetail = $('#fdetails').val();
    if(fname=="" || femail==""){
        $('#error-m').html('all field reuired');
        $('#success').slideup();
    }
    $.ajax({
    url:"updaterecord.php",
    type:'post',
    data:{id:fid,name:fname,email:femail,gender:fgender,sports:fsports,details:fdetail},
    success:function(data1){
        alert(data1);
        $('#modal').hide();
        load();
    }
   });
});
$('#close').on('click',function(e){
    $('#modal').hide();
});
$('#submit').on('click',function(e){
    var name=$('#name').val();
    var email=$('#email').val();
    var gender=$('#gender').val();
    var sports=$('#sports').val();
    var details=$('#details').val();
    if(name=="" || email==""){
        $('#error-m').html('all field reuired');
        $('#success').slideup();
    }
    $.ajax({
        url:'insert.php',
        type:'post',
        data:{fname:name,femail:email,fgender:gender,fsports:sports,fdetails:details},
        success:function(data){
            $('#record').html(data);
            load();
            $('#reset').trigger('reset');
        }
    });
});
});
// hide model box 

</script>
<?php
include('footer.php')
?>   
