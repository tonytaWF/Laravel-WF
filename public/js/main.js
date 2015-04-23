$(function() {
    //edit form style - popup or inline
    $.fn.editable.defaults.params = function (params) {
        params._token = $('#_token').data('token');
        return params;
    };
    $.fn.editable.defaults.mode = 'inline';

    $('#editable-project-name').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        url: '/projects/edit-title',
        title: 'Edit Project Name',
        placement: 'top',
        send: 'always',
        ajaxOptions: {
            dataType: 'json'
        },
        success: function(response, newValue) {
            //alert(response.project_id);
            if(response.status == 'error') return response.msg; //msg will be shown in editable form
        }

    });

    $('#editable-experiment-name').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        url: '/experiments/edit-title',
        title: 'Edit Experiment Name',
        placement: 'top',
        send: 'always',
        ajaxOptions: {
            dataType: 'json'
        },
        success: function(response, newValue) {
            //alert(response.project_id);
            if(response.status == 'error') return response.msg; //msg will be shown in editable form
        }

    });

    $('#datetimepicker').datetimepicker();

});