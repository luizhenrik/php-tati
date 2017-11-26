jQuery(document).ready(function(){
    admin_update_products();
});

function admin_update_products()
{
    if(jQuery('#update-product').length > 0){
        jQuery('#update-product').on("submit", function(e){
            e.preventDefault();
            var $this = jQuery(this),
                $id = $this.find("[name='id']").val(),
                $name = $this.find("[name='name']").val(),
                $price = $this.find("[name='price']").val();
            jQuery.getJSON($this.attr('action'), { 
                id: $id,
                name: $name,
                price: $price
            }, function (result) {
                $this.children('.alert').remove();
                if(result.success){
                    $this.append("<div class='form-group alert alert-success' style='margin-top: 15px;'>" + result.message  + "</div>");

                    setTimeout(() => {
                        window.location = pathRoot + 'views/index.php';
                    }, 500);
                }else{
                    $this.append("<div class='form-group alert alert-danger' style='margin-top: 15px;'>" + result.message  + "</div>");
                }
            });
        });
    }
}