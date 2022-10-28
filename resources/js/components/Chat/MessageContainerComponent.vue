<template>
    
    <div class="col-md-8 remove-space">
        
            <div class="card-header">
                <span class="float-sm-left">
                    <b>Tristan Mason</b> 
                    <span>12:37 PM GMT+1</span> 
                </span>
                <span class="float-right align-header">
                    <button class="btn-job">View Job</button>
                    <button class="btn-propsal">View Proposal</button>
                </span>
            </div>
            
            <div class="card-body">
            </div>
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
        height: 500px;
    }
    .align-header{
        margin-top: -4px;
    }
</style>
