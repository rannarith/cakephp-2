<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->fetch('title'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--    CDN JQuery UI alert-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<!--    <link rel="stylesheet" href="--><?php //echo $this->webroot; ?><!--/dist/css/style.css">-->
    <style>
        #template{display: none;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <a class="navbar-brand" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <?php
                echo $this->html->link('Home',
                    array('controller' => 'products',
                        'action' => 'index'),
                    array('class' => 'nav-link'))
                ?>
                <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            </li>
            <li class="nav-item">
                <?php echo $this->html->link('Add Products',
                    array('controller' => 'products',
                            'action' => 'add'),
                    array('class' => 'nav-link confirmAdd')) ?>
                <!-- <a class="nav-link" href="#">Add Products</a> -->
            </li>
            <li class="nav-item">
                <?php
                echo $this->html->link('All Product', array(
                    'controller' => 'products',
                    'action' => 'viewall'),
                    array('class' => 'nav-link'))
                ?>
                <!-- <a class="nav-link" href="#">All Products</a> -->
            </li>

        </ul>
    </div>
</nav>


<div>
    <!-- Display content -->
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>
    <!-- End Display -->
</div>


</div>

<div class="col-md-4 lg-4 sm-6" id="template">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <p class="card-text"></p>
            <div class="d-inline">
                <a href="/cakephp-2/products/detail/50">Detail</a>
                <a href="/cakephp-2/products/edit/50" class="nav-link">EDIT</a>
                <a href="/cakephp-2/products/delete/50" class=" btn btn-danger confirmdelete" data-id="50">Delete</a>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--CDN Jquery alert-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        var productId = '';
        $('.confirmdelete').on('click', function (e) {
            e.preventDefault();
            productId = $(this).attr('data-id');
            $.confirm({
                title: 'Confirm!',
                content: 'Delete Item',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            // url:'products/delete'+productId,
                            url: '<?php echo $this->webroot;?>products/delete/'+productId,
                            // method: 'POST',
                            type:'POST',
                            success: function (respon) {
                                $('#product-'+ productId).slideUp();
                                productId = '';
                            },
                        });
                    },
                    cancel: function () {
                        // $.alert('Canceled!');
                    },

                }
            });
        });

        $('.confirmAdd').on('click', function (e) {
            e.preventDefault();
            $.confirm({
                title: '',
                content: 'url:<?php echo $this->webroot;?>products/add',
                columnClass: 'xLarge',
            buttons: {
                create: {
                    text: 'Save Now',
                    btnClass: 'btn-blue',
                    action: function ()
                    {
                        // var dataAdd = this.$content.find('input');//val();
                        // method FIND is return element or tag input

                        // console.log(dataAdd);

                        var form_data = new FormData();

                        // for file upload
                        var file_data = $('#txtImg').prop('files')[0];
                        form_data.append('image', file_data);
                        // console.log(file_data);
                        var f_data = $('#addForm').serializeArray();
                        $.each(f_data, function (key, input,) {
                            form_data.append(input.name, input.value);
                        });
                        console.log(f_data);
                        $.ajax({
                            url: '<?php echo $this->webroot; ?>products/add',
                            method: 'post',
                            dataType: 'text',
                            // Tell jQuery not to process data or worry about content-type
                            // You *must* include these options!
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function (result)
                                {
                                    // console.log(result);
                                    var obj = JSON.parse(result);
                                    $template = $('#template').clone();
                                    $template.attr('id',null);
                                    $template.find('.card-title').text(obj.name);
                                    $template.find('.card-text').text(obj.unitprice);
                                    $template.find('.card-text').text(obj.description);
                                    // $template.find('.card-img-top').text(obj.image);
                                    $('.record').append($template);
                                },
                        complete: function ()
                        {
                            // setTimeout($.unblockUI, 100);
                        }
                    });
                    }
                },
                cancelAction: {
                    text: 'Close',
                    // btnClass: ‘btn_1 btn-sr_3’,
                }
            }

        });

        });

    });

</script>

</body>
</html>