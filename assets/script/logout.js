jQuery(document).ready(function(){
    logout();
});

function logout()
{
    if(jQuery('#logout').length > 0){
        jQuery('#logout').on('click', function(e){
            e.preventDefault();
            var $this = jQuery(this);
            jQuery.getJSON($this.attr('href'), function (result) {
                console.log(result.success);
                if(result.success){
                    window.location = pathRoot + 'views/index.php';
                }else{

                }
            });
        });
    }
}