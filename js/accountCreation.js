var $;

$(document).ready(function(event) {
    $("[title]").tooltip({
        position: {my: "right",
                   at: "right center"
        }
    });
    
    $("#createForm").submit(function(event) {
        var isValid = true;
        var emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;
        var phonePattern = /^\d{3}-\d{3}-\d{4}$/;
        
        var input = [
            $("#firstName"), // 0
            $("#lastName"), // 1
            $("#age"), // 2
            $("#gender"), // 3
            $("#email"), // 4
            $("#address"), // 5
            $("#phoneNumber"), // 6
            $("#affliation"), // 7
            $("#username"), // 8
            $("#password"), // 9
            $("#verify") // 10
        ];
        
        // Checks for empty fields
        for (var i = 0; i < input.length; i++) {
            if (input[i].val().trim() == "") {
                isValid = false;
                $(input[i]).addClass("wrong");
                $(input[i]).tooltip("open");
            } else {
                $(input[i]).tooltip("close");
                $(input[i]).removeClass("wrong");
            }
        }
        
        // function used for parsing the integer
        function isInt(value) {
            return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value));
        }
        
        // checks to see if number is an integer
        if (isInt(input[2].val().trim())) {
            input[2].tooltip("close");
            input[2].removeClass("wrong");
        } else {
            isValid = false;
            $(input[2]).tooltip("open");
            $(input[2]).tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Must be an integer"
            });
            $(input[2]).addClass("wrong");
        }
        
        // validates the email
        if (emailPattern.test(input[4].val().trim())) {
            input[4].tooltip("close");
            input[4].removeClass("wrong");
        } else {
            isValid = false;
            input[4].tooltip("open");
            input[4].tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Format: email@example.com"
            });
            input[4].addClass("wrong");
        }
        
        // validates the phone number with format "999-999-9999"
        if (phonePattern.test(input[6].val().trim())) {
            input[6].tooltip("close");
            input[6].removeClass("wrong");
        } else {
            isValid = false;
            input[6].tooltip("open");
            input[6].tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Format: 999-999-9999"
            });
            input[4].addClass("wrong");
        }
        
        // validates the password
        if (input[9].val().trim() != input[10].val().trim()) {
            isValid = false;
            input[10].tooltip("open");
            input[10].tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Passwords do not match"
            });
            input[9].addClass("wrong");
            input[10].addClass("wrong");
        } else if (input[9].val().trim().length < 6) {
            isValid = false;
            input[9].tooltip("open");
            input[9].tooltip({
                position: {my: "right",
                           at: "right center"
                },
                content: "Password must be longer than 6 characters"
            });
            input[9].addClass("wrong");
        } else {
            input[9].tooltip("close");
            input[10].tooltip("close");
            input[9].removeClass("wrong");
            input[10].removeClass("wrong");
        }
        
        if(!isValid) {
            event.preventDefault();
        }
    }); // end submit
}); // end ready