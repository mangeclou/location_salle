/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $( "#date" ).datepicker(); 
   $( "#date_first" ).datepicker(); 
   $( "#date_second" ).datepicker(); 
   jQuery('#datetimepicker').datetimepicker({
       format:'Y-m-d H:i:s',
       lang:'fr'
   });
   jQuery('#datetimepicker_2').datetimepicker({
       format:'Y-m-d H:i:s',
       lang:'fr'
   });
   /* 
    $( ".modal" ).dialog({
    modal: true
    });
    */
});


