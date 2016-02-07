<!--------  C H A T  M A I N------------------------------------------------------>

<div style="margin: 0; padding: 5px; background-color: #269abc;">
    <div style="font-weight: bold; padding: 3px">
        Сообщения от пользователей
    </div>

    <div style="margin: 3px 0;">
        <input type="text" id="text_chat" placeholder="Введите сообщение... и нажмите Enter" style="width: 100%;">
        <!--<button onclick="enter_chat()" style="width: 12%"> >>> </button>-->
    </div>

    <div id="msgs" style="background-color: #ffffff;
                                            padding: 1px;
                                            min-height: 200px;
                                            max-height: 850px;
                                            overflow: auto;">
        <?php foreach($msgs as $msg){
            echo $this->renderAjax('_message', ['msg' => $msg]);
        } ?>
    </div>

</div>

<script src='http://5.63.152.110:1984/socket.io/socket.io.js'></script>
<script> var socket = io.connect('http://5.63.152.110:1984');

    ////////////////////////////         AVTOLOAD      ///////////////////////////
    window.onload = function(){
        // нажатие Enter в чате
        $("#text_chat").keydown(function(e) {
            if(e.which == 13){
                var text = $('#text_chat').val();
                $.ajax({
                    type: "GET",
                    url: '<?php echo \Yii::$app->urlManager->createUrl(['chatmain/ajaxenterchatmain']); ?>',
                    data: "text="+text,
                    success: function(data){
                        //alert(data);
                        //$('#msgs').append(data);
                        socket.emit('enter_chatmain', data);
                    }
                });
                $('#text_chat').val('');
            }
        });

        ////////////    трансляциии     /////////////////////////
        // трансляция сообщений в чат
        socket.on('brodcast_chatmain', function(data){
            $('#msgs').prepend(data);
            //document.querySelector('#msgs').scrollTop = document.querySelector('#msgs').scrollHeight;
        });


        document.querySelector('#msgs').scrollTop = document.querySelector('#msgs').scrollHeight;

    }


    /////////////////////////////////////////////////////////////////////////////////////////////////
    /* отправка сообщений при нажатии на кнопку
     function enter_chat(){
     var text = $('#text_chat').val();
     $.ajax({
     type: "GET",
     url: '<?php //echo \Yii::$app->urlManager->createUrl(['chatmain/ajaxenterchatmain']); ?>',
     data: "text="+text,
     success: function(data){
     //alert(data);
     $('#msgs').append(data);
     }
     });
     $('#text_chat').val('');
     }
     */

</script>
