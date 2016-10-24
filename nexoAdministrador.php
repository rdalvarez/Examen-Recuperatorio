<?php$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;switch ($queHago) {    case "mostrarGrilla":        require_once("clases/MostrarJson.php");                $ArrayDeMascotas = MostrarJson::TraerTodosLasMascotas();        $grilla = '<table class="table">                        <thead style="background:rgb(14, 26, 112);color:#fff;">                                <tr>                                    <th rowspan="2">  ID </th>                                    <th rowspan="2">  NOMBRE </th>                                    <th rowspan="2">  TIPO  </th>                                    <th style="text-align:center">  DUE&Ntilde;O </th>                                </tr>                                 <tr>                                    <th>                                        <table>                                            <thead style="background:rgb(14, 26, 112);color:#fff;">                                                <tr>                                                    <th> NOMBRE </th>                                                    <th> CIUDAD </th>                                                    <th> TELEFONO </th>                                                </tr>                                            </thead>                                        </table>                                    </th>                                </tr>                        </thead>';    foreach ($ArrayDeMascotas as $mascota) {           //Armar filas con los datos de las mascotas            $grilla .= "<tr>                            <td>".$mascota['id']."</td>                            <td>".$mascota['nombre']."</td>                            <td>".$mascota['tipo']."</td>                            <td>".$mascota['dueño']['nombre']."</td>                            <td>".$mascota['dueño']['datos']['ciudad']."</td>                            <td>".$mascota['dueño']['datos']['telefono']."</td>                        </tr>";       }        $grilla .= '</table>';        echo $grilla;        break;    case "cargarForm":        $form = '<form>                       <input type="text" placeholder="Ingrese MARCA" id="txtMarca" />                    <label >Sistema Operativo:</label>                    <select id="cboSO">                        <option value="android">Android</option>                        <option value="ios">IOS</option>                        <option value="windows">Windows</option>                    </select><br>                    <label >1 SIM:</label><input type="radio" id="rdoSIMUno" name="rdo" checked /><br>                    <label >2 SIM:</label><input type="radio" id="rdoSIMDos" name="rdo" /><br>                    <input type="button" class="MiBotonUTN" onclick="AgregarCelular()" value="Guardar Celular"  />                </form>';                echo $form;                break;    case "cargarFormEliminar":        $form = '<form>                       <input type="text" placeholder="Ingrese ID Mascota" id="txtIdMascota" />                    <br>                    <input type="button" class="MiBotonUTN" onclick="EliminarMascota()" value="Eliminar Mascota"  />                </form>';                echo $form;                break;    case "agregarCelular":        require_once 'clases/Celular.php';        $retorno["Exito"] = TRUE;        $retorno["Mensaje"] = "Se ha creado el CELULAR";                $obj = isset($_POST['celular']) ? json_decode(json_encode($_POST['celular'])) : NULL;//implementar la clase .php Celular        $cel = new Celular($obj->marca, $obj->so, $obj->cantSIM);        if (!$cel->Agregar()) {            $retorno["Exito"] = FALSE;            $retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo AGREGAR el celular.";        } else {            $retorno["Mensaje"] = "El celular fue agregado CORRECTAMENTE!!!";        }        echo json_encode($retorno);        break;    case "eliminarMascota":                require_once 'clases/Mascota.php';        $retorno["Exito"] = TRUE;        $retorno["Mensaje"] = "";                $idMascota = isset($_POST['idMascota']) ? $_POST['idMascota'] : NULL;//implementar la clase .php Mascota        if (!Mascota::Eliminar($idMascota)) {            $retorno["Exito"] = FALSE;            $retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo ELIMINAR la mascota.";        } else {            $retorno["Mensaje"] = "La mascota fue eliminada CORRECTAMENTE!!!";        }        echo json_encode($retorno);        break;    case "cargarFormSubir":        $form = '<form>                       <input type="file" placeholder="Ingrese ID Mascota" id="subir" />                    <br>                    <input type="button" class="MiBotonUTN" onclick="SubirArchivo()" value="Subir Archivo"  />                </form>';                echo $form;                break;    default:        echo ":(";}