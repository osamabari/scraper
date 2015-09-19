$( document ).ready(function() {
   
    //getting data onclick on search button
    $('#submit').on('click',function(){

    get_data();
   });
   
      
   
   
   
    function get_data()
    {
               //getting value in p_search variable
        var p_search = $('#search').val();
       // p_search=str.replace(/[^A-Z0-9]/ig, "-");
       dis(p_search);
      console.log(p_search);
        $.ajax({
           type:"post",
           url:"ajax/ajax_request.php?url="+p_search,
           cache: false,
		beforeSend: function () { 
			$('#json-result').html('<img src="img/loader.gif">');
		},
           success:function(e){
             
               $('#json-result').html('');
               $('#json-result').html(e);
              //  $('#njson').html(e);
               //alert(e);
           },
           error:function (request, status, error) {
        soncole.log(request.responseText);
    }
       });
    }
       
   //display in table function
   
function dis(p_search)
{
     $.ajax({
           type:"post",
           url:"ajax/decode_and_display.php?url="+p_search,
           cache: false,
		beforeSend: function () { 
			$('#display_result').html('<img src="img/loader.gif">');
		},
           success:function(e){
               $('#display_result').html('');
               $('#display_result').html(e);
              
               //alert(e);
           },
           error:function (request, status, error) {
        console.log(request.responseText);
    }
       });
    }
   
});