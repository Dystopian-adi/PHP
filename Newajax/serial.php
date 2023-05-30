<?php
include('header.php')
?>
<style>
  #insert {
    background: #fff;
    margin: auto;
    width: 50%;
    position: relative;
    top: 20%;
    left: calc(50%-15%);
    padding: 15px;
    border-radius: 4px;
  }

  .container-fluid {
    /* background: rgba(0,0,0,0.7); */
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
  }

  .error {
    background: #e0efda;
    color: #407a4a;
    border: 1 px solid red;
  }

  .success {
    background: green;
    color: #407a4a;
    border: 1px solid yellow;
  }
</style>
<div class="container-fluid">
  <form id="insert">
    <h4 style="margin:auto;">ADD RECORD</h4>

    <div class="form-group">
      <label for="">name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Gender</label><bR>
      <input type="radio" name="gender" value="male" id="male"> Male
      <input type="radio" name="gender" value="female" id="female"> Female
      <input type="radio" name="gender" value="other" id="other"> other
    </div>
    <button type="button" class="btn btn-primary float-right" id="submit">submit</button>
  </form>
  <div id="response">

  </div>
</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#submit').on('click', function(e) {
      $.ajax({
        url: 'insert.php',
        type: 'post',
        data: $('#insert').serialize(),
        success: function(data) {
          alert(data);
        }
      });
    });
  });
  // if(fname==""|| femail=="" || !$('input:radio[name=gender]').is(':checked')){
  //   $('#response').fadeIn();
  //   $('#response').removeClass('success').addClass('error').html('all field required')
  // }
</script>
<?php
include('footer.php')
?>