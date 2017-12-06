var $;

$(document).ready(function(event) {
    $("[title]").tooltip({
        position: {my: "right",
                   at: "right center"
        }
    }); // end tooltip
    
    $("#loginForm").submit(function(event) {
        var isValid = true;
        
        // validate username
        var username = $("#username").val().trim();
        if (username == "") {
            isValid = false;
            $("#username").tooltip("open");
            $("#username").addClass("wrong");
        } else {
            $("#username").tooltip("close");
            $("#username").removeClass("wrong");
        }
        $("#username").val(username);
        
        // validate password
        var password = $("#password").val().trim();
        if (password == "") {
            isValid = false;
            $("#password").tooltip("open");
            $("#password").addClass("wrong");
        } else {
            $("#password").tooltip("close");
            $("#password").removeClass("wrong");
        }
        $("#password").val(password);
        
        if (!isValid) {
            event.preventDefault();
        }
    }); // end submit
}); // end ready