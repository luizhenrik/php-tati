jQuery(document).ready(function(){
    product_card();
});

function product_card()
{
    if(jQuery('.button-cart').length > 0){
        jQuery('.button-cart').on("click", function(e){
            e.preventDefault();
            var $this = jQuery(this),
                $id = $this.attr("data-id"),
                $handler = $this.attr("data-handler");

            jQuery.getJSON($this.attr('href'), { 
                id: $id,
                handler: $handler
            }, function (result) {
                console.log(result);
                if(result.success){
                    window.location = pathRoot + 'views/cart.php';
                }else{
                    $this.append("ERORR");
                }
            });
        });
    }
}