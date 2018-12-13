<script>
    $(function()
    {
        var $dialog = $("#view_dialog").dialog(
            {
                autoOpen: false,
                title: 'View Local Clock',
                height: 200,
                width: 1200,
                resizable: true,
                modal: true,
                buttons:
                    {
                        "Ok": function()
                        {
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