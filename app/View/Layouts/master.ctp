<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->fetch('title');?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>/dist/css/style.css" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><span class="navbar-toggler-icon"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <?php
          echo $this->html->link('Home', 
          array('controller'=>'products',
              'action'=>'index'),
              array('class'=>'nav-link'))
        ?>
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
      </li>
      <li class="nav-item">
        <?php echo $this->html->link('Add Products', 
                                    array('controller'=>'products', 
                                          'action'=>'add'),
                                          array('class'=>'nav-link')) ?>
        <!-- <a class="nav-link" href="#">Add Products</a> -->
      </li>
      <li class="nav-item">
        <?php 
          echo $this->html->link('All Product', array(
              'controller'=>'products',
              'action'=>'viewall'),       
           array('class'=>'nav-link'))
        ?>
        <!-- <a class="nav-link" href="#">All Products</a> -->
      </li>
      
    </ul>
  </div>
</nav>


<div >
  <!-- Display content -->
  <?php echo $this->Flash->render(); ?>
  <?php echo $this->fetch('content'); ?>
  <!-- End Display -->
</div>
  


</div>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        var $dialog = $("#view_dialog").dialog(
            {
                autoOpen: false,
                title: 'View Local Clock',
                height: 200,
                width: 300,
                resizable: true,
                modal: true,
                buttons:
                    {
                        "Ok": function()
                        {
                            var id = $this->request->data['Product']['id'];
                            $.ajax({
                                url: 'products/delete/'+ id,
                                type: 'get',
                                success:function(resp){
                                    //reso is msg string returned from controller.
                                    alert("resp");
                                }
                            });
                            $(this).dialog("close");
                        }
                    }
            });
        $(".view_dialog").click(function()
        {
            $dialog.load($(this).attr('href'), function ()
            {
                $dialog.dialog('open');
            });
            return false;
        });
    });

</script>

</body>
</html>