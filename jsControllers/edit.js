/*$(document).on('click', '.item', function (e) {
    alert('cao klik');
    console.log(this);
   TBox(this);
});

$("#ToDo").blur(function (e) {
   RBox(this);
});

function TBox(obj) {
        var id = $(obj).attr("id");
        var tid = id.replace("item", "edited");
        alert('cao klik pre');
        var input = $('<input />', { 'type': 'text', 'name': tid, 'id': tid, 'class': 'text_box', 'value': $(obj).html() });
        alert('cao klik posle ');
        $(obj).parent().append(input);
        $(obj).remove();
        input.focus();
}
function RBox(obj) {
    alert("jeah");
    var id = $(obj).attr("id");
    var tid = id.replace("edited", "item");
    var input = $('<p />', { 'id': tid, 'class': 'item', 'html': $(obj).val() });
    $(obj).parent().append(input);
    $(obj).remove();
}

$(document).ready(function() {
      $('.edit').on("click", ".edit", editable()); 
     //$('.edit').editable("../phpControllers/edit.php");
//     $( "#itemRow" ).on( "click", "input", function() {
 });*/