@extends('Layout.Master')
@section('title','Cập Nhật Avatar')
@section('main')
<div class="account">
    <h1>Cập Nhật Avatar</h1>

    {!! Form::open(['url' => 'Account/DangKy', "class" => "form-inline",
        'enctype' => 'multipart/form-data', 'data-toggle'=>"validator"]) !!}
        <div class="col-sm-4 text-center">
            <div class="kv-avatar">
                <div class="file-loading">
                    <input id="avatar-2" name="avatar-2" type="file" required>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
<script>
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    
    defaultPreviewContent: '<img src=\"{{ asset('storage/img/'.Session::get('TaiKhoan.avatar')) }}\" alt="Your Avatar"><h6 class="text-muted">Chọn hình</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
@stop