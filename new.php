$(document).on('keyup','.change-amount',function(){
//var current_id = $(this).attr('id');
bal = $(this).val();
same_id = $(this).attr('name');
$(this).attr("id","id_" + same_id);
var l_id= $('#' + same_id);
$(l_id).val(bal);

if(same_id==first_id)
 {
  var l_bal = $(l_id).val();

 }
 else
 {
  balance[i]= first_balance;
 
 }
  });