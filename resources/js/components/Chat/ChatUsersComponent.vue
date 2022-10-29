<template>
    
    <div class="col-md-4 border-right-custom">
        
        <div class="row border-bottom">
            <div class="col-md-2">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 40px;height: 40px"> 
                <span class="online_icon"></span>
            </div>

            <div class="col-md-6 ">
                <b class="user-font-size">Sajid Mehmood</b>
                <span class="user-font-size">Full Stack Developer</span>
                
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size">22-09-2022</span>
            </div>

        </div>

        <div class="row border-bottom">
            <div class="col-md-2">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 40px;height: 40px"> 
                <span class="offline"></span>
            </div>

            <div class="col-md-6 ">
                <b class="user-font-size">Sajid Mehmood</b>
                <span class="user-font-size">Full Stack Developer</span>
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size">22-09-2022</span>
            </div>

        </div>

        <div class="row border-bottom">
            <div class="col-md-2">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 40px;height: 40px"> 
                <span class="offline"></span>   
            </div>

            <div class="col-md-6 ">
                <b class="user-font-size">Sajid Mehmood</b>
                <span class="user-font-size">Full Stack Developer</span>
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size">22-09-2022</span>
            </div>

        </div>
        
    </div>

            
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
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
    left: 29px;
    top: -20px;
}
    .user-font-size{
        font-size: 12px;
    }
    .border-bottom{
        
        padding-top: 7px;
    }
    .border-right-custom{
        border-right: 1px solid #DEE7E7;
        
    }
    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(var(--bs-gutter-y) * -1);
        margin-right: 0px !important; 
        margin-left: calc(var(--bs-gutter-x)/ -2);
    }


</style>
