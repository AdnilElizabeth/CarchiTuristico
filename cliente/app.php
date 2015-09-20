<?php 

require('../admin/class.php');
$class=new constante();

if(isset($_POST['alojamientos'])) {
    
    $i=0;
    $estrellas = array(
                        'UNA ESTRELLAS' => '
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            ',
                        'DOS ESTRELLAS' => '
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>',
                        'TRES ESTRELLAS' => '
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            ',
                        'CUATRO ESTRELLAS' => '
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                            ',
                        'CINCO ESTRELLAS' => '
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            <i class="message-star ace-icon fa fa-star orange2"></i>
                                            ',
     );
    $acu = array('bg-fondo_1','bg-fondo_2','bg-fondo_1','bg-fondo_2');
    $resultado = $class->consulta(" SELECT * FROM TIPO_ALOJAMIENTO WHERE ESTADO=1");
    while ($row=$class->fetch_array($resultado)) {
        print'
        <div class="row">
            <div class="col-sm-12">
                <div class="row '.$acu[$i].'">
                    <div class="col-sm-6">
                        <div class="row">
                            <h1>
                            CANTÓN TULCÁN
                            ESTABLECIMIENTOS
                            TURÍSTICOS DEL
                            CARCHI
                            </h1>
                        </div>
                        <div class="row">
                            <div class="tit_dc">
                                <h1>'.$row[1].'</h1>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="col-sm-6 bg-transparent">
                        ';
                        $res = $class->consulta(" SELECT T.NOMBRE, A.NOMBRE, A.CATEGORIA, P.NOMBRE, A.DIRECCION, A.TELEFONO, A.CODIGO FROM ALOJAMIENTO A, TIPO_ALOJAMIENTO T, PARROQUIAS P WHERE A.ESTADO=1 AND A.TIPO_ALOJAMIENTO= T.CODIGO AND A.ID_PARROQUIA=P.CODIGO AND P.COD_CANTON='$_POST[id_canton]' and T.nombre='$row[1]'");
                        while ($r=$class->fetch_array($res)) {
                            print'<h3>'.$r[1].'</h3>';
                            print $sum=$r[2];
                            print'<p>'.$estrellas[$sum].'</p>';
                            print'<p>Dir: '.$r[5].' Tel: '.$r[6].'</p>';
                        }
                    print'
                    </div>
                </div>
            </div>
        </div>
        <hr>
        ';
        $i++;
    }
    print'</ul>';
}


 ?>