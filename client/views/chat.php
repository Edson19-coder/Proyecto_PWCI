<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/messages.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- /CSS -->
</head>

<body>
    <!-- NAVBAR -->
    <?php 
        include 'navbar.php';
    ?>
    <!-- /NAVBAR -->
    <!-- CONTENT -->
    <div class="message-body container col-12">
        <div class="row">
            <div class="col-4" style="padding: 10px; background-color: white; border: 1px solid black;">
                <h2>Chats</h2>
                <input type="text" name="" id="" class="form-control" style="margin-bottom: 10px;" placeholder="Search Chats">
                <div id="user-message">
                </div>
            </div>
            <div class="col-8" style="padding: 10px; background-color: white; border: 1px solid black;">
                
                <!-- Body of messages -->
				<div class="container global" id="container-message" style="padding: 20px 50px 50px 50px;">
				</div>
				<!-- /Body of messages -->

                <!-- Create message -->
				<form action="">
					<div class="container">
						<div class="col-12" style="padding-top: 20px;">
							<div class="col-12" style="padding: 10px; border-radius: 10px;">
								<div class="row">
									<div class="col-10">
										<textarea class="form-control" id="textMessage" placeholder="What's in your mind?"></textarea>
									</div>
									<div class="col-2" style="text-align: center;">
										<input type="button" value="Enviar"
													class="btn btn-primary publicar-btn" id="btnSendMessage" style="line-height: 35px;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /Create message -->
            </div>
        </div>
    </div>
    <!-- CONTENT -->
    <!-- JS -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/messages.js"></script>
    <script src="../models/user.js"></script>
    <script src="../models/message.js"></script>
    <!-- /JS -->

    <script type="module">
         import { GLOBAL } from '../services/GLOBAL.js';

         var currentChat;

        $(document).ready( () => {
            
            getUsers(<?php echo $id = $_SESSION['id']; ?>);

            $(document).on('click','.preview-message', function(){
                currentChat = $(this).attr('id');
                getMessages(<?php echo $id = $_SESSION['id']; ?>, currentChat)
            })

            $('#btnSendMessage').click( () => {
                if(currentChat != undefined) {
                    var textMessage = $('#textMessage').val();
                    sendMessage(<?php echo $id = $_SESSION['id']; ?>, currentChat, textMessage)
                    $('#textMessage').val("");
                }
            })

        });

        function getUsers(userId) {

            $.ajax({
            url: GLOBAL.url + "/getFiveUsers/" + userId,
            async: true,
			type: 'GET',
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                data.forEach(element => {
                    var user = new UserPreviewMessage(element.id, element.username, element.profilePicture);
                    $('#user-message').append(user.getHtml());
                });
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function getMessages(me, friend) {

            var messageData = {
                me: parseInt(me),
                friend: parseInt(friend)
            };

            var messageDataJson = JSON.stringify(messageData);

            $.ajax({
            url: GLOBAL.url + "/getMessagesByUser",
            async: true,
			type: 'POST',
            data: messageDataJson,
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                $('#container-message').empty();
                if(data.message == undefined) { 
                    data.forEach(element => {
                        var mes = new Message(element.textMessage, element.username, element.createdAt, element.emmiter, element.profilePicture);
                        $('#container-message').append(mes.getHtml(<?php echo $id = $_SESSION['id']; ?>)); 
                    });
                } else {
                    console.log(data);
                }
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }

        function sendMessage(me, friend, textMessage) {

            var messageData = {
                textMessage: textMessage,
                emmiter: parseInt(me),
                receiver: parseInt(friend)
            };

            var messageDataJson = JSON.stringify(messageData);
            
            $.ajax({
            url: GLOBAL.url + "/addMessage",
            async: true,
			type: 'POST',
            data: messageDataJson,
			dataType: 'json',
            contentType: 'application/json; charset=utf-8',
			success: function(data) {
                console.log(data);
                getMessages(me, friend)
            },
			error: function(x, y, z) {
				alert("Error en la api: " + x + y + z);				
            }
			});
        }
        
    </script>
</body>

</html>