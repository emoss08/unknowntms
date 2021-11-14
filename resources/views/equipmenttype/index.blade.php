<x-base-layout>
    <!-- begin:: If Javascript fails back up error handling alert -->
    <!-- begin::Error Message Handling -->
    @if (count($errors) > 0)
        <!--begin::Alert-->
            @foreach ($errors->all() as $error)
                @includeIf('equipmenttype.partials._alert')
            @endforeach
    @endif
    <!-- end::Error Message Handling -->
    <!-- end:: If Javascript fails back up error handling alert -->

    <!-- begin:: Content -->
    @includeIf('equipmenttype.partials._content')
    @includeIf('equipmenttype.partials._create_modal')
    @includeIf('equipmenttype.partials._edit_modal')
    <!-- end:: Content -->
</x-base-layout>

<!-- begin:: Form Validation Script for each Equipment Type -->
@foreach ($equipmenttype as $equipmenttypes)
    <script>
        "use strict";var EquipmentType_edit_{{ $equipmenttypes->id }}=function(){var t,e,i;return{init:function(){t=document.querySelector("#equip_type_form_edit-{{ $equipmenttypes->id }}"),e=document.querySelector("#equip_type_submit_edit-{{ $equipmenttypes->id }}"),i=FormValidation.formValidation(t,{fields:{status:{validators:{notEmpty:{message:"Status field is required."}}},equip_type_id:{validators:{notEmpty:{message:"The equipment type id is required"},stringLength:{min:1,max:4,message:"Equipment Type ID must be more than 1 and less than 4 characters long."},regexp:{regexp:/^[a-zA-Z0-9]+$/,message:"Equipment Type ID can only consist of alphabetical and number"}}},description:{validators:{notEmpty:{message:"Description field is required."},stringLength:{min:1,max:50,message:"Description must be more than 1 and less than 50 characters long."},regexp:{regexp:/^[a-z\s]+$/i,message:"Description can consist of alphabetical characters and spaces only."}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})},err:{clazz:"invalid-feedback"},control:{valid:"is-valid",invalid:"is-invalid"}}),e.addEventListener("click",function(n){n.preventDefault(),i.validate().then(function(i){"Valid"===i?(e.setAttribute("data-kt-indicator","on"),e.disabled=!0,axios.post(e.closest("form").getAttribute("action"),new FormData(t)).then(function(e){Swal.fire({text:"New record successfully processed!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn font-weight-bold btn-light-primary"}}).then(function(e){e.isConfirmed&&(t.querySelector('[name="equip_type_id"]').value="",t.querySelector('[name="description"]').value="",window.location.reload())})}).catch(function(t){let e=t.response.data.message,i=t.response.data.errors;for(const t in i)i.hasOwnProperty(t)&&(e+="\r\n"+i[t]);t.response&&Swal.fire({text:e,icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}).then(function(){e.removeAttribute("data-kt-indicator"),e.disabled=!1})):Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})})})}}}();KTUtil.onDOMContentLoaded(function(){EquipmentType_edit_{{ $equipmenttypes->id }}.init()});
    </script>
@endforeach
<!-- end:: Form Validation Script for each Equipment Type -->

<!-- begin::Script to Produce DataTable for Equipment Types -->
<script>
    $(function(){$('#equip-type-table').DataTable({processing:!0,serverSide:!0,searching:!1,"order":[[0,"desc"]],search:{return:!0},pageLength:7,ajax:'{!! route('equipmenttype.list') !!}',columns:[{data:'status',name:'status'},{data:'equip_type_id',name:'equip_type_id'},{data:'description',name:'description'},{data:'Actions',name:'Actions',orderable:!1,serachable:!1,sClass:'text-center'},]})})
</script>

<!-- end::Script to Produce DataTable for Equipment Types -->

