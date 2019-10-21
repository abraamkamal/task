@extends('layouts.master')


@section('content')
    <h1>Ajax Crud using Yajra Datatable ServerSide</h1>
    <input type="button" value="Add New"class="btn btn-primary" id="btnAdd" onclick="ShowModel()"></input>
{{--    <div id="button" data-role="button">Click on button</div>--}}


    <br>
    <br>
	<table class="table table-striped" id="tblData" cellspacing="0" width="100%">
    {{csrf_field()}}
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Screen Name</th>
                <th>Description</th>
                <th>Content</th>
                <th>User Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
@endsection

@section('modal')
<!-- start addmodal-->
<div class="modal fade" tabindex="-1" role="dialog" id="mdlAddData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Form</h4>
            </div>
            <div class="modal-body">
            <form role="form" id="frmDataAdd" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="control-label">
                    Name<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" name="name">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label">
                        Image<span class="required">*</span>
                    </label>
                    <input type="file" class="form-control" id="image" name="image">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="screen_name" class="control-label">
                        Screen name<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="screen_name" name="screen_name">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="content" class="control-label">
                        content<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="content" name="content">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">
                        description<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="description" name="description">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="user_name" class="control-label">
                        User Name<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="user_name" name="user_name">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label">
                        date<span class="required">*</span>
                    </label>
                    <input type="date" class="form-control" id="date" name="date">
                    <p class="errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">
                        Status<span class="required">*</span>
                    </label>

                    <input type="radio" class="form-control" id="status" value="1" name="status">
                    <p class="errorName text-danger hidden"></p>
                </div>

            </form>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="button" value="Save" class="btn btn-primary" id="btnSave" onclick="save()"></input>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- start endmodal-->

<!-- start editmodal-->
<div class="modal fade" tabindex="-1" role="dialog" id="mdlEditData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Form</h4>
            </div>
            <div class="modal-body">
            <form role="form" id="frmDataEdit">
                <div class="form-group">
                    <label for="edit_ID" class="control-label">
                    ID
                    </label>
                    <input type="text" class="form-control" id="edit_ID" name="edit_ID" disabled>
                </div>
                <div class="form-group">
                    <label for="edit_name" class="control-label">
                    Name<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name">
                    <p class="edit_errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_image" class="control-label">
                    Image<span class="required">*</span>
                    </label>
                    <input type="image" class="form-control" id="edit_image" name="edit_imageg">
                    <p class="edit_errorImage text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_screen_name" class="control-label">
                        Screen Name<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_screen_name" name="edit_screen_name"></textarea>
                    <p class="edit_errorScreen_name text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_content" class="control-label">
                        Content<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_content" name="edit_content"></textarea>
                    <p class="edit_errorContent text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_description" class="control-label">
                        Description<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_description" name="edit_description"></textarea>
                    <p class="edit_errorDescription text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_user_name" class="control-label">
                        User Name<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_user_name" name="edit_user_name"></textarea>
                    <p class="edit_errorUser_name text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_date" class="control-label">
                        Date<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_date" name="edit_date"></textarea>
                    <p class="edit_errorDate text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_status" class="control-label">
                        Status<span class="required">*</span>
                    </label>
                    <textarea class="form-control" id="edit_status" name="edit_status"></textarea>
                    <p class="edit_errorStatus text-danger hidden"></p>
                </div>

            </form>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="button" value="Save" onclick="update()" class="btn btn-primary" id="btnUpdate"><i class="glyphicon glyphicon-save"></i></input>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end editmodal-->
@endsection

@push('scripts')

<script type="text/javascript" charset="utf-8" async defer>

//ajax header need for deleted and updating data

    var table;

//datatables serverSide
    $('document').ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        table = $('#tblData').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide : true,
            order : [0,'desc'],
            ajax: {
                "url": "{!! route("test") !!}",
                "type": "POST",
            },
            columns: [
                {data: 'id' , name : 'id' },
                {data: 'name' , name : 'name' },
                {data: 'image' , name : 'image',type:'image' },
                {data: 'screen_name' , name : 'screen_name' },
                {data: 'description' , name : 'description' },
                {data: 'content' , name : 'content' },
                {data: 'user_name' , name : 'user_name' },
                {data: 'date' , name : 'date',type:'date' },
                {data: 'status' , name : 'status', type:'boolean' },
                {data: 'action' , name : 'action', orderable : false ,searchable: false}
            ]
        });
        // table.draw(false);
    });


$("#button").click( function()
    {
        alert('button clicked');
    }
);

//calling add modal
function ShowModel(){
    $('#mdlAddData').modal('show');
}
    // $('#btnAdd').click(function(e){
    //     // $(this).data('clicked', true);
    //     $('#mdlAddData').modal('show');
    //
    // });


