<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetService(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("systemctlstatus", $(node).find("#service").html())
        request("{{ API('get_service') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#serviceModal").modal("show");
            $("#serviceContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsKillPid(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('kill_pid') }}", data, function (response) {
            //Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı.","success",2000);
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    
    function jsPsTree(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
       
        request("{{ API('pstree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#psTreeModal").modal("show");
            $("#psTreeContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetPsCommand(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_ps_command') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#psCommandModal").modal("show");
            $("#psCommandContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
    function jsKillAll(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
       
        request("{{ API('kill_all') }}", data, function (response) {
            //Başarılıysa
            Swal.close();
            showSwal("Başarıyla bütün işlemler sonlandırıldı.","success",2000);
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }




</script>