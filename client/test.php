<html>
   <body>
      <h2>Program to assign PHP variable value as JavaScript using <i>echo</i></h2>
      <?php
         $phpvar="I am php variable";
         $intval=100;
         $intval2=50;
         $arrval=[10, 20, 30];
      ?>
      <b id="output"></b>
      <script>

        
         const phpecho="<?php echo $phpvar; ?>";
         const intout=<?php echo $intval; ?>;
         const arrout=<?php echo json_encode($arrval); ?>;
         const output=document.getElementById("output");
         let 
         strvar="String = "+phpecho + "<br><br>";
         strvar+= "Integer = "+intout + "<br><br>";
         strvar+= "Array = "+arrout;
         output.innerHTML=strvar;
      </script>
   </body>
</html>