//Adding new data
function save(){
    // debugger;

    $('#btnSave').click(function(e){
        e.preventDefault();
        var frm = $('#frmDataAdd');
        $.ajax({
            url : '{{route('crud.store')}}',
            type : 'POST',
            dataType: 'json',
            data : {
                'csrf-token': $('input[name=_token]').val(),
                name : $('#name').val(),
                image: $('#image').val(),
                screen_name : $('#screen_name').val(),
                content: $('#content').val(),
                description: $('#description').val(),
                user_name: $('#user_name').val(),
                date: $('#date').val(),
                status: $('#status').val(),

            },
            success:function(data){

                $('.errorName').addClass('hidden');
                $('.errorContact').addClass('hidden');
                $('.errorAddress').addClass('hidden');
                if (data.errors) {
                    if (data.errors.name) {
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
                    if (data.errors.contact) {
                        $('.errorContact').removeClass('hidden');
                        $('.errorContact').text(data.errors.contact);
                    }
                    if (data.errors.address) {
                        $('.errorAddress').removeClass('hidden');
                        $('.errorAddress').text(data.errors.address);
                    }
                }
                if (data.success == true) {
                    $('#mdlAddData').modal('hide');
                    frm.trigger('reset');
                    table.ajax.reload(null,false);
                    swal('success!','Successfully Added','success');

                }
            }
        });
    });

}

//calling edit modal and id info of data
function edit(){
    $('#tblData').on('click','.btnEdit[data-edit]',function(e){
        e.preventDefault();
        var url = $(this).data('edit');
        swal({
                title: "Are you sure want to Edit this item?",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url : url,
                        type : 'GET',
                        datatype : 'json',
                        success:function(data){
                            $('#edit_ID').val(data.id);
                            $('#edit_name').val(data.name);
                            $('#edit_image').val(data.image);
                            $('#edit_screen_name').val(data.screen_name);
                            $('#edit_content').val(data.content);
                            $('#edit_description').val(data.description);
                            $('#edit_user_name').val(data.user_name);
                            $('#edit_date').val(data.date);
                            $('#edit_status').val(data.status);

                            $('.edit_errorName').addClass('hidden');
                            $('.edit_errorContact').addClass('hidden');
                            $('.edit_errorAddress').addClass('hidden');
                            $('#mdlEditData').modal('show');
                            $('#mdlEditData').modal('show');
                        }

                    });
                }
            });
    });

}

// updating data infomation
function update(){
    $('#btnUpdate').on('click',function(e){
        e.preventDefault();
        var url = "{{route('crud.store')}}/"+$('#edit_ID').val();
        var frm = $('#frmDataEdit');
        $.ajax({
            type :'POST',
            url : url,
            dataType : 'json',
            data : frm.serialize(),
            success:function(data){
                // console.log(data);
                if (data.errors) {

                    if (data.errors.edit_name) {
                        $('.edit_errorName').removeClass('hidden');
                        $('.edit_errorName').text(data.errors.edit_name);
                    }
                    if (data.errors.edit_image) {
                        $('.edit_errorImage').removeClass('hidden');
                        $('.edit_errorImage').text(data.errors.edit_image);
                    }
                    if (data.errors.edit_screen_name) {
                        $('.edit_errorScreen_name').removeClass('hidden');
                        $('.edit_errorScreen_name').text(data.errors.edit_screen_name);
                    }
                    if (data.errors.edit_content) {
                        $('.edit_errorContent').removeClass('hidden');
                        $('.edit_errorContent').text(data.errors.edit_content);
                    }
                    if (data.errors.edit_description) {
                        $('.edit_errorDescription').removeClass('hidden');
                        $('.edit_errorDescription').text(data.errors.edit_description);
                    }
                    if (data.errors.edit_user_name) {
                        $('.edit_errorUser_name').removeClass('hidden');
                        $('.edit_errorUser_name').text(data.errors.edit_user_name);
                    }
                    if (data.errors.edit_date) {
                        $('.edit_errorDate').removeClass('hidden');
                        $('.edit_errorDate').text(data.errors.edit_date);
                    }
                    if (data.errors.edit_status) {
                        $('.edit_errorStatus').removeClass('hidden');
                        $('.edit_errorStatus').text(data.errors.edit_status);
                    }
                }
                if (data.success == true) {
                    // console.log(data);

                    $('.edit_errorID').addClass('hidden');
                    $('.edit_errorName').addClass('hidden');
                    $('.edit_errorImage').addClass('hidden');
                    $('.edit_errorScreen_name').addClass('hidden');
                    $('.edit_errorContent').addClass('hidden');
                    $('.edit_errorDescription').addClass('hidden');
                    $('.edit_errorUser_name').addClass('hidden');
                    $('.edit_errorDate').addClass('hidden');
                    $('.edit_errorStatus').addClass('hidden');
                    frm.trigger('reset');
                    $('#mdlEditData').modal('hide');
                    swal('Success!','Data Updated Successfully','success');
                    table.ajax.reload(null,false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Please Reload to read Ajax');
                }
        });
    });
    }

//deleting data
function destroy() {
    $('#tblData').on('click', '.btnDelete[data-remove]', function (e) {
        e.preventDefault();
        var url = $(this).data('remove');
        swal({
                title: "Are you sure want to remove this item?",
                text: "Data will be Temporary Deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false,
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', submit: true},
                        success: function (data) {
                            if (data == 'Success') {
                                swal("Deleted!", "Category has been deleted", "success");
                                table.ajax.reload(null, false);
                            }
                        }
                    });

                } else {

                    swal("Cancelled", "You Cancelled", "error");

                }

            });
    });
}
</script>
@endpush