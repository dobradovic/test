function enableDisableAll() {
    cb1 = document.getElementById('checkboxOne').checked;
    cb2 = document.getElementById('checkboxTwo').checked;
    document.getElementById('name').disabled = !(cb1);
    document.getElementById('code').disabled = !(cb1);
    
    document.getElementById('parent_category_id').disabled = !cb2;
    document.getElementById('name_sub').disabled = !cb2;
    document.getElementById('code_sub').disabled = !cb2;


    // if (!checkbox1) {
    //   checkbox2.disabled = true;
    // } else {
    //   if (!checkbox1.checked) {
    //     checkbox2.disabled = true;
    //   } else {
    //     checkbox2.disabled = false;
    //   }
    // }

$('input[type=checkbox]').change(function(){
    if($(this).is(':checked')){
$('input[type=checkbox]').attr('disabled',true);
    $(this).attr('disabled',false);
}
else{
$('input[type=checkbox]').attr('disabled',false);

}
});
  

}
   
