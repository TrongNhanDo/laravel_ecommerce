<!--  contact -->
<div class="contact" id="contact">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="titlepage">
                <h2>Contact Now</h2>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="main_form">
                    <div class="row">
                        <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name..." type="text" name="name" id="name" required> 
                        </div>
                        <div class="col-md-12">
                        <input class="contactus" placeholder="Email..." type="text" name="email" id="email" required> 
                        </div>
                        <div class="col-md-12">
                        <input class="contactus" placeholder="Phone Number..." type="text" name="phone" id="phone" required maxlength="10">                      
                        </div>
                        <div class="col-md-12">
                        <textarea class="textarea" placeholder="Message..." name="message" id="message" required></textarea>
                        </div>
                        <div class="col-md-12">
                        <button class="send_btn" type="submit" id="send_contact" onclick="sendct()">Send</button> <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function sendct(){
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        $.ajax({
            type: "get",
            url : "/contact",
            data: {
                name : name,
                email: email,
                phone:phone,
                message:message
            },
            dataType: 'json',
            success: function(response){
                alert(response);
                $("#name").val("");
                $("#email").val("");
                $("#phone").val("");
                $("#message").val("");
            }
        });
    }
            
</script>