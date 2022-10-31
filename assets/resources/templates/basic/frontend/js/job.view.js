'use strict';
        
$(document).ready(function() {
    fetchSkills();
    });

$('#defaultSearch').on('change', function() {
    this.form.submit();
});

const genRand = (len) => {
    return Math.random().toString(36).substring(2,len+2);
}

function populateSkills(data)
{
    var selected_skills=$('#job_skills').val();
    console.log(selected_skills);
    selected_skills=(selected_skills.split(','));
    selected_skills=selected_skills.map(Number);

    console.log(selected_skills);

    
    for (var main_category in data) { //heading main
        
        var all_sub_categories=data[main_category];
        var main_category_id=genRand(5);
        var remove =true;
        $('#form_attributes').append('<div class="row custom_cards_s" id="'+main_category_id+'"><h4 class="d-heading">'+main_category+'</h4>');
        for (var sub_category_enum in all_sub_categories) { //front end backend 

            var skills=all_sub_categories[sub_category_enum];
            var sub_category_id=genRand(5);
            var sub_skills=skills.map(a => a.id);
            if(selected_skills.some(r => sub_skills.includes(r))){
                remove=false
                $('#'+main_category_id).append('<div class="col-md-6"><div class="card" ><div class="card-body"><h5 class="card-title">'+sub_category_enum+'</h5><div class="admin-row row" id="'+sub_category_id+'">');
                
                    for (var skill_index in skills) {
                    
                    var skill_id=skills[skill_index].id;
                    var skill_name=skills[skill_index].name;
                    if( selected_skills.includes(skill_id)){
                        $('#'+sub_category_id).append('<p class="card-text ad-job-detail">'+skill_name+'</p>');
                    }
                }
            }
            
            
        }
        $('#'+main_category_id).append('</div>');
        if(remove)
            $('#'+main_category_id).remove();

        
    }
    $('#form_attributes').append('</div>');


}

function fetchSkills() {
    var category_id    = $('#category_id').val();
    var sub_catgory_id = $('#sub_category_id').val();
    $.ajax({
        type:"GET",
        url:'/job-skills',
        data: {category_id : category_id,sub_category_id:sub_catgory_id},
        success:function(data){
            var html = '';
            if(data.error){
            
            }
            else{
                populateSkills(data);            
            }
        }
    });  
}

function attach(id) {
    
    $.ajax({
        type: "GET",
        url: '{{url("job/attachment")}}',
        data: {
            id: id,
        },
        success: function (data) {
        console.log(data);
            var blob = new Blob([data]);
        var link = document.createElement('a');
        
        link.href = window.URL.createObjectURL(blob);
        link.download = 
        'sample.pdf'
        link.click();
        
        },
    });
}