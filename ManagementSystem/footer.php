
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script>
 $(document).ready(function(){
     setInterval(ajaxcall, 1000);
  $('#btn').click(function(){
      var date=$('#fromdate').val();
      var dateto=$('#todate').val();
      var source=$('#source').val();
      
       if(dateto < date){
            alert('2nd date picker must be greater than 1st one.')
        }else{
           var date=$('#fromdate').val();
           var dateto = $('#todate').val();
             $.ajax({
        url:"http://localhost:1234/ManagementSystem/ajax.php/",
        type:'POST',
        data: ({date:date,dateto:dateto,source:source}),
        success: function(data){
             obj = jQuery.parseJSON(data);
          $('#filter').empty();
 $('#filter').append('<tr><th>Sno</th><th>name</th><th>Email</th><th>Phone</th><th>Country</th><th>Message</th></tr>');
              $.each(obj,(function(res,k){
        $('#filter').append('<tr><td value="'+k.id+'">'+k.id+'</td><td value="'+k.name+'">'+k.name+'</td><td value="'+k.email+'">'+k.email+'</td><td value="'+k.phone+'">'+k.phone+'</td><td value="'+k.interested_country+'">'+k.interested_country+'</td><td><a href="delete.php?id='+k.id+'"class="glyphicon glyphicon-trash"></a></td></tr>')
                      
                   }));
                }
     })
        }
  })
 });
 function ajaxcall(){
     $.ajax({
         url: 'date.php',
         success: function(data) {
             data = data.split(':');
             $('#hours').html(data[0]);
             $('#minutes').html(data[1]);
             $('#seconds').html(data[2]);
         }
     });
 }
</script>

