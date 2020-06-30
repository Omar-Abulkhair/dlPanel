$( document ).ready(function() {
    toastr.options.closeButton=true;
    toastr.options.timeOut="0";
    toastr.options.positionClass="toast-bottom-right";
    toastr.options.containerId="toast-bottom-right";

    $('.delete-btn').on('click', function(e) {

        e.preventDefault();
        var $form = $(this).closest('form');
        $('#delete-modal').modal({
            keyboard: false
        }).on('click', '#delete-confirm', function(e) {
                $form.trigger('submit');
            });
        $("#cancel").on('click',function(e){
            e.preventDefault();
            $('#confirm').modal.model('hide');
        });
    });


    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $('#profile-avatar-btn').click(function(){ $('#avatar').trigger('click'); });

    $("#avatar").change(function() {
        readURL(this,'#profile-avatar-image');
        $('#updateAvatar').submit();
    });

});
