var $;

$(document).ready(function() {
    $("[title]").tooltip({
        position: {
            my: "right",
            at: "right center"
        }
    });
    
    $("#orderForm").submit(function(event) {
        var quantity = $("#quantity"),
            shipping = $("#shipping"),
            password = $("#password"),
            isValid = true;
        
        function isInt(value) {
            return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value));
        }
        
        if (isInt(quantity.val().trim())) {
            quantity.removeClass("wrong");
            quantity.tooltip("close");
            isValid = true;
        } else {
            quantity.addClass("wrong");
            quantity.tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Must be an integer"
            });
            quantity.tooltip("open");
            isValid = false;
        }
        
        if (shipping.val().trim() != "") {
            shipping.removeClass("wrong");
            shipping.tooltip("close");
            isValid = true;
        } else  {
            shipping.addClass("wrong");
            shipping.tooltip("open");
            isValid = false;
        }
        
        if (password.val().trim() != "") {
            password.removeClass("wrong");
            password.tooltip("open");
            isValid = true;
        } else {
            password.addClass("wrong");
            password.tooltip("open");
            isValid = false;
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    }); // end submit
}); // end ready