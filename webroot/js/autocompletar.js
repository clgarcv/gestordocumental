$(document).ready(function(){
    $("#s").autocomplete({
        minLength: 2,
        source: function(request, response){
             $.ajax({
                url: basePath + "keywords/searchJSON",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return {
                            value: el.nombre,
                            nombre: el.nombre,
                            id: el.id
                        };
                    }));
                }
             });
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append("<a>" + item.nombre + "</a>")
        .appendTo(ul)
    };
});


