jQuery(document).ready(function(){
    logout();
});

function logout()
{
    jQuery('#logout').on('click', function(e){
        e.preventDefault();
        var $this = jQuery(this);
        jQuery.getJSON($this.attr('href'), function (result) {
            console.log(result.success);
            if(result.success){
                window.location = '../views/login.php';
            }else{

            }
        });
    });
}