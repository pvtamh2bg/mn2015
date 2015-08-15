/**
 * Created by iT on 8/14/2015.
 */
$(document).ready(function(){
   clickMenu();
});

function clickMenu(){
    $('#sidebar ul li a').bind('click', function(){
        var li = $(this).parent();
        if( li.hasClass('selected')){
            li.removeClass('selected');
        }else{
            li.addClass('selected').siblings().removeClass('selected');;
        }
    });
}
