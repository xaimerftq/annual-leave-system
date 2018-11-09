function validform() {

        var a = document.forms["my-form"]["name"].value;
        var b = document.forms["my-form"]["surname"].value;
        var c = document.forms["my-form"]["department"].value;
        var d = document.forms["my-form"]["job"].value;
        var e = document.forms["my-form"]["aleaves"].value;
		var f = document.forms["my-form"]["username"].value;
        var g= document.forms["my-form"]["password"].value;

        if (a==null || a=="")
        {
            alert("Please Enter  name");
            return false;
        }else if (b==null || b=="")
        {
            alert("Please Enter  surname");
            return false;
        }else if (c==null || c=="")
        {
            alert("Please Enter Department");
            return false;
        }else if (d==null || d=="")
        {
            alert("Please Enter job position");
            return false;
        }else if (g==null || g=="")
        {
            alert("Please Enter password");
            return false;
        }
		else if (f==null || f=="")
        {
            alert("Please Enter username");
            return false;
        }


    }