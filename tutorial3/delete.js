<script type="text/javascript">

$(document).ready(function(){
    $(".delete").click(function(){
    
        var del_id = $(this).attr('id');
        var rowElement = $(this).parent().parent();
        
        $.ajax({
            type:'POST',
            url: 'delete.php',
            data: delete_id : del_id,
            success:function(data){
                if(data=='YES'){
                    rowElement.fadeOut('fast').remove();
                }
                else{

                }
            }
        })
    });            
});

