$(function() {
    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html("Tambah data");
        $('.modal-body form').attr('action', 'http://localhost:8080/MVC_PHP/public/mahasiswa/tambah'); //attr() adalah mengubah atribut dari element yang dipilih
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    })

    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html("Ubah data");
        $('.modal-body form').attr('action', 'http://localhost:8080/MVC_PHP/public/mahasiswa/ubah');
        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost:8080/MVC_PHP/public/mahasiswa/getUbah', //Mengambil data controller di mahasiswa dan methodnya getUbah
            data: {id: id}, // Mengirim id 
                method: 'post', // Mengirim id menggunakan method post
                dataType: 'json', // Mengembalikan datanya berupa JSON
                success: function(data){
                    $('#nama').val(data.nama); // .val() jika di js artinya value()
                    $('#nrp').val(data.nrp);
                    $('#email').val(data.email);
                    $('#jurusan').val(data.jurusan);                
                    $('#id').val(data.id);           
                }
        })
        // di dalam variable id ada code: "$(this).data('id');" artinya  $(this) adalah elemet tombol yang diklik ambil .data('id) artimya ambil data 'id'
        // Ingat($(this) tidak berlaku di arrow function Karena $(this) di function arrow akan mencari data yang ada di luar arrow function (object.window)
    })
    
    // Mencari class dengan nama tampilModelUbah Jika di javascript codenya menjadi seperti: document.querySelector(".tampilModalUbah");
    // .on("click", function(){}) kegunaan nya sama seperti .addEventListener(); yaitu mentrigger element jika ada event yang terjadi seperti di click dan lainnya
})
// Arti fungsi dari atas(jQuery) ketika dokumen sudah siap maka jalan fungsi nya. Code: $.(function() { })
