<?php 

require_once'dbcon.php';
session_start();

 ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat Box</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</head>
<style type="text/css">
	.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}
</style>
<body>  
        <div class="container">
			<br />
			
			
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Chat Box</h4>
				</div>
				
				<div class="col-md-2 col-sm-3">
					<p align="right">Hi - <?php echo$selshopname = $_SESSION['shopname']; ?></p>
				</div>
			</div>
			<div class="table-responsive">

				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
			<br />
			<br />
			
		</div>
		
    </body>  

<script type="text/javascript">

$(document).ready(function(){

		fetch_user();

		setInterval(function(){
			update_last_activity();
			fetch_user();
			update_chat_history_data();
		}, 5000);

		function fetch_user()
		{
			$.ajax({
				url:"SellerFetch_user.php",
				method:"POST",
				success:function(data){
					$('#user_details').html(data);
				}
			})
		}



		function update_last_activity()
		{
			$.ajax({
				url:"update_last_activity.php",
				success:function()
				{

				}
			})
		}


		function make_chat_dialog_box(to_user_id, to_user_name)
		 {
		  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		  modal_content += fetch_user_chat_history(to_user_id);
		  modal_content += '</div>';
		  modal_content += '<div class="form-group">';
		  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
		  modal_content += '</div><div class="form-group" align="right">';
		  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
		  $('#user_model_details').html(modal_content);
		 }

					$(document).on('click', '.start_chat', function(){
			  var to_user_id = $(this).data('touserid');
			  var to_user_name = $(this).data('tousername');
			  make_chat_dialog_box(to_user_id, to_user_name);
			  $("#user_dialog_"+to_user_id).dialog({
			   autoOpen:false,
			   width:400
			  });
			  $('#user_dialog_'+to_user_id).dialog('open');
			 });
			
					$(document).on('click', '.send_chat', function(){
			  var to_user_id = $(this).attr('id');
			  var chat_message = $('#chat_message_'+to_user_id).val();
			  $.ajax({
			   url:"SellerInsert_chat.php",
			   method:"POST",
			   data:{to_user_id:to_user_id, chat_message:chat_message},
			   success:function(data)
			   {
			    $('#chat_message_'+to_user_id).val('');
			    $('#chat_history_'+to_user_id).html(data);
			   }
		  })
	 });
				function fetch_user_chat_history(to_user_id)
				 {
				  $.ajax({
				   url:"Seller_fetch_user_chat_history.php",
				   method:"POST",
				   data:{to_user_id:to_user_id},
				   success:function(data){
				    $('#chat_history_'+to_user_id).html(data);
				   }
				  })
				 }

				function update_chat_history_data()
				 {
				  $('.chat_history').each(function(){
				   var to_user_id = $(this).data('touserid');
				   fetch_user_chat_history(to_user_id);
				  });
				 }

				 $(document).on('click', '.ui-button-icon', function(){
				  $('.user_dialog').dialog('destroy').remove();
				 });



	});  


</script>
</html>