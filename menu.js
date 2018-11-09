var months = "January,February,March,April,May,June,July,August,September,October,November,December".split(",");
window.onload=function() {
    var d = new Date();
    document.getElementById("calendar").getElementsByTagName("h1")[0].innerHTML=months[d.getMonth()];
    document.getElementsByTagName("td")[d.getDate()-1].className="currentA";
}
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });
});


