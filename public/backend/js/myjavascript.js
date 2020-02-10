function isNumberKey(evt,id)
{
	try{
        var charCode = (evt.which) ? evt.which : event.keyCode;
  
        if(charCode==46){
            var txt=document.getElementById(id).value;
            if(!(txt.indexOf(".") > -1)){
	
                return true;
            }
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57) )
            return false;

        return true;
	}catch(w){
		alert(w);
	}
}
window.onload = function () {
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 4;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
}