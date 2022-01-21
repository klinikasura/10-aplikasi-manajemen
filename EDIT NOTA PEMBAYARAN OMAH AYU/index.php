<?php
 include 'conf/conf.php';
?>
<script type="text/javascript">
            window.onload = function() { window.print(); }
        </script>


<center> <p> <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgv3301121pXmc10I0MpzqxjY2wzJHGkX_dtmLVt-ZukLgtBHi0f0x1MAJhiDNZ5aQUE4cjfjemTniauBTe9QK-DeZz687Gb0L596PFf8p86Q1YhM4--jShFcj9uWNcvr040X--DekUQ9Z06oB2A9RlSX-aQbMDYuSmsQtc8ea6McDGxjJxcvBVPLYmug" width="200" height="300" /></p> </center>

<html>
    <isi>
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </isi>
    <body>

    <?php
    reportsqlinjection();      
        $nonota    =str_replace("_"," ",$_GET['nonota']);  
        $kdptg     =str_replace("_"," ",$_GET['kdptg']); 
        $bayar     =$_GET['bayar']; 
        $ongkir    =$_GET['ongkir']; 
        $tanggal   =$_GET['tanggal']; 

        $_sql = "SELECT kode_brng, nama_brng, satuan, h_jual, jumlah, subtotal, dis, bsr_dis, total from tampjual1";            
        $hasil=bukaquery($_sql);
        
        $_sqluser = "SELECT nama_krywn from datakaryawan where  kode_krywn='$kdptg'";            
        $hasiluser=bukaquery($_sqluser);
        $barisuser = mysql_fetch_array($hasiluser);
        
        $_sqlins = "SELECT nama_instansi, alamat_instansi, kabupaten, propinsi from setting";            
        $hasilins=bukaquery($_sqlins);
        $barisins = mysql_fetch_array($hasilins);
        
        $_sqlset = "SELECT * from setnota";            
        $hasilset=bukaquery($_sqlset);
        $barisset = mysql_fetch_array($hasilset);
        
        if(mysql_num_rows($hasil)!=0) { 
          echo "<table width='$barisset[0]'  border='0' align='left' cellpadding='0' cellspacing='0' class='tbl_form'>
                 <tr class='isi14'>
                       <td width=50% colspan=2 align=center>
                           <font color='444444' size='8' face='Tahoma'>$barisins[0]</font><br/>
                           <font color='444444' size='4' face='Tahoma'>
                               $barisins[1], $barisins[2], $barisins[3]<br/><br/>
                           </font>
                       </td>
                 </tr>

                 <tr class='isi14'>
                    <td width='50%'>
                       <font color='444444' size='4' face='Comic Sans Ms'>No.Nota : $nonota</font>
                    </td>
                    <td width='50%'>
                       <font color='444444' size='4' face='Comic Sans Ms'>Petugas : $kdptg, $barisuser[0]</font>
                    </td>
                 </tr> 
                 <tr class='isi14'>
                    <td width='50%'>
                       <font color='444444' size='4' face='Comic Sans Ms'>Tanggal: $tanggal</font>
                    </td>
                    <td width='50%'>
                       <font color='444444' size='4' face='Comic Sans Ms'></font>
                    </td>
                 </tr> 

 


                 <tr class='isi13'>
                     <td colspan=2>&nbsp;</td>
                 </tr>




                <tr class='isi14'>
                      <td colspan=2>
                          <table width=100%>

                               <tr class=isi>
                                   <td width='15px' size='2' align=center>No</td>
                                   <td width='200px' align=center>Barang</td>
                             <td width='200px' align=center>Satuan</td>
                                   <td width='90px' align=center>Harga</td>
                                   <td width='40px' align=center>Jml</td>
                                   <td width='90px' align=center>Subtotal</td>
                                   <td width='40px' align=center>Dsc</td>
                                        <td width='90px' align=center>Bsr.Dsc</td>
                                        <td width='90px' align=center>Total</td>
                               </tr>";
                                      $ttlpesan=0;
                                      $i=1;
                                      while($barispesan = mysql_fetch_array($hasil)) { 
                                          $ttlpesan=$ttlpesan+$barispesan[8];
                                          echo "
                                            <tr class='isi'>

                                                <td>$i</td>
                                                <td>$barispesan[1]</td>
                                                <td>$barispesan[2]</td>
                                                <td align=right>".formatDuit2($barispesan[3])."</td>
                                                <td align=right>".formatDuit2($barispesan[4])."</td>
                                                <td align=right>".formatDuit2($barispesan[5])."</td>
                                                <td align=right>".formatDuit2($barispesan[6])."</td>
                                                <td align=right>".formatDuit2($barispesan[7])."</td>
                                                <td align=right>".formatDuit2($barispesan[8])."</td>
                                           </tr>";$i++;
                                      }    
                             echo " <tr class='isi14'>


<b><p><left>  =========================================================================</p></b.</left>

    <center><font color='444444' size='4' face='Tahoma'>NOTA PEMBAYARAN</font></center>
<b><p><left>  =========================================================================</p></b.</left>

<p></p>


<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $i</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[1]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[2]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[3]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[4]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[5]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[6]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[7]</font></left>
<left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $barispesan[8]</font></left>


    <left><font color='444444' size='4' face='Tahoma'>Total Pembelian : $ttlpesan</font></left>
<p></p>
 <left><font color='444444' size='4' face='Tahoma'>Total Biaya Ongkos Kirim      : $ongkir</font></left>
<p></p>
 <left><font color='444444' size='4' face='Tahoma'>Bayar: $bayar</font></left>
<p></p>
 






<b><p><left>  =========================================================================</p></b.</left>
    <center><font color='444444' size='4' face='Tahoma'>DETAIL PEMBELIAN</font></center>
<b><p><left>  =========================================================================</p></b.</left>













                                      <td colspan=8>Total Pembelian</td>
                                      <td align='right'>".formatDuit2($ttlpesan)."</td>
                                    </tr> 
                                    <tr class='isi14'>
                                      <td colspan=8>Ongkos Kirim</td>
                                      <td align='right'>".formatDuit2($ongkir)."</td>
                                    </tr>                                      
                                    <tr class='isi14'>
                                      <td colspan=8>Bayar</td>
                                      <td align='right'>".formatDuit2($bayar)."</td>
                                    </tr>  
                                    <tr class='isi14'>
                                      <td colspan=8>Kembalian</td>
                                      <td align='right'>".formatDuit2($bayar-$ttlpesan-$ongkir)."</td>
                                    </tr>  
                          </table>
                      </td>
                    </tr>

                 </table>";
        
        } else {echo "<b>Data pesan masih kosong !</b>";}
    ?>

    </body>

</html>
<b><p><center>  ====================================================================================================================================================================</p></b.</center>


<font size="2">TERIMA KASIH. SELAMAT BERBALANJA KEMBALI/font><br>

<p><center> </p></center>
<p><center> == LAYANAN KONSUMEN | OMAH AYU TUGUMULYO == </p></center>
<p><center>  WhatsApp : 085225218507 </p></center>


<center> <p> <img src="https://blogger.googleusercontent.com/img/a/AVvXsEj_dIP4GiP3NGEshrGhVkZNAuyWV77zGee9qAYK9OTs5doOGsTVaHsxrzrIYncK0T_wpaKjwy_5nKRclVoC_3vUfrzywbw-XHQMibDkvkN7XTHLAT9DDibUKrkM3riHzw3iQ1iVmHDuat-8uj0qieSRSEeHh6xElVijNPF4YXe0Hj6rKhpIx2AXKIm5WA=w320-h320" width="91" height="103" /></p> </center>


		
