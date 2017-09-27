function ambildata(url, changeId, fungsi){
        var ajax = new XMLHttpRequest();
        url +="&no=" + Math.random; 
        ajax.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                fungsi(this, changeId);
            } 
        };
        ajax.open("GET",url,true);
        ajax.send();
        
    }
    function crudjadwal(ajax, changeId){
        document.getElementById(changeId).innerHTML = ajax.responseText;
        $(".crud-jadwal").click(function(){
            var num = $(this).attr('id');
            var hari = num/1000>>0;
            /*switch (num/1000>>0){
                case 1 : hari="senin";
                    break;
                case 2 : hari="selasa";
                    break;
                case 3 : hari="rabu";
                    break;
                case 4 : hari="kamis";
                    break;
                case 5 : hari="jumat";
                    break;
            }*/
            var jam = (num/100>>0)%10;
            var ruang = (num/10>>0)%10;
            var con = num%10;
            if (con==1)
            {
                var pr=prompt("Lab yang diubah, kosong untuk menghapus");
                var alert="mengubah";
                if (pr!=null || pr!="")
                {
                    pr="'"+pr+"'";
                    var link ="jadwalCRUD.php?hari="+hari+"&jam="+jam+"&ruang="+ruang+"&con="+con+"&data="+pr;
                    if (confirm("Apakah anda ingin "+alert+" ini")){
                        ambildata(link, "tabel-jadwal",crudjadwal);
                    }
                }
            } 
            else if (con==0) 
            {
                var pr=prompt("Lab yang ditambah");
                var alert="menambahkan";
                var link ="jadwalCRUD.php?hari="+hari+"&jam="+jam+"&ruang="+ruang+"&con="+con+"&data="+pr;
                if (confirm("Apakah anda ingin "+alert+" ini")){
                    ambildata(link, "tabel-jadwal",crudjadwal);
                }
            }
            else {
                var alert="menghapus";
                if (confirm("Apakah anda ingin "+alert+" ini")){
                   ambildata("jadwalCRUD.php?hari="+hari+"&jam="+jam+"&ruang="+ruang+"&con="+con, "tabel-jadwal",crudjadwal);
                }
            }
        })
    }