<template>
    
    <div class="col-md-4 border-right-custom">
        
        <div class="row border-bottom">
            <div class="col-md-3">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 60px;height: 57px"> 
            </div>

            <div class="col-md-5 align-self-center">
                <b class="user-font-size">Sajid Mehmood</b>
                <span class="user-font-size">Full Stack Developer</span>
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size">22-09-2022</span>
            </div>

        </div>

        <div class="row border-bottom">
            <div class="col-md-3">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 60px;height: 57px"> 
            </div>

            <div class="col-md-5 align-self-center">
                <b class="user-font-size">Sajid Mehmood</b>
                <span class="user-font-size">Full Stack Developer</span>
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size">22-09-2022</span>
            </div>

        </div>

        <div class="row border-bottom">
            <div class="col-md-3">
                <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 60px;height: 57px"> 
            </div>

            <div class="col-md-5 align-self-center">
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
    .user-font-size{
        font-size: 12px;
    }
    .border-bottom{
        
        padding-top: 7px;
        padding-bottom: 7px;
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
