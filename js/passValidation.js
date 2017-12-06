var $;

$(document).ready(function() {
    $("#accordion").accordion({
        heightStyle: "content",
        collapsible: true
    });
    
    $("[title]").tooltip({
        position: {my: "right",
                   at: "right center"
        }
    });
    
    // validation of changing credentials
    $("#change").submit(function(event) {
        var isValid = true;
        
        // validating the passwords
        if ($("#currentPass").val().trim() == "" || $("#currentCheck").val().trim() == "") {
            isValid = false;
            $("#currentPass").addClass("wrong");
            $("#currentCheck").addClass("wrong");
            $("#currentPass").tooltip("open");
            $("#currentCheck").tooltip("open");
        } else if ($("#currentPass").val().trim() === $("#currentCheck").val().trim()) {
            $("#currentPass").removeClass("wrong");
            $("#currentCheck").removeClass("wrong");
            $("#currentPass").tooltip("close");
            $("#currentCheck").tooltip("close");
        } else {
            isValid = false;
            $("#currentPass").addClass("wrong");
            $("#currentCheck").addClass("wrong");
            $("#currentPass").tooltip({
                content: "The passwords do not match"
            });
        }
        
        // validating the new password
        if ($("#newPass").val().trim() !== "") {
            $("#newPass").tooltip("close");
        } else if ($("#newPass").val().trim().length < 6) {
            isValid = false;
            $("#newPass").addClass("wrong");
            $("#newPass").tooltip("open");
            $("#newPass").tooltip({
                content: "Must be more than 6 characters"
            });
        } else {
            isValid = false;
            $("#newPass").addClass("wrong");
            $("#newPass").tooltip("open");
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    }); // end #change submit
}); // end ready