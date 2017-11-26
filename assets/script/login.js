jQuery(document).ready(function(){
    login();
});

function login()
{
    if(jQuery('#form-login').length > 0){
        jQuery('#form-login').on("submit", function(e){
            e.preventDefault();
            var $this = jQuery(this),
                $username = $this.find("input[name='username']").val(),
                $password = $this.find("input[name='pass']").val();
            jQuery.getJSON($this.attr('action'), { 
                username: $username, 
                pass: $password 
            }, function (result) {
                console.log(result.success);
                $this.children('.alert').remove();
                if(result.success){
                    console.log(pathRoot);
                    window.location = pathRoot + 'views/index.php';
                }else{
                    $this.append("<div class='form-group alert alert-danger' style='margin-top: 15px;'>" + result.message  + "</div>");
                }
            });
        });
    }
}