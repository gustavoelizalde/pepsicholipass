function exportar(baseUrl) {
    var separador = prompt("Ingrese el separador deseado", ",");
    
    window.location.replace(baseUrl+"/admin/registrados/excel?separador="+separador);
}

function pageSize(baseUrl, valor){
        $.ajax({
        type: "POST",
        url: baseUrl+"/admin/registrados/updatePageSize",
        data: {pageSize: valor},
        success: function(data){
            window.location.reload();
        }
    })
}