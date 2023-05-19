
{{-- Add Tasks Modal  --}}
<div class="modal fade" id="add_task_model_id" tabindex="-1" role="dialog" aria-labelledby="AddTask" aria-hidden="true">
            
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <form action="{{route('work-diary.store')}}"  id="new_task_add_form" enctype="multipart/form-data">
                <input type="hidden" name="task_id" id="task_id">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                    <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                
                <div class="modal-body">
                        @csrf
                        <div class="row">
                            
                            <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="title">Planning Date *</label>
                                    <input type="date" class="form-control" name="planning_date" id="planning_date" >
                                </div>
                            </div>
                        

                            {{-- <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                <div class=" mb-3 select2_element ">
                                    <label for="title">Timezone *</label>
                                    <select
                                        name="timezone_id"
                                        class="form-control select2 select2-hidden-accessible"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        multiple="false"
                                        style="width: 100% !important"
                                        id="timezone_id"
                                        
                                        >
                                        <option value="" disabled>Select Timezone</option>
                                        @foreach ($timezones as $timezone)
                                            <option value="{{$timezone->id}}" >{{$timezone->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div> --}}

                            <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="title">Start Time *</label>
                                    <input type="time" name="start_time" id="start_time" pattern="[0-9]{2}:[0-9]{2}" step="1" min="00:00" max="23:59" >
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="title">End Time *</label>
                                    <input type="time" name="end_time" id="end_time" pattern="[0-9]{2}:[0-9]{2}" step="1" min="00:00" max="23:59" >
                                    
                                </div>
                            </div>

                            {{-- @if(Route::currentRouteName() == 'work-diary.index')
                                <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="title">Contract ID</label>
                                        <select
                                            name="contract_id"
                                            class="form-control"
                                            style="width: 100% !important"
                                            id="contract_id"
                                            >
                                            <option value="" disabled>Select Contract ID</option>
                                            @foreach ($contracts as $contract)
                                                <option value="{{$contract->id}}">{{$contract->contract_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                            @endif --}}
                            <input type="hidden" name="contract_id"  id="contract_id" value="{{$contract_id}}">

                           
                            <input type="hidden" name="already_uploaded_files" id="already_uploaded_files_id">

                            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <label for="title"> Add Task Details *</label>
                                <textarea name="description" id="description_id"  rows="5" placeholder="write task description here ..."></textarea>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                
                                <div >
                                    
                                    <label class="btn-outline-green" for="uploaded_files"><i class="fa fa-paperclip" aria-hidden="true"></i>Upload Attachments</label>
                                    <input type="file" name="uploaded_files[]" id="uploaded_files" style="display: none;visibility:none" onchange="writeFileName()" multiple accept="image/*">
                                    
                                </div>

                                <div>
                                    <ul class="list-group" id="file_name_div">
                                        
                                    </ul>
                                </div>

                            </div>

                        </div>
                    
                    
                </div>

                <div class="modal-footer">
                
                    <button type="button" class="btn-rounded text-white btn-cancel" data-bs-dismiss="modal" id="cancel_task_btn_id">@lang('Cancel')</button>
                    <button type="submit" class="btn-rounded text-white btn-save-draft" name="action" value="draft" id="save_btn_id">@lang('Save')</button>
                    <button type="submit" class="btn-rounded text-white btn-save" name="action" value="approval" id="save_btn_id">@lang('Submit for Approval')</button>
                </div>

            </form>

        </div>

    </div>

</div>

@push('script')
    <script>
        
        let already_uploaded_files=[];
        let new_task_add_form=$('#new_task_add_form');
        
       
        function writeFileName()
        {
            $('#file_name_div').empty();
            var number_of_files=$('#uploaded_files').get(0).files.length;
            if(already_uploaded_files.length > 0){
                loadDefaultFiles(already_uploaded_files);
            }
            var form= new FormData();
            for (let index = 0; index < number_of_files; index++) {
                file=$('#uploaded_files').get(0).files[index];
                $('#file_name_div').append('<li class="list-group-item d-flex justify-content-between align-items-center" id="file_detail_'+file.name.replace(/[^\w]/gi, "_")+'">'+file.name+'<span class="badge badge-primary badge-pill delete-btn"  id="'+file.name.replace(/\./g,'_')+'"  data-id="'+file.name+'"><i class="fa fa-trash" style="color:red" ></i></span></li>');
            }


        }

        $(document).on('click', '.delete-btn', function(e) {

            filename=jQuery(this).attr("id");
            filename = filename.replace(/[^\w]/gi, "_");

            let for_ar_files=filename.replace(/_/g, ".");

            const keyToRemove = "name";
            const valueToRemove = for_ar_files;
            const indexToRemove = already_uploaded_files.findIndex(obj => obj[keyToRemove] === valueToRemove);

            if (indexToRemove !== -1) {
                already_uploaded_files.splice(indexToRemove, 1);
                $('#already_uploaded_files_id').val(JSON.stringify(already_uploaded_files));
            }

            $('#file_detail_'+filename).remove();

            var original_file_name=$(this).attr("data-id");
            const dt = new DataTransfer();
            var number_of_files=$('#uploaded_files').get(0).files.length;

            for (let index = 0; index < number_of_files; index++) {

                file=$('#uploaded_files').get(0).files[index];
                console.log(file.name);
                if(file.name!=original_file_name)
                {
                    dt.items.add(file);
                }

            }
            $('#uploaded_files').get(0).files=dt.files;

        });

        function displayAlertMessage(message)
        {
            iziToast.error({
                message: message,
                position: "topRight",
            });
        }

        function displaySuccessMessage(message)
        {
            iziToast.success({
                message: message,
                position: "topRight",
            });
        }

        function displayErrorMessage(validation_errors)
        {
            $('input,select,textarea').removeClass('error-field');
            $('.select2-container--default').removeClass('error-field');

            for (var error in validation_errors) { 
                
                var error_message=validation_errors[error];
                $('[name="'+error+'"]').addClass('error-field');
                $('[id="'+error+'"]').addClass('error-field');
                $('#'+error).next().addClass('error-field');
                displayAlertMessage(error_message);
            }

        }

        function AddTask(actionValue){
            let add_task_route="{{route('work-diary.store')}}";
            let form_data = new FormData(new_task_add_form[0]);
            form_data.append('action', actionValue);
            form_data.append('attachments', $('#uploaded_files')[0].files);
            $.ajax({
                type:"POST",
                headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                url:add_task_route,
                processData: false,  
                contentType: false,
                enctype: 'multipart/form-data',
                data: form_data,
                success:function(data){
                    console.log(data);
                    if(data.errors){
                        displayErrorMessage(data.errors);
                    }
                    if(data.error){
                        displayAlertMessage(data.error);
                    }
                    if(data.success){
                        $('#start_time').val('');
                        $('#end_time').val('');
                        $('#description_id').val('');
                        displaySuccessMessage(data.success);
                    }
                    if(data.redirect){
                        getDayPlanning(data.uuid,data.day,false); 
                        var datePicker = document.getElementById("datepicker");
                        var currentDate = new Date(data.day);
                        var flatpickrInstance = flatpickr(datePicker, {
                        dateFormat: "D, j M", 
                        defaultDate: currentDate,
                            onClose: function(selectedDates) {
                                datePicker.value = flatpickrInstance.formatDate(selectedDates[0], "D, j M");
                            }
                        });
                        $('#add_task_model_id').modal('hide');
                    }
                }
            });  
        }

        $(document).ready(function() {
        
            $('#timezone_id').select2({
                tags: true,
                maximumSelectionLength: 1,
                closeOnSelect: true,
                dropdownParent: $('#add_task_model_id')
            });

            new_task_add_form.submit(function (e) {

                e.preventDefault();
                e.stopPropagation();
                let actionValue= null; 
                var clickedButton = $(this).find(':focus');
                // Determine the value of the action field based on the clicked button
                if (clickedButton.hasClass('btn-save-draft')) {
                    actionValue = 'draft';
                } else if (clickedButton.hasClass('btn-save')) {
                    actionValue = 'approval';
                }
                console.log("button" + actionValue);
                AddTask(actionValue);


            });

           

        });

       

    </script>
@endpush

@push('style')
    <style>
    .btn-save {
        background-color: #7f007f;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #fff;
        padding: 6px 2px;
        font-size: 13px;
        width: 8rem !important;

    }
    .btn-save-draft {
        background-color: transparent;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #7f007f !important;
        width: 5rem !important;
        padding: 6px 2px;
        font-size: 13px;
    }
    .btn-cancel {
        background-color: transparent;
        border-radius: 5px;
        color: #7f007f !important;
        width: 5rem !important;
        padding: 6px 2px;
        font-size: 13px;
    }
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #e1e7ec;
        height: 44px !important;

    }

    </style>
@endpush

