<script>
    
    function fileManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('route_getFiles') }}", data, function (response) {
            // Başarılıysa
            $("#fileManager_id").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }





</script>