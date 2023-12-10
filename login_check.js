var email = document.getElementById("email");
var password = document.getElementById("password");
var btn = document.getElementById("login");

var xhr = new XMLHttpRequest();

btn.addEventListener("click", () =>{

    $.get("login.php?email="+email.value+"&password="+password.value, function(responseText){
        console.log("hello");
        if(responseText=="success"){
            console.log("hi");
            $.get("allcontacts.php", function(responseText){
                $("body").html(responseText);
            });

        }else{
            alert("Invalid Credentials");
        }
    });
});