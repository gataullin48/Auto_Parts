$(document).ready(function () {
    var slides = $("#slide").find("div");
    /*
     function description(num){
     $(".description").text($(slides[num]).find("img").attr("alt"));
     }*/
    $(slides[0]).show();
    //description(0);
    for (var i = 1; i < slides.length; i++) {
        $(slides[i]).hide();
    }
    var now = 0;
    setInterval(function(){
        $(slides[now]).fadeOut();
        if(now==slides.length-1){
            now=0;
        }else{
            now+=1;
        }
        $(slides[now]).fadeIn();
    },4000)
    shows(1,5);
    $(".pagination").find("li").each(function() {
            $(this).click(function () {
                var a=$(this).find("a");
                var num=$(a).text();
                shows(num,5);
            });
        }
    );
    bag();


});

function bag(){
    $.post("bag.php",{},function(data){
        $("#bag").text(data);
    });
}

function cart(id){
    $.post("addCart.php",{"id":id},function(data){
        alert("success add in the cart");
    });
    bag();
}

function shows( num, pageCount){
    $.post("list.php",{"page":num,"pageCount":pageCount,"type":1},function(data){
        //alert(data);
        var content=$("#show");
        content.empty();
        //content.append(data);
        var arr = eval('(' + data +')');

        //var cont='<table>';
        for(var i=0;i<$(arr).length;i++){
            var cont='<div class="col-sm-3"><table>';
            cont = cont + '<tr><td><img class="img-rounded" src="partsImg/'+arr[i]['id']+'.jpg"/></td></tr>';
            cont = cont + '<tr><td>' + arr[i]['name'] + '</td></tr>';
            cont = cont + '<tr><td>' + arr[i]['position'] + '</td></tr>';
            cont = cont + '<tr><td>' + arr[i]['type'] + '</td></tr>';
            cont = cont + '<tr><td>$' + arr[i]['price'] + '</td></tr>';
            if(arr[i]['Quantity']>0){
            cont = cont + '<tr><td>Quantity: ' + arr[i]['Quantity'] + '</td></tr>';}
            else{
              arr[i]['Quantity']="Out of Stock";
             cont = cont + '<tr><td>Quantity: ' + arr[i]['Quantity'] + '</td></tr>';}
            
            cont = cont + '<tr><td><button type="button" class="btn btn-default btn-block" onclick="cart('+arr[i]['id']+')">Add To Cart</button></td></tr>';
            //cont = cont + '</table>';
            cont = cont + '</table></div>';
            content.append(cont);
        }
        //cont = cont + '</table>';
        //content.append(cont);
    });
}