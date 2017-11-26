jQuery(document).ready(function(){
    admin_add_products();
});

function admin_add_products()
{
    if(jQuery('#add-product').length > 0){
        jQuery('#add-product').on("submit", function(e){
            e.preventDefault();
            var $this = jQuery(this),
                $name = $this.find("[name='name']").val(),
                $price = $this.find("[name='price']").val();
            jQuery.getJSON($this.attr('action'), { 
                name: $name,
                price: $price
            }, function (result) {
                $this.children('.alert').remove();
                if(result.success){
                    $this.append("<div class='form-group alert alert-success' style='margin-top: 15px;'>" + result.message  + "</div>");
                }else{
                    $this.append("<div class='form-group alert alert-danger' style='margin-top: 15px;'>" + result.message  + "</div>");
                }
                $this.find("input, textarea").val('');
            });
        });
    }
}