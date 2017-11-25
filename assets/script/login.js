jQuery(document).ready(function(){
    login();
});

function login()
{
    jQuery('#form-login').submit(function(e){
        e.preventDefault();
        var $this = jQuery(this),
            $username = $this.find("input[name='username']").val(),
            $password = $this.find("input[name='pass']").val();
        jQuery.getJSON($this.attr('action'), { 
            username: $username, 
            pass: $password 
        }, function (result) {
            console.log(result.success);
            if(result.success){
                window.location = '../views/dashboard.php';
            }else{

            }
        });
    });
}