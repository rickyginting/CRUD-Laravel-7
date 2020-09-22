$('.namaDosen').select2({
    ajax: {
        url: 'http://localhost:8000/api/dosen',
        dataType: 'json',
        delay: 250,

        processResults: function(data) {
            var results = [];

            $.each(data, function(index, item) {
                results.push({
                    id: item.id,
                    text: item.nama_dosen
                });
                //Menyimpan Nip Ke Textbox
                $("#hasil").val(item.id);
            });

            return {
                results: results
            };

        }
    }
});