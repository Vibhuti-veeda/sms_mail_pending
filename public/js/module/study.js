$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Study Switch Status Change
$(document).on('change', '.studyStatus', function(){
    if(this.checked){
        option = 1;
    } else {
        option = 0;
    }
    var id = $(this).data('id');

    $.ajax({
        url: "/sms-admin/study-master/view/change-study-status",
        method:'POST',
        data:{ option: option,id:$(this).data('id')},
        success: function(data){
            if(data == 'true'){
                if(option == 1){
                    toastr.success('Study successfully activated');    
                } else if(option == 0){
                    toastr.success('Study successfully deactivated');    
                } else {
                    toastr.error('Something Went Wrong!');    
                }
            } else {
                toastr.success('Study status successfully changed');
            }
        }
    });
});

// Remove Error Message after selecting an option for sponsor
$('.select_sponsor').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#sponsor-error').text('');
    }
});

$('.select_dosage_form').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#dosage_form-error').text('');
    }
});

$('.selectScope').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#scope-error').text('');
    }
});

$('.selectStudyDesign').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_design-error').text('');
    }
});

$('.selectStudySubType').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_sub_type-error').text('');
    }
});

$('.selectSubjectType').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#subject_type-error').text('');
    }
});

$('.selectBlindingStatus').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#blinding_status-error').text('');
    }
});

$('.selectCrLocation').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#cr_location-error').text('');
    }

    $.ajax({
        url: "/sms-admin/study-master/view/select-clinical-ward-location",
        method:'POST',
        data:{ id:val},
        success: function(data){
            $('.selectClinicalWordLocation').empty();
            $.each(data, function (key, val) {
                $('.selectClinicalWordLocation').append('<option value="">Select Clinical Word Location</option><option value="'+val.id+'">'+val.ward_name+'</option>')
            });
        }
    });
});

$('.selectClinicalWordLocation').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#clinical_word_location-error').text('');
    }
});

$('.selectDosage').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#dosage-error').text('');
    }
});

$('.selectUOM').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#uom-error').text('');
    }
});

$('.selectRegulatorySubmission').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#regulatory_submission-error').text('');
    }
});

$('.selectStudyType').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_type-error').text('');
    }
});

$('.selectComplexity').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#complexity-error').text('');
    }
});

$('.selectStudyCondition').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_condition-error').text('');
    }
});

$('.selectPriority').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#priority-error').text('');
    }
});

$('.selectBrLocation').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#br_location-error').text('');
    }
});

$('.study_no_allocation_date').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_no_allocation_date-error').text('');
    }
});

$('.tentative_study_start_date').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#tentative_study_start_date-error').text('');
    }
});

$('.tentative_study_end_date').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#tentative_study_end_date-error').text('');
    }
});

$('.tentative_imp_date').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#tentative_imp_date-error').text('');
    }
});

$('.principleInvestigator').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#principle_investigator-error').text('');
    }
});

$('.projectManager').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#project_manager-error').text('');
    }
});

$('.bioanalyticalInvestigator').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#bioanalytical_investigator-error').text('');
    }
});

$('.studyResult').on('change',function(){
    var val = $(this).val();
    if(val != ''){
        $('#study_result-error').text('');
    }
});

var select_field = [];
$(document).ready(function(){
    
    $("#addProject").submit(function(e){
        var val = $('.addNewDrug').data('id');
        if(select_field == '' && val == ''){
            e.preventDefault();
            toastr.error('Please Add Field!'); 
        }
    });

});

$(document).on('click','.addNewDrug',function(){

    var id = $(this).data('id');
    var value = $(this).data('value');

    $.ajax({
        url: "/sms-admin/study-master/view/select-drug-details",
        method:'POST',
        data:{ value:value, id:id },
        success: function(data){
            $('.new_drug_details').append(data.html);
            $('.select2').select2();
            $('input.width').keyup(function() {
                match = (/(\d{0,40})[^.]*((?:\.\d{0,10})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
            });
        }
    });

    //$('.new_drug_details').append(pro);
    id++; value++;
    select_field.push(id);
    $(this).data('value',value);
    $(this).data('id',id);
});

$(document).on('click','.remove',function(){ 
    var id = $('#drug_id_'+$(this).data('id')).val();
    $(this).closest('.removeRow').remove();
});

$(document).on('change','.select_drug',function(){ 
    
    var value = $('.select_drug').val(); 
    
    if(value != ''){ 
        $(this).css('color', 'blue');
    } else { 
        $(this).css('color', 'black');
    }
});

$(document).on('change','.select_dosage_form',function(){ 
    var value = $('.select_dosage_form').val(); 

    if(value != ''){ 
        $(this).css('color', 'blue');
    } else { 
        $(this).css('color', 'black');
    }
});

$(document).on('change','.studyResult',function(){
    var id = $(this).data('id');
    var result = $(this).val();
    
    $.ajax({
        url: "/sms-admin/study-master/view/study-result",
        method:'POST',
        data:{ id:id, result:result },
        success: function(data){
            if(data == 'true'){
                toastr.success('Study result successfully updated');    
            } else {
                toastr.success('Something went wrong');
            }
        }
    });
});

$(document).on('change','.studyHoldStatus',function(){
    var id = $(this).data('id');
    var status = $(this).val();
    
    $.ajax({
        url: "/sms-admin/study-master/view/study-status",
        method:'POST',
        data:{ id:id, status:status },
        success: function(data){
            if(data == 'true'){
                toastr.success('Study status successfully updated');    
            } else {
                toastr.success('Something went wrong');
            }
        }
    });
});

$(document).on('change','.studyProjected',function(){
    var id = $(this).data('id');
    var projected = $(this).val();
    
    $.ajax({
        url: "/sms-admin/study-master/view/study-projected",
        method:'POST',
        data:{ id:id, projected:projected },
        success: function(data){
            if(data == 'true'){
                toastr.success('Study projected successfully updated');    
            } else {
                toastr.success('Something went wrong');
            }
        }
    });
});

$(document).on('change','.tentativeClinicalDate',function(){
    var id = $(this).data('id');
    var date = $(this).val();
    
    $.ajax({
        url: "/sms-admin/study-master/view/study-tentative-clinical-date",
        method:'POST',
        data:{ id:id, date:date },
        success: function(data){
            if(data == 'true'){
                toastr.success('Study tentative clinical date successfully updated');    
            } else {
                toastr.success('Something went wrong');
            }
        }
    });
});

$(document).on('click','.deleteBtn',function(e){
    e.preventDefault();
    var delete_id = $(this).val();
    $('#study_id').val(delete_id);
    $('#openDeleteStudyModal').modal('show');
});

$("#addProject").submit(function(e){

    var totalSubjects = parseInt($('.totalSubject').val());
    var femaleSubjects = parseInt($('.femaleSubject').val());
    var maleSubjects = parseInt($('.maleSubject').val());
    var maleFemale = maleSubjects + femaleSubjects;

    if(totalSubjects == maleFemale){
    } else {
        $('.maleSubject').val('');
        $('.femaleSubject').val('');
        toastr.error('Please enter correct male & female subjects');
    }
});

$(document).on('change','.projectionStatus',function(){
    var studyId = $(this).data('id');
    var status = $(this).val();

    $.ajax({
        url: "/sms-admin/study-master/view/pre-study-projection-status",
        method:'POST',
        data:{ study_id:studyId, projection_status:status },
        success: function(data){
            if(data == 'true'){
                toastr.success('Pre study status successfully updated');
            } else {
                toastr.success('Something went wrong');
            }
        }
    });
});