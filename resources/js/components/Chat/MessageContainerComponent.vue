<template>
    
    <div class="col-md-8 remove-space">
        
            <div class="card-header">
                <span class="float-sm-left">
                    <b>Tristan Mason</b> 
                    <small>12:37 PM GMT+1</small> 
                </span>
                <span class="float-right align-header">
                    <button class="btn-job">View Job</button>
                    <button class="btn-propsal">View Proposal</button>
                </span>
            </div>
            
            <div class="card-body msg_card_body">
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="online_icon"></span>
                    </div>
                    <div class="msg_cotainer">
                        Hi, how are you arslan
                        <b class="user_name">Sajid Mehmood</b>
                        <span class="msg_time">8:40 AM</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send">
                        Hi sajid i am good tnx how about you?
                        <b class="sender_user_name">Arslan Ayoub</b>
                        <span class="msg_time_send">8:55 AM</span>
                    </div>
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="offline"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="online_icon"></span>
                    </div>
                    <div class="msg_cotainer">
                        I am good too, thank you for your chat template
                        <b class="user_name">Sajid Mehmood</b>
                        <span class="msg_time">9:00 AM</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send">
                        You are welcome
                        <b class="sender_user_name">Arslan Ayoub</b>
                        <span class="msg_time_send">9:05 AM</span>
                    </div>
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="offline"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="online_icon"></span>
                    </div>
                    <div class="msg_cotainer">
                        I am looking for your next templates
                        <b class="user_name">Sajid Mehmood</b>
                        <span class="msg_time">9:07 AM</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send">
                        Ok, thank you have a good day
                        <b class="sender_user_name">Arslan Ayoub</b>
                        <span class="msg_time_send">9:10 AM</span>
                    </div>
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="offline"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        <span class="online_icon"></span>
                    </div>
                    <div class="msg_cotainer">
                        Bye, see you
                        <b class="user_name">Sajid Mehmood</b>

                        <span class="msg_time">9:12 AM</span>
                    </div>
                </div>
            </div>
            
        
            <div>
                <form action="">
                    <div class="row background">
                        <div class="col-md-11">
                            <input type="text"  class="no-border" placeholder="Write Your Message"></input>
                        </div>
                        <div class="col-md-1 align-self-center">
                            <i class="fas fa-paperclip"></i>
                            <i class="fas fa-location-arrow"></i>
                           
                        </div>
                    </div>
                </form>
                
            </div>
        
    </div>
  
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
        },
    }
</script>

<style scoped>
    .btn-propsal{

        width: 117px;
        height: 30px;
        left: 1147px;
        top: 86px;
        background: #007F7F;
        border-radius: 6px;

    }
    .btn-job{
        width: 94px;
        height: 30px;
        left: 1043px;
        top: 86px;
        border: 2px solid #007F7F;
        border-radius: 6px;
    }
    .remove-space{
        padding-left: 0px;
        padding-right: 0px;
    }
    .message-body{
        height: 400px;

    }
    .align-header{
        margin-top: -4px;
    }
    .no-border{
        border: none;
    }
    .background{
        border-top: 1px solid #CBDFDF;
        margin-left: 0px;
        margin-right: 0px;
    }
    
    .msg_card_body{
        overflow-y: auto;
    }
    
    .type_msg{
        background-color: rgba(0,0,0,0.3) !important;
        border:0 !important;
        color:white !important;
        height: 60px !important;
        overflow-y: auto;
    }
        .type_msg:focus{
         box-shadow:none !important;
         outline:0px !important;
    }
   
    
    .active{
        background-color: rgba(0,0,0,0.3);
    }
    .user_img{
        height: 70px;
        width: 70px;
        border:1.5px solid #f5f6fa;
    
    }
    .user_img_msg{
        height: 40px;
        width: 40px;
        border:1.5px solid #f5f6fa;
    
    }
.img_cont{
        position: relative;
        height: 70px;
        width: 70px;
}
.img_cont_msg{
        height: 40px;
        width: 40px;
}
.online_icon{
    position: relative;
    height: 10px;
    width: 10px;
    background-color: #4cd137;
    border-radius: 50%;
    border: 1.5px solid white;
    left: 28px;
    top: -20px;
}
.offline{
    position: relative;
    height: 10px;
    width: 10px;
    background-color: #c23616;
    border-radius: 50%;
    border: 1.5px solid white;
    right: 0px;
    top: -20px;
}

.user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}
.user_info span{
    font-size: 20px;
    color: white;
}
.user_info p{
font-size: 10px;
color: rgba(255,255,255,0.6);
}

.msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
    top:25px;
    
}
.msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
    top:25px;
}
.msg_time{
    position: absolute;
    left: 0;
    bottom: -23px;
    font-size: 10px;
}
.user_name{
    position: absolute;
    left: 0;
    bottom: -15px;
    top: -22px;
    font-size: 10px;
}
.sender_user_name{
    position: absolute;
    right:0;
    bottom: -15px;
    font-size: 10px;
    top: -22px;
}
.msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    font-size: 10px;
    top: 41px;
}
.msg_head{
    position: relative;
}



</style>
