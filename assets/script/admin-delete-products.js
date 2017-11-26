jQuery(document).ready(function(){
    admin_delete_products();
});

function admin_delete_products()
{
    if(jQuery('.delete-product').length > 0){
        jQuery('.delete-product').on("click", function(e){
            e.preventDefault();
            console.log("eai");
            var $this = jQuery(this),
                $id = $this.attr("data-id");

            jQuery.getJSON($this.attr('href'), { 
                id: $id
            }, function (result) {
                if(result.success){
                    $this.closest('.card').fadeOut('slow');
                    setTimeout(function(){
                        $this.closest('.card').remove();
                    }, 500);
                }else{
                    $this.append("ERORR");
                }
            });
        });
    }
}