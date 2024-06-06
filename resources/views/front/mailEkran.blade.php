

*halilin kod*

$.ajax({
url: '{{ route('superadmin.tickets.getDepartment') }}',
success: function(data) {
data.forEach(function(department) {
var parent_id = department.parent_id;
var parentUL = $('#departmentUl_' + parent_id);

if (parentUL.length) {
// bu child checkBox satırı parentUL içerisine eklensin
var checkBox =
'<div class="d-none departmentDiv" style="margin-left: 20px" id="departmentDiv_' + department.department_id + '">' +
    '<li id="departmentLi_' + department.department_id + '" class="list-group-item" style="list-style: none;border: none!important;">' +
        '<div id="ok_' + department.department_id + '" class="ok"></div>' +
        '<input onchange="departmentChange(' + department.department_id + ')" class="department_select form-check-input me-1 " id="departmentInput_' + department.department_id + '" type="checkbox" value="' + department.department_id + '" aria-label="Checkbox for following text input">' +
        '<label id="departmentLabel_' + department.department_id + '" for="departmentInput_' + department.department_id + '">' + department.name + '</label>' +
        '</li>' +
    '<ul style="margin-left: 20px" class="list-group list-group-light department_children" id="departmentUl_' + department.department_id + '"></ul>' +
    '</div>';
parentUL.append(checkBox);
}

var departmentDiv = $('.departmentDiv');
departmentDiv.each(function(index, depDiv) {
var id = $(depDiv).attr('id').split('_')[1];
var ok = $('#ok_' + id);
if ($('#departmentUl_' + id).children().length != 0) {
addOk(id);
} else {
removeOk(id);
}
});
});
},
error: function(data) {
console.log(data);
}
});



********************************
*diyarın kod*

$.ajax({
url: '{{route('newStatistics.filterFacultyPapers',['language'=>app()->getLocale()])}}',
type: "POST",
headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
data: formData,
dataType: "json",
contentType: false,
processData: false,


*********************
*yazmaya çalıtığım kod*
$.ajax({
url'{{route('sil2',['id'=>':id']) }}.replace(':id', taskId)',
type:"GET",
headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
data: formData,
dataType: "json",




*********************
*benim hatalı kod*

fetch(silRoute, {
headers: {
'X-CSRF-TOKEN': "{{ csrf_token() }}"
},
data: {'id':taskId}
})
.then(response => {
if (response.ok) {
Swal.fire({
title: "Silindi!",
text: "veri başarılı şekilde silindi.",
icon: "success"
}).then(ok =>{
$('#task-table').DataTable().ajax.reload()
});

} else {
Swal.fire({
title: "Hata!",
text: "Veri silinirken bir hata oluştu.",
icon: "error"
});
}
})
.catch(error => {
console.error('Error:', error);
Swal.fire({
title: "Hata!",
text: "Veri silinirken bir hata oluştu.",
icon: "error"
});




********************

*chatgpt*

$.ajax({
url: '{{ route('sil2', ['id' => ':id']) }}'.replace(':id', idToDelete),
method: 'DELETE',
headers: {
'X-CSRF-TOKEN': "{{ csrf_token() }}"
},
success: function(response) {
console.log('Başarıyla silindi:', response);
// Başarı durumunda sayfayı yenileyebilir veya gerekli işlemleri gerçekleştirebilirsiniz.
},
error: function(xhr, status, error) {
console.error('Hata:', error);
}
});
*

