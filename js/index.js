$(function() {
    $("#origem").autocomplete({
        source: "./src/server.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#origem").val(ui.item.value);
            $("#idOrigem").val(ui.item.id);
        }
    });
    $("#destino").autocomplete({
        source: "./src/server.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#destino").val(ui.item.value);
            $("#idDestino").val(ui.item.id);
        }
    });
});