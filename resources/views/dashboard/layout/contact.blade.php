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
                    <form action="{{route('contact.insert')}}" id="request" class="main_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name..." type="text" name="name" required> 
                            </div>
                            <div class="col-md-12">
                            <input class="contactus" placeholder="Email..." type="text" name="email" required> 
                            </div>
                            <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number..." type="text" name="phone" required maxlength="10">                          
                            </div>
                            <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message..." name="message" required></textarea>
                            </div>
                            <div class="col-md-12">
                            <button class="send_btn" type="submit">Send</button> <br>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>