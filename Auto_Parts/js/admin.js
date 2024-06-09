
$(document).ready(function () {
    show(1,5);
    $(".pagination").find("li").each(function() {
            $(this).click(function () {
                var a=$(this).find("a");
                var num=$(a).text();
                show(num,5);
            });
        }
    );

});

function show( num, pageCount){
    $.post("list.php",{"page":num,"pageCount":pageCount,"type":1},function(data){
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
            cont = cont + '<tr><td>Quantity: ' + arr[i]['Quantity'] + '</td></tr>';
            cont = cont + '<tr><td><a href="addPart.php?updateType=2&id='+arr[i]['id']+
                '&type='+arr[i]['type']+
                '&name='+arr[i]['name']+
                '&position='+arr[i]['position']+
                '&price='+arr[i]['price']+
                '&Quantity='+arr[i]['Quantity']+
                '"'+
                '><button type="button" class="btn btn-default btn-block">Update</button></a></td></tr>';
            cont = cont + '<tr><td><a href="delete.php?id='+arr[i]['id']+'"><button type="button" class="btn btn-default btn-block">Delete</button></a></td></tr>';
            //cont = cont + '</table>';
            cont = cont + '</table></div>';
            content.append(cont);
        }
        //cont = cont + '</table>';
        //content.append(cont);
    });
}