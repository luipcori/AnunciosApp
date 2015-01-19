<body>

   <fieldset class="left">
         <form name="form5" enctype="multipart/form-data" method="post" action="subir_archivo/upload.php" />
            <p><input type="file" size="32" name="my_field" value="" id="xhr_field" />
              <span class="button">
              <input type="submit" name="Submit" value="ENVIAR ARCHIVO" id="xhr_upload"/>
            </span>
		     <div id="xhr_status"></div>
            <p class="button"><input type="hidden" name="action" value="xhr" /></p>
        </form>
        	<div id="xhr_result"></div>
    </fieldset>
 
 
   <script type="text/javascript">

    window.onload = function () {

      function xhr_send(f, e) {
        if (f) {
          xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
              document.getElementById(e).innerHTML = xhr.responseText;
            }
          }
          xhr.open("POST", "subir_archivo/upload.php?action=xhr");
          xhr.setRequestHeader("Cache-Control", "no-cache");
          xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
          xhr.setRequestHeader("X-File-Name", f.name);
          xhr.send(f);
        }
      }

      function xhr_parse(f, e) {
        if (f) {
	  
		  document.getElementById(e).innerHTML = "Archivo Sel. : " + f.name + "(" + f.type + ", " + f.size + ")";
        } else {
          document.getElementById(e).innerHTML = "No file selected!";
        }
      }

/*
      function dnd_hover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.target.className = (e.type == "dragover" ? "hover" : "");  
      }
+*/
      var xhr = new XMLHttpRequest();

      if (xhr && window.File && window.FileList) {

        // xhr example
        var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
          xhr_file = this.files[0];
          xhr_parse(xhr_file, "xhr_status");
        }
        document.getElementById("xhr_upload").onclick = function (e) {
          e.preventDefault();
          xhr_send(xhr_file, "xhr_result");
        }

        // drag and drop example
   //     var dnd_file = null; 
        //document.getElementById("dnd_drag").style.display = "block";
        //document.getElementById("dnd_field").style.display = "none";
        //document.getElementById("dnd_drag").ondragover = function (e) {
        //  dnd_hover(e);
        //}
        //document.getElementById("dnd_drag").ondragleave = function (e) {
        //  dnd_hover(e);
        //}
        //document.getElementById("dnd_drag").ondrop = function (e) {
         // dnd_hover(e);
         // var files = e.target.files || e.dataTransfer.files;
         // dnd_file = files[0];
         // xhr_parse(dnd_file, "dnd_status");
        //}
        //document.getElementById("dnd_field").onchange = function (e) {
        //  dnd_file = this.files[0];
        //  xhr_parse(dnd_file, "dnd_status");
        //}
        //document.getElementById("dnd_upload").onclick = function (e) {
         // e.preventDefault();
         // xhr_send(dnd_file, "dnd_result");
       // }

      }
    }
  
    </script>

</body>

</html>
