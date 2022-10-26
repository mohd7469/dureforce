<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="col-md-4">
                            <img alt="User Pic" src="https://raw.githubusercontent.com/mdn/learning-area/master/html/multimedia-and-embedding/images-in-html/dinosaur_small.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 85px;height: 85px"> 
                        </div>
                        <div>
                            UserName
                        </div>
                    </div>
                </div>
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
