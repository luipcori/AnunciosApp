<div id="barIzq" style="width:155px; height:auto; float:left; margin-top:10px; ">
        <div style="margin-top:10px; margin-bottom:0px;">
       <a href="index.php"><img src="img/inicio.png" /> </a>
       <img src="img/aviso1.png" />
        </div>
        
        <div>
        <ul class="vert-one">

                  <? //Mostrar Registros de categoria
  					 $rs3 = mysql_query("SELECT eliminado FROM categorias where eliminado='0' group by eliminado ORDER BY id asc");
					 if(mysql_affected_rows() > 0)				   	  
						  {				
								$i = 0;
								while($fila3 = mysql_fetch_array($rs3))//////////////////----------------1
								{
								$des = $fila3["descripcion"];
								$describe2 = substr($fila3["descripcion"],1);
					
				$rs = mysql_query("SELECT * FROM categorias where eliminado = '$des' order by descripcion ASC");	
									  
								$i = 0;
								while($fila = mysql_fetch_array($rs))//////////////////----------------2
								{
						echo "

						
				<li><a href='content.php?id=".$fila["id"]."&descripcion=".$fila["descripcion"]."'>
				&nbsp;&nbsp;&nbsp;&nbsp;".$fila["descripcion"]."
				</a></li>	
						";
								$i++;	  
								}mysql_free_result($rs);			  //////////////////----------------2
						
						}
						mysql_free_result($rs3);	
						}				  //////////////////----------------1   						
					 ?>
                 
    
  </ul>
  </div>
       <div style="margin-top:15px;">
       
      <center>
         <div style="width:36px; height:auto; float:left; margin:2px;">
         <a href="admin/"><img src="img/acceso.jpg" width="150" border="0" /></a> </div>
      </center>
       </div> 
       </div>
       
        