$(document).ready(function(){
 var i=1;
$("#add_row").click(function(){
 $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='origin"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='est_departure"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input name='act_departure"+i+"' type='text' class='form-control input-md'></td><td><input  name='destination"+i+"' type='text'  class='form-control input-md'></td><td><input name='est_arrival"+i+"' type='text' class='form-control input-md'/></td><td><input name='act_arrival"+i+"' type='text' class='form-control input-md' /></td><td><input name='aircraft"+i+"' type='text' class='form-control input-md' /></td>");

 $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
 i++;
});
$("#delete_row").click(function(){
    if(i>1){
$("#addr"+(i-1)).html('');
i--;
}
});

});
