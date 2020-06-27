$(document).ready(function () {
        $('#users-table').DataTable({
            "ajax":window.table,
            "columns": [
                { "data": "avatar",
                    "render":function (data, type, row) {
                        return '$'+ data;
                    }
                },
                { "data": "name" },
                { "data": "email" },
                { "data": "id" },
                { "data": "lastLogin" },
                { "data": "active" }
            ]
        });
});